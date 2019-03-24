<?php
require 'AdminController.php';

class CoursesController extends AdminController
{
    public function list()
    {
        $courseModel = $this->loadModel('Course');
        $courses = $courseModel->getListCourses();

        $this->addViewData(array(
            'title' => 'Danh sách',
            'courses' => $courses,
        ));

        $this->renderView();
    }

    public function new()
    {
        if (!empty($_POST)) {
            if (empty($_POST['name'])) {
                echo "<script>alert('Tên khóa học không được để trống')</script>";
                header('refresh:0;url=' . WEB_FOLDER . '/admin/courses/new');
                return;
            }   

            //Lấy dữ liệu từ form
            $name = htmlspecialchars($_POST['name']);
            $alias = isset($_POST['alias']) ? htmlspecialchars($_POST['alias']) : '';
            $image = isset($_FILES['image']) ? $_FILES['image'] : null;

            //Thêm khóa học mới
            $courseModel = $this->loadModel('Course');
            $insertId = $courseModel->addNew($name, $alias, $image);

            echo "<script>alert('Thêm thành công với id khóa học là {$insertId}')</script>";
            header('refresh:0;url=' . WEB_FOLDER . '/admin/courses/list');
            return;
        }

        $this->addViewData(array('title' => 'Thêm mới'));
        $this->renderView();
    }

    public function delete($id)
    {
        $courseModel = $this->loadModel('Course');

        if (!$courseModel->isExist($id)) {
            echo "<script>alert('khóa học không tồn tại');</script>";
            header('refresh:0;url=' . WEB_FOLDER . '/admin/courses/list');
            return;
        } else {
            $courseModel->delete($id);
            echo "<script>alert('Xóa thành công');</script>";
            header('refresh:0;url=' . WEB_FOLDER . '/admin/courses/list');
            return;
        }
    }

    public function edit($id)
    {
        $courseModel = $this->loadModel('Course');

        if (!$courseModel->isExist($id)) {
            echo "<script>alert('khóa học không tồn tại');</script>";
            header('refresh:0;url=' . WEB_FOLDER . '/admin/courses/list');
            return;
        } 

        if (!empty($_POST)) {
            if (empty($_POST['name'])) {
                echo "<script>alert('Tên khóa học không được để trống')</script>";
                header('refresh:0;url=' . WEB_FOLDER . '/admin/courses/edit/' . $id);
                return;
            }  

            $name = htmlspecialchars($_POST['name']);
            $alias = isset($_POST['alias']) ? htmlspecialchars($_POST['alias']) : '';
            $image = isset($_FILES['image']) ? $_FILES['image'] : null;

            if ($courseModel->update($id, $name, $alias, $image)) {
                echo "<script>alert('Update thành công');</script>";
                header('refresh:0;url=' . WEB_FOLDER . '/admin/courses/list');
                return;
            }
        }

        $course = $courseModel->getById($id);
        
        $this->addViewData(array(
            'title' => 'Chỉnh sửa',
            'course' => $course
        ));
        $this->renderView();
    }
}