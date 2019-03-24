<?php
require PATH_ROOT . '\System\Controller.php';

class HomeController extends Controller
{
    public function index()
    {
        $menuModel = $this->loadModel('Navigation');
        $courseModel = $this->loadModel('Course');
        $userModel = $this->loadModel('User');

        $menu = $menuModel->getMenu();
        $courses = $courseModel->getListCourses();
        $user = $userModel->getCurrentUserInfo();

        $this->addViewData(array(
            'title'   => 'Home',
            'menu'    => $menu,
            'user'    => $user,
            'courses' => $courses
        ));

        $this->renderView();
    }
}