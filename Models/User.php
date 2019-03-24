<?php

class User
{
    public function addNew($user)
    {
        $password = hash('sha256', $user['password']);

        return DB::query('INSERT INTO Users(user_name, user_gender, user_email, user_phone, user_password) VALUES (?, ?, ?, ?, ?)')
            ->setParams('sssss', $user['name'], $user['gender'], $user['email'], $user['phone'], $password)
            ->getBool();
    }

    public function isLogedIn()
    {
        return !empty($_SESSION['user']) || !empty($_COOKIE['user']);
    }

    public function login($formData)
    {
        //Kiểm tra user có tồn tại
        $password = hash('sha256', $formData['password']);

        $user = DB::query('SELECT user_id id, user_name name, user_image image FROM users WHERE user_email = ? AND user_password = ?')
                    ->setParams('ss', $formData['email'], $password)
                    ->getObject();

        if ($user)  {
            //Nếu tài khoản tồn tại thì lưu lại
            if (isset($formData['remember'])) {
                /**
                * Checkbox 'Remember me' => Lưu vào cookie
                * Chưa endcode tạm dùng serialize($user)
                * Có thể dùng jwt chỗ này nhé
                */
                
                $expire = (int)time() + 10 * 365 * 24 * 60 * 60;
                setcookie('user', serialize($user), $expire, '/');
                $_COOKIE['user'] = serialize($user);
                return true;
            } else {
                //Lưu vào session
                $_SESSION['user'] = $user;
                return true;
            }
        }

        return false;
    }

    public function getCurrentUserInfo()
    {
        if (!empty($_SESSION['user'])) {
           return $this->getLogedUserFromSession();
        }
        
        if (!empty($_COOKIE['user'])) {
            return $this->getLogedUserFromCookie();
        }

        return null;
    }

    private function getLogedUserFromSession()
    {
        return $user = $_SESSION['user'];
    }

    private function getLogedUserFromCookie()
    {
        //decode
        return $user = unserialize($_COOKIE['user']);
    }

    public function logout()
    {
        if (!empty($_SESSION['user'])) {
            //Xóa biến user trong session
            unset($_SESSION['user']);
        }

        if (!empty($_COOKIE['user'])) {
            //Xóa cookie user (cho thời gian sống về 1s)
            unset($_COOKIE['user']);
            setcookie('user', '', 1, '/');
        }
    }
}