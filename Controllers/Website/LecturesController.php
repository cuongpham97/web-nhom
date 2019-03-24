<?php
require PATH_ROOT . '\System\Controller.php';

class LecturesController extends Controller
{
    public function index($lectureId)
    {
        if (!is_numeric($lectureId)) {
            header('Location:' . WEB_FOLDER . '/_404.php');
        }

        $lectureModel = $this->loadModel('Lecture');
        $lecture = $lectureModel->getById($lectureId);

        if (empty($lecture)) {
            header('Location:' . WEB_FOLDER . '/_404.php');
        }

        $menuModel = $this->loadModel('Navigation');
        $userModel = $this->loadModel('User');
        $courseModel = $this->loadModel('Course');
        $directoryModel = $this->loadModel('Directory_');

        $menu = $menuModel->getMenu();
        $user = $userModel->getCurrentUserInfo();
        $course = $courseModel->getByLectureId($lectureId);
        $lectureList = $directoryModel->getLectureListByCourseId($course->course_id);

        $this->addViewData(array(
            'title' => $lecture->lecture_name,
            'menu' => $menu,
            'user' => $user,
            'lectureList' => $lectureList,
            'lecture' => $lecture,
            'course' => $course
        ));

        $this->renderView();
    }
}