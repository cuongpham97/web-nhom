<?php
require PATH_ROOT . '\System\Controller.php';

class ResourcesController extends Controller
{
    public function index()
    {
        $menuModel = $this->loadModel('Navigation');
        $resourceModel = $this->loadModel('Resource');
        $userModel = $this->loadModel('User');

        $menu = $menuModel->getMenu();
        $user = $userModel->getCurrentUserInfo();
        $resources = $resourceModel->getAll();

        $this->addViewData(array(
            'title' => 'Resources',
            'menu' => $menu,
            'user' => $user,
            'resources' => $resources
        ));

        $this->renderView();
    }
}