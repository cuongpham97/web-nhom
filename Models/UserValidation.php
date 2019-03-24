<?php
require_once 'Validation.php';

class UserValidation extends Validation
{
    public function isValidUser($user)
    {
        $name       = isset($user['name']) ? $user['name'] : '';
        $gender     = isset($user['gender']) ? $user['gender'] : '';
		$email      = isset($user['email']) ? $user['email'] : '';
		$phone 		= isset($user['phone']) ? $user['phone'] : '';
        $password 	= isset($user['password']) ? $user['password'] : '';
        
        $this->isName($name)
             ->isGender($gender)
             ->isEmail($email)
             ->isPhone($phone)
             ->isPassword($password);

        if(empty($this->error)) {
            $count = DB::query('SELECT user_id FROM Users WHERE user_email = ?')
                ->setParams('s', $email)
                ->getNumrows();
            
            if ($count > 0) {
                $this->error['email'] = 'Email đã được đăng kí';
            }
        }
        
        if ($this->error) {
            return false;
        }

        return true;
    }
}