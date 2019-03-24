<?php
require 'AdminController.php';

class CommentsController extends AdminController
{
    public function list()
    {
        $cmtModel = $this->loadModel('Comment');
        $comments = $cmtModel->getAll();
        $this->addViewData(array(
            'title' => 'Danh sách comments',
            'comments' => $comments
        ));
        $this->renderView();
    }

    public function delete($id)
    {
        $cmtModel = $this->loadModel('Comment');
        if ($cmtModel->delete($id)) {
            echo "<script>alert('Xóa comment thành công')</script>";
        } else {
            echo "<script>alert('Xóa thất bại')</script>";
        }

        header('Refresh:0;url=' . WEB_FOLDER . '/admin/comments/list');
    }
}