<?php

namespace Mini\Model;

use Mini\Core\Database;
use PDO;
use Mini\Libs\helper;
use Mini\Libs\Sesion;

class Course
{
	public static function all()
	{
		$conn = Database::getInstance()->getDatabase();
		$ssql = "SELECT * FROM courses";
		$query = $conn->prepare($ssql);
		$query->execute();
		return $query->fetchAll();		
	}

	public function parents()
	{
		$conn = Database::getInstance()->getDatabase();
		$ssql = "SELECT * FROM courses WHERE course_id IS NULL";
		$query = $conn->prepare($ssql);
		$query->execute();
		return $query->fetchAll();	
	}

	public static function childs($course_id)
	{
		$conn = Database::getInstance()->getDatabase();
		$ssql = "SELECT * FROM courses WHERE course_id = :course_id";
		$query = $conn->prepare($ssql);
		$parameters = array(':course_id' => $course_id);
		$query->execute($parameters);
		return $query->fetchAll();			
	}

	public function parentName($course_id)
	{
		$conn = Database::getInstance()->getDatabase();
		$ssql = "SELECT name FROM courses WHERE id = :course_id";
		$query = $conn->prepare($ssql);
		$parameters = array(':course_id' => $course_id);
		$query->execute($parameters);
		return $query->fetchColumn();			
	}

	public function subjects($id)
	{
		$conn = Database::getInstance()->getDatabase();
		$ssql = "SELECT name , url FROM subjects WHERE id IN (SELECT subject_id FROM course_subject WHERE course_id = :course_id)";
		$query = $conn->prepare($ssql);
		$parameters = array(':course_id' => $id);
		$query->execute($parameters);
		//echo '[ PDO DEBUG ]: ' . Helper::debugPDO($ssql, $parameters);  exit();
		return $query->fetchAll();			
	}

	public static function find($course)
	{
		$conn = Database::getInstance()->getDatabase();
		$ssql = "SELECT * FROM courses WHERE id = :url";
		$query = $conn->prepare($ssql);
		$parameters = array(':url' => $course);
		$query->execute($parameters);
		return $query->fetch();
	}

	public static function findUrl($course)
	{
		$conn = Database::getInstance()->getDatabase();
		$ssql = "SELECT * FROM courses WHERE url = :url";
		$query = $conn->prepare($ssql);
		$parameters = array(':url' => $course);
		$query->execute($parameters);
		return $query->fetch();
	}

	public static function store($data)
	{
		$conn = Database::getInstance()->getDatabase();
		
		$errores_validacion = false;
		if (strlen($data['name']) <= 2 || empty($data['name'])) {
			Sesion::addFeedback('feedback_negative' , 'Nombre incorrecto');
			$errores_validacion = true;
		}
		if ($errores_validacion) {
			return false;
		}





		if($data['course_id'] == 0){
			$ssql = "INSERT INTO courses (name, course_id , url) VALUES (:name, NULL , :url)";
			$parameters = array(':name' => $data['name'] , ':url' => $data['url']);
		} else {
			$ssql = "INSERT INTO courses (name, course_id , url) VALUES (:name, :course_id , :url)";
			$parameters = array(':course_id' => $data['course_id'] , ':name' => $data['name'] , ':url' => $data['url']);
		}
		
		$query = $conn->prepare($ssql);
		
		$query->execute($parameters);
		$cuenta = $query->rowCount();
		//echo '[ PDO DEBUG ]: ' . Helper::debugPDO($ssql, $parameters);  exit();
		if ($cuenta == 1) {
			Sesion::addFeedback('feedback_positive' , 'Curso insertado correctamente');
			return true;
		}
		return false;
	}

	public static function update($data)
	{
		$conn = Database::getInstance()->getDatabase();
		

		$errores_validacion = false;
		if (strlen($data['name']) <= 2 || empty($data['name'])) {
			Sesion::addFeedback('feedback_negative' , 'Nombre incorrecto');
			$errores_validacion = true;
		}
		if ($errores_validacion) {
			return false;
		}



		if($data['course_id'] == 0){
			$ssql = "UPDATE courses SET name = :name, course_id = NULL , url = :url WHERE id = :id";
			$parameters = array(':name' => $data['name'] , ':url' => $data['url'] , ':id' => $data['id']);
		} else {
			$ssql = "UPDATE courses SET name = :name, course_id = :course_id, url = :url WHERE id = :id";
			$parameters = array(':name' => $data['name'] , ':url' => $data['url'] , ':id' => $data['id'] , ':course_id' => $data['course_id']);
		}
		
		$query = $conn->prepare($ssql);
		
		$query->execute($parameters);
		$cuenta = $query->rowCount();
		//echo '[ PDO DEBUG ]: ' . Helper::debugPDO($ssql, $parameters);  exit();
		if ($cuenta == 1) {
Sesion::addFeedback('feedback_positive' , 'Curso editado correctamente');
			return true;
		}
		return false;
	}

	public static function delete($data)
	{
		$conn = Database::getInstance()->getDatabase();

			$ssql = "DELETE FROM courses WHERE id = :id";
			$parameters = array(':id' => $data['id']);
		
		$query = $conn->prepare($ssql);
		
		$query->execute($parameters);
		$cuenta = $query->rowCount();
		//echo '[ PDO DEBUG ]: ' . Helper::debugPDO($ssql, $parameters);  exit();
		if ($cuenta == 1) {
Sesion::addFeedback('feedback_positive' , 'Curso eliminado correctamente');
			return true;
		}
		return false;
	}


}