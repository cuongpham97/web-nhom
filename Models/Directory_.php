<?php

class Directory_
{
	public function isExist($id) 
    {
        return DB::query('SELECT directory_id FROM Directories WHERE directory_id = ?')
            ->setParams('i', $id)
            ->getNumrows() > 0;
	}
	
    public function getByCourseId($id)
    {
        $directories = DB::query(
			'SELECT directory_id, directory_name, course_name FROM directories A 
				INNER JOIN courses B ON A.course_id = B.course_id
				WHERE A.course_id = ? ORDER BY  directory_id')
			->setParams('i', $id)
			->getObjects();
		
		$lectures = DB::query(
			'SELECT B.directory_id, lecture_id, lecture_name FROM lectures A 
				INNER JOIN directories B ON A.directory_id = B.directory_id 
				INNER JOIN courses C ON B.course_id = C.course_id 
				WHERE C.course_id = ? ORDER BY  lecture_order, directory_order')
			->setParams('i', $id)
			->getObjects();
		
		$goals = DB::query(
			"SELECT B.directory_id, goal_id, goal_content FROM goals A 
				INNER JOIN directories B ON A.directory_id = B.directory_id 
				INNER JOIN courses C ON B.course_id = C.course_id 
				WHERE C.course_id = ? ORDER BY  goal_order, directory_order")
			->setParams('i', $id)
			->getObjects();
		
		foreach	($directories as $d) {
			$d->lectures = [];
			$d->goals = [];

			foreach ($lectures as $l) {
				if ($l->directory_id === $d->directory_id) {
					$d->lectures[] = $l;
				}
			}			
			
			foreach ($goals as $g) {
				if ($g->directory_id === $d->directory_id) {
					$d->goals[] = $g;
				}
			}
		}

		return $directories;
	}
	
	public function getLectureListByCourseId($id) {

		return $lectures = DB::query(
			"SELECT lecture_id, lecture_name FROM lectures A 
				INNER JOIN directories B ON A.directory_id = B.directory_id 
				INNER JOIN courses C ON B.course_id = C.course_id 
				WHERE C.course_id = ? ORDER BY directory_order, lecture_order")
			->setParams('i', $id)
			->getObjects();
	}

	public function update($id, $name)
	{
		return DB::query('UPDATE Directories SET directory_name = ? WHERE directory_id = ?')
			->setParams('si', $name, $id)
			->getBool();
	}

	public function delete($id)
	{
		return DB::query('DELETE FROM Directories  WHERE directory_id = ?')
			->setParams('i', $id)
			->getBool();
	}

	public function addNew($courseId, $name)
	{
		return DB::query('INSERT INTO Directories(course_id, directory_name) VALUES (?, ?)')
			->setParams('is', $courseId, $name)
			->getBool();
	}
}