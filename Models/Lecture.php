<?php

class Lecture
{
    public function getById($id)
    {
        return DB::query('SELECT lecture_id, lecture_name, lecture_data FROM Lectures WHERE lecture_id = ?')
            ->setParams('i', $id)
            ->getObject();
    }

    public function isExist($id) 
    {
        return DB::query('SELECT lecture_id FROM Lectures WHERE lecture_id = ?')
            ->setParams('i', $id)
            ->getNumrows() > 0;
    }

    public function update($id, $name, $data)
    {
        return DB::query('UPDATE Lectures SET lecture_name = ?, lecture_data = ? WHERE lecture_id = ?')
            ->setParams('ssi', $name, $data, $id)
            ->getBool();
    }

    public function delete($id) 
    {
        return DB::query('DELETE FROM Lectures WHERE lecture_id = ?')
            ->setParams('i', $id)
            ->getBool();
    }

    public function addNew($directoryId, $name)
    {
        return DB::query('INSERT INTO Lectures(directory_id, lecture_name) VALUES (?, ?)')
            ->setParams('is', $directoryId, $name)
            ->getBool();
    }
}