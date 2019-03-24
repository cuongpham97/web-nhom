<?php
require PATH_ROOT . '\System\Controller.php';

abstract class AdminController extends Controller
{
    public function __construct()
    {
        if (strcmp(ACTION, 'login') ==0 || strcmp(ACTION, 'logout') == 0) {
            return;
        }
        
        $adminModel = $this->loadModel('Admin');

        if (!$adminModel->isLogedIn()) {
            header('Location:' . WEB_FOLDER . '/admin/login');
            return;
        }

        //check roll
    
        $admin = $adminModel->getCurrentAdminInfo();
        $this->addViewData(array('admin'=>$admin));
    }
}