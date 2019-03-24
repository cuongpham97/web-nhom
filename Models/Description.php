<?php

class Description
{
    public function getAll()
    {
        return DB::query('SELECT description_id, course_name, course_alias, description_detail, description_image, description_title, A.course_id 
                FROM description A INNER JOIN courses B ON A.course_id = B.course_id WHERE A.course_id = B.course_id')
            ->getObjects();
    }

    public function addNew($courseId, $content, $title, $image)
    {
        $imageName = empty($image) ? '' : $image['name'];

        $insertId = DB::query('SELECT FC_Description_Add(?, ?, ?, ?) AS desciption_id')
            ->setParams('isss', $courseId, $content, $title, $imageName)
            ->getArray();
        
        //vì getArray trả về 1 mảng
        $insertId = $insertId['desciption_id'];
        
        //Lưu hình ảnh
        if ($image) {
            move_uploaded_file($image['tmp_name'], PATH_ROOT . "/upload/overview-img/{$insertId}-{$imageName}");
        }

       return $insertId;
    }
}