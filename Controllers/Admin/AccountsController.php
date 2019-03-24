<?php
require 'AdminController.php';

class AccountsController extends AdminController
{
    public function login()
    {
        $adminModel = $this->loadModel('Admin');
        if ($adminModel->isLogedIn()) {
            echo "Bạn đang đăng nhập";
            header('Refresh:2;url=' . WEB_FOLDER . '/admin');
            return;
        }

        $error='';
        if (!empty($_POST)) {
            $username = $_POST['username'];
            if ($adminModel->login($username, $_POST['password'])) {
                //Đăng nhập thành công
                header('Location:' . WEB_FOLDER . '/admin');
            }
            $error = 'Sai tên đăng nhập/mật khẩu';
        }

        $this->addViewData(array(
            'title' => 'login',
            'error' => $error
        ));

        $this->renderView();
    }

    public function logout()
    {
        $adminModel = $this->loadModel('Admin');
        $adminModel->logout();
        header('Location:' . WEB_FOLDER . '/admin/login');
    }
}