<?php
require PATH_ROOT . '\System\Controller.php';

class OverviewController extends Controller
{
    public function index()
    {
        $menuModel = $this->loadModel('Navigation');
        $desModel = $this->loadModel('Description');
        $userModel = $this->loadModel('User');

        $menu = $menuModel->getMenu();
        $des = $desModel->getAll();
        $user = $userModel->getCurrentUserInfo();

        $this->addViewData(array(
            'title'  => 'Overview',
            'menu'   => $menu,
            'user'    => $user,
            'des'    => $des
        ));

        $this->renderView();
    }
}