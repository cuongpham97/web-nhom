<?php
require PATH_ROOT . '\System\Controller.php';

class DirectoriesController extends Controller
{
    public function index($courseId)
    {
        if (!is_numeric($courseId)) {
            header('Location:' . WEB_FOLDER . '/_404.php');
        }
       
        $courseModel = $this->loadModel('Course');

        if (!$courseModel->isExist($courseId)) {
            header('Location:' . WEB_FOLDER . '/_404.php');
        }

        $directoryModel = $this->loadModel('Directory_');
        $menuModel = $this->loadModel('Navigation');
        $userModel = $this->loadModel('User');

        $directories = $directoryModel->getByCourseId($courseId);
        $menu = $menuModel->getMenu();
        $user = $userModel->getCurrentUserInfo();

        $this->addViewData(array(
            'title' => 'Directories',
            'menu' => $menu,
            'user' => $user,
            'directories' => $directories
        ));

        $this->renderView();
    }
}