<?php
require 'AdminController.php';

class GoalsController extends AdminController
{
    public function delete()
    {
        $goalModel = $this->loadModel('Goal');
        $courseModel = $this->loadModel('Course');

        if (!$goalModel->isExist($_POST['gid'])) {
            echo 'Bài học không tồn tại';
            return;
        } 

        $course = $courseModel->getByGoalId($_POST['gid']);
        $cid = $course->course_id;

        if ($goalModel->delete($_POST['gid'])) {
            echo "<script>alert('Xóa thành công');</script>";
            header('refresh:0;url=' . WEB_FOLDER . '/admin/directories/list/' . $cid);
        } else {
            echo 'Lỗi hệ thống';
        }
    }

    public function new()
    {
        $dirModel = $this->loadModel('Directory_');
        $did = isset($_POST['did']) ? $_POST['did'] : '';
        $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
        $cid = isset($_POST['cid']) ? htmlspecialchars( $_POST['cid']) : '';

        if (!$dirModel->isExist($did)) {
            echo 'Thêm thất bại';
            return;
        }

        if (empty($name)) {
            echo "<script>alert('Nội dung không được để trống')</script>";
            header('refresh:0;url=' . WEB_FOLDER . '/admin/directories/list/' . $cid);
            return;
        }

        $goalModel = $this->loadModel('Goal');

        if ($goalModel->addNew($did, $name)) {
            echo "<script>alert('Thêm thành công');</script>";
            header('refresh:0;url=' . WEB_FOLDER . '/admin/directories/list/' . $cid);
        } else {
            echo 'Lỗi hệ thống';
        }
    }

    public function edit()
    {
        $gid = isset($_POST['gid']) ? $_POST['gid'] : '';
        $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
        $cid = isset($_POST['cid']) ? htmlspecialchars( $_POST['cid']) : '';

        $goalModel = $this->loadModel('Goal');

        if (!$goalModel->isExist($gid)) {
            echo 'sửa thất bại';
            return;
        }

        if ($goalModel->update($gid, $name)) {
            echo "<script>alert('sửa thành công');</script>";
            header('refresh:0;url=' . WEB_FOLDER . '/admin/directories/list/' . $cid);
        }
    }
}