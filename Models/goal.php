<?php

class Goal
{
    public function isExist($id) 
    {
        return DB::query('SELECT goal_id FROM Goals WHERE goal_id = ?')
            ->setParams('i', $id)
            ->getNumrows() > 0;
    }

    public function update($id, $content)
    {
        return DB::query('UPDATE Goals SET goal_content = ? WHERE goal_id = ?')
            ->setParams('si', $content, $id)
            ->getBool();
    }

    public function delete($id) 
    {
        return DB::query('DELETE FROM Goals WHERE goal_id = ?')
            ->setParams('i', $id)
            ->getBool();
    }

    public function addNew($directoryId, $content)
    {
        return DB::query('INSERT INTO Goals(directory_id, goal_content) VALUES (?, ?)')
            ->setParams('is', $directoryId, $content)
            ->getBool();
    }
}