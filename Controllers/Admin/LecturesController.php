<?php
require 'AdminController.php';

class LecturesController extends AdminController
{
    public function edit($id)
    {
        $lectureModel = $this->loadModel('Lecture');

        if (!$lectureModel->isExist($id)) {
            echo 'Bài học không tồn tại';
            return;
        } 

        if (!empty($_POST)) {
            if (empty($_POST['name'])) {
                echo "<script>alert('Tên bài học không được để trống')</script>";
                header('refresh:0;url=' . WEB_FOLDER . '/admin/lectures/edit/' . $id);
                return;
            }

            $name = htmlspecialchars($_POST['name']);
            $data = isset($_POST['data']) ? $_POST['data'] : '';

            if ($lectureModel->update($id, $name, $data)) {
                echo "<script>alert('Update thành công');</script>";
                header('refresh:0;url=' . WEB_FOLDER . '/admin/lectures/edit/' . $id);
                return;
            } else {
                echo 'Lỗi hệ thống';
            }
        }

        $lecture = $lectureModel->getById($id);
        
        $this->addViewData(array(
            'title' => 'Viết bài',
            'lecture' => $lecture
        ));
        $this->renderView();
    }

    public function delete($id)
    {
        $lectureModel = $this->loadModel('Lecture');
        $courseModel = $this->loadModel('Course');

        if (!$lectureModel->isExist($id)) {
            echo 'Bài học không tồn tại';
            return;
        } 

        $course = $courseModel->getByLectureId($id);
        $courseId = $course->course_id;

        if ($lectureModel->delete($id)) {
            echo "<script>alert('Xóa thành công');</script>";
            header('refresh:0;url=' . WEB_FOLDER . '/admin/directories/list/' . $courseId);
        } else {
            echo 'Lỗi hệ thống';
        }
    }

    public function new()
    {
        $dirModel = $this->loadModel('Directory_');
        $dirId = isset($_POST['did']) ? $_POST['did'] : '';
        $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
        $courseId = isset($_POST['cid']) ? htmlspecialchars($_POST['cid']) : '';

        if (!$dirModel->isExist($dirId)) {
            echo 'Thêm thất bại';
            return;
        }

        if (empty($name)) {
            echo "<script>alert('Tên bài học không được để trống')</script>";
            header('refresh:0;url=' . WEB_FOLDER . '/admin/directories/list/' . $courseId);
            return;
        }

        $lectureModel = $this->loadModel('Lecture');

        if ($lectureModel->addNew($dirId, $name)) {
            echo "<script>alert('Thêm thành công');</script>";
            header('refresh:0;url=' . WEB_FOLDER . '/admin/directories/list/' . $courseId);
        }
    }
}