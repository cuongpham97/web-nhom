<?php

class Course
{
    public function getListCourses()
    {
        return DB::query('SELECT course_id, course_name, course_image, course_alias FROM Courses ORDER BY course_id')
        ->getObjects();
    }

    public function isExist($id) 
    {
        return DB::query('SELECT course_id FROM Courses WHERE course_id = ?')
            ->setParams('i', $id)
            ->getNumrows() > 0;
    }

    public function getByLectureId($id)
    {
        return DB::query('SELECT C.course_id, C.course_name FROM lectures A 
            INNER JOIN directories B ON A.directory_id = B.directory_id 
            INNER JOIN courses C on B.course_id = C.course_id WHERE lecture_id = ?')
            ->setParams('i', $id)
            ->getObject();
    }

    public function getByGoalId($id)
    {
        return DB::query('SELECT C.course_id, C.course_name FROM Goals A 
            INNER JOIN directories B ON A.directory_id = B.directory_id 
            INNER JOIN courses C on B.course_id = C.course_id WHERE goal_id = ?')
            ->setParams('i', $id)
            ->getObject();
    }

    public function getByDirectoryId($id)
    {
        return DB::query('SELECT A.course_id, A.course_name FROM Courses A 
            INNER JOIN directories B ON A.course_id = B.course_id WHERE directory_id = ?')
            ->setParams('i', $id)
            ->getObject();
    }

    public function getById($id) {
        return DB::query('SELECT course_id, course_name, course_image, course_alias FROM Courses WHERE course_id = ?')
            ->setParams('i', $id)
            ->getObject();
    }

    public function addNew($name, $alias, $image)
    {   
        $imageName = empty($image) ? '' : $image['name'];

        $insertId = DB::query('SELECT FC_Courses_Add( ?, ?, ?)')
            ->setParams('sss', $name, $imageName, $alias)
            ->getValue();
        
        //Lưu hình ảnh
        if ($image) {
            move_uploaded_file($image['tmp_name'], PATH_ROOT . "/upload/courses-img/{$insertId}-{$imageName}");
        }

       return $insertId;
    }

    public function delete($id)
    {
        $img = DB::query('SELECT course_image FROM Courses WHERE course_id = ?') 
                ->setParams('i', $id)
                ->getValue();

        //Có hình ảnh mà  ko phải hình mặc định thì xóa đi
        if ($img && strcmp($img, 'Default.jpg')) {
            unlink(PATH_ROOT . "/Upload/Courses-img/{$img}");
        }

        return DB::query('DELETE FROM Courses WHERE course_id = ?')
            ->setParams('i', $id)
            ->getBool();
    }

    public function update($id, $name, $alias, $image)
    {
        $currentImg = DB::query('SELECT course_image FROM Courses WHERE course_id = ?') 
                ->setParams('i', $id)
                ->getValue();
        
        if (strcmp($currentImg, 'Default') != 0) {
            unlink(PATH_ROOT . "/Upload/Courses-img/{$currentImg}");
        }
        
        $imageName = '';
        if ($image) {
            $imageName = $image['name'];
            move_uploaded_file($image['tmp_name'], PATH_ROOT . "/upload/courses-img/{$id}-{$imageName}");
        }

        return DB::query('SELECT FC_Courses_Update(?, ?, ?, ?)')
            ->setParams('isss', $id, $name, $alias, $imageName)
            ->getArray();
    }
}