<?php
require PATH_ROOT . '\System\Controller.php';

class AccountsController extends Controller
{
    public function login()
    {
       $userModel = $this->loadModel('User');
        if ($userModel->isLogedIn()) {
            $this->json(array(
                'status' => 0,
                'message' => 'Bạn đang đăng nhập'
            ));
        } else {
            if (!empty($_POST['email']) && !empty($_POST['password']) && $userModel->login($_POST)) {
                $currentUser = $userModel->getCurrentUserInfo();
                $this->json(array(
                    'status' => 1,
                    'message' => 'Đăng nhập thành công',
                    'data' => $currentUser
                ));
            } else {
                $this->json(array(
                    'status' => 0,
                    'message' => 'Email hoặc mật khẩu chưa đúng'
                ));
            }
        }
    }

    public function logout()
    {
        $this->loadModel('User')->logout();
        header('Location:' . WEB_FOLDER . '/home');
    }

    public function register()
    {
        $validModel = $this->loadModel('UserValidation');
        $userModel = $this->loadModel('User');
        
        if ($validModel->isValidUser($_POST)) {
            if ($userModel->addNew($_POST)) {
                $this->json(array(
                    'status' => 1,
                    'message' => 'Đăng kí thành công'
                ));
            } else {
                $this->json(array(
                    'status' => 0,
                    'message' => 'Lỗi hệ thống',
                ));
            }

        } else {
            $error = $validModel->getError();

            $this->json(array(
                'status' => 0,
                'message' => 'Thông tin không hợp lệ',
                'data'  => $error 
            ));
        }
    }
}