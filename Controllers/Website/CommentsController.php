<?php
require PATH_ROOT . '\System\Controller.php';

class CommentsController extends Controller
{
    public function load()
    {
        if(empty($_POST['id']) || !is_numeric($_POST['id'])) {
            return $this->json(array(
                'status' => 0,
                'message' => 'ID bài học lỗi'
            ));
        }
        $cmtModel = $this->loadModel('Comment');
        $cmts = $cmtModel->getByLectureId($_POST['id']);

        return $this->json(array(
            'status' => 1,
            'message' => 'Thành công',
            'data' => $cmts
        ));
    }

    public function post()
    {
        if (empty($_POST['comment'])) {
            return $this->json(array(
                'status' => 0,
                'message' => 'Không được để trống nội dung'
            ));
        }

        $lectureModel = $this->loadModel('Lecture');

        if (empty($_POST['id']) || !$lectureModel->isExist($_POST['id'])) {
            return $this->json(array(
                'status' => 0,
                'message' => 'Comment vào bài học không tồn tại'
            ));
        }

        $userModel = $this->loadModel('User');
        $user = $userModel->getCurrentUserInfo();

        if (empty($user)) {
            return $this->json(array(
                'status' => 0,
                'message' => 'Bạn chưa đăng nhập'
            ));
        }

        $cmtModel = $this->loadModel('Comment');

        if ($cmtModel->addNew($user->id, $_POST['comment'], $_POST['id'])) {
            return $this->json(array(
                'status' => 1,
                'message' => 'Comment thành công'
            ));
        } else {
            return $this->json(array(
                'status' => 0,
                'message' => 'Lỗi hệ thống'
            ));
        }
    }
}