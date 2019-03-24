<?php

class Comment
{
    public function addNew($uid, $cmt, $id)
    {
        return DB::query('INSERT INTO Comments(user_id, comment_content, lecture_id) VALUES ( ?, ?, ?)')
            ->setParams('isi', $uid, $cmt, $id)
            ->getBool();
    }

    public function getByLectureId($id)
    {
        $cmts = DB::query("SELECT A.user_id, user_name, user_image, comment_content, comment_date FROM comments A 
            INNER JOIN users B on A.user_id = B.user_id WHERE lecture_id = ?")
            ->setParams('i', $id)
            ->getObjects();

        return $cmts;
    }

    public function getAll() 
    {
        return DB::query("SELECT lecture_name, comment_id, A.user_id, user_name, user_image, comment_content, comment_date FROM comments A 
            INNER JOIN users B on A.user_id = B.user_id INNER JOIN Lectures C on A.lecture_id = C.lecture_id")
            ->getObjects();
    }

    public function delete($id)
    {
        return DB::query('DELETE FROM Comments WHERE comment_id = ?')
            ->setParams('i', $id)
            ->getBool();
    }
}