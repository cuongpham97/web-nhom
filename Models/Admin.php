<?php

class Admin
{
    public function isLogedIn()
    {
        return !empty($_SESSION['admin']);
    }

    public function login($name, $password)
    {
        $password = hash('sha256', $password);
        
        $admin = DB::query('SELECT admin_id, admin_name, admin_image FROM admin WHERE admin_name = ? AND admin_password = ?')
            ->setParams('ss', $name, $password)
            ->getObject();

        if (empty($admin)) {
            return false;
        }
        
        $_SESSION['admin'] = $admin;
        return true;
    }

    public function getCurrentAdminInfo()
    {
        return $_SESSION['admin'];
    }

    public function logout()
    {
        if (!empty($_SESSION['admin'])) {
            unset($_SESSION['admin']);
        }
    }
}