<?php
require 'AdminController.php';

class DirectoriesController extends AdminController
{
    public function index()
    {
        if (!empty($_POST['id'])) {
            $courseModel = $this->loadModel('Course');

            if ($courseModel->isExist($_POST['id'])) {
                header('Location:' . WEB_FOLDER . "/admin/directories/list/{$_POST['id']}");
                return;
            } else {
                echo "<script>alert('Khóa học không tồn tại, chọn lại')</script>";
            }
        }
       
        $this->addViewData(array('title' => 'Chọn khóa học'));
        $this->renderView();
    }

    public function list($id)
    {
        $courseModel = $this->loadModel('Course');
        if (!$courseModel->isExist($id)) {
            echo "<script>alert('Khóa học không tồn tại, chọn lại')</script>";
            header('Refresh:0;url=' . WEB_FOLDER . "/admin/directories/index");
            return;
        }

        $dirModel = $this->loadModel('Directory_');

        $course = $courseModel->getById($id);
        $directories = $dirModel->getByCourseId($id);

        $this->addViewData(array(
            'title' => 'Danh sách bài học',
            'course' => $course,
            'directories' => $directories
        ));
        $this->renderView();
    }

    public function edit()
    {
        $dirModel = $this->loadModel('Directory_');

        if (empty($_POST['did']) || !$dirModel->isExist($_POST['did'])) {
            echo 'ID lỗi';
            return;
        }

        if ($dirModel->update($_POST['did'], $_POST['name'])) {
            echo "<script>alert('Sửa thành công');</script>";
            header('refresh:0;url=' . WEB_FOLDER . '/admin/directories/list/' . htmlspecialchars($_POST['cid']));
            return;
        } else {
            echo 'Lỗi hệ thống';
        }
    }

    public function delete()
    {
        $dirModel = $this->loadModel('Directory_');

        if (empty($_POST['did']) || !$dirModel->isExist($_POST['did'])) {
            echo 'ID lỗi';
            return;
        }

        if ($dirModel->delete($_POST['did'])) {
            echo "<script>alert('Xóa thành công');</script>";
            header('refresh:0;url=' . WEB_FOLDER . '/admin/directories/list/' . htmlspecialchars($_POST['cid']));
            return;
        } else {
            echo 'Lỗi hệ thống';
        }
    }

    public function new()
    {
        $courseModel = $this->loadModel('Course');

        if (empty($_POST['name'])) {
            echo "<script>alert('Tên mục lục không được để trống');</script>";
            header('refresh:0;url=' . WEB_FOLDER . '/admin/directories/list/' . htmlspecialchars($_POST['cid']));
            return;
        }

        if (empty($_POST['cid']) || !$courseModel->isExist($_POST['cid'])) {
            echo 'ID lỗi';
            return;
        }

        $dirModel = $this->loadModel('Directory_');
        
        if($dirModel->addNew($_POST['cid'], $_POST['name'])) {
            echo "<script>alert('Thêm thành công');</script>";
            header('refresh:0;url=' . WEB_FOLDER . '/admin/directories/list/' . htmlspecialchars($_POST['cid']));
        } else {
            echo 'Lỗi hệ thống';
        }
    }
}