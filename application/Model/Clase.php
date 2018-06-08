<?php

namespace Mini\Model;

use Mini\Core\Database;
use PDO;
use Mini\Libs\helper;
use Mini\Libs\Sesion;

class Clase
{
	public static function all()
	{
		$conn = Database::getInstance()->getDatabase();
		$ssql = "SELECT * FROM clases";
		$query = $conn->prepare($ssql);
		$query->execute();
		return $query->fetchAll();		
	}

	public function lessonName($lesson_id)
	{
		$conn = Database::getInstance()->getDatabase();
		$ssql = "SELECT name FROM lessons WHERE id = :lesson_id";
		$parameters = array(':lesson_id' => $lesson_id);
		$query = $conn->prepare($ssql);
		$query->execute($parameters);
		return $query->fetch();		
	}
	
	public function subjectName($lesson_id)
	{	
		$conn = Database::getInstance()->getDatabase();
		
		$ssql = "SELECT subject_id FROM lessons WHERE id = :lesson_id";
		$parameters = array(':lesson_id' => $lesson_id);
		$query = $conn->prepare($ssql);
		$query->execute($parameters);
		$id = $query->fetchColumn();
		

		$ssql = "SELECT name FROM subjects WHERE id = :id";
		$parameters = array(':id' => $id);
		$query = $conn->prepare($ssql);
		$query->execute($parameters);		

		//echo '[ PDO DEBUG ]: ' . Helper::debugPDO($ssql, $parameters);  
		return $query->fetch();		
	}

	public static function findUrl($clase_url)
	{
		$conn = Database::getInstance()->getDatabase();
		$ssql = "SELECT * FROM clases WHERE url = :clase_url";
		$parameters = array(':clase_url' => $clase_url);
		$query = $conn->prepare($ssql);
		$query->execute($parameters);
		return $query->fetch();			
	}

	public static function find($clase_id)
	{
		$conn = Database::getInstance()->getDatabase();
		$ssql = "SELECT * FROM clases WHERE id = :clase_id";
		$parameters = array(':clase_id' => $clase_id);
		$query = $conn->prepare($ssql);
		$query->execute($parameters);
		return $query->fetch();			
	}


	public function getTeacher($id)
	{
		$conn = Database::getInstance()->getDatabase();
		$ssql = "SELECT teacher_id FROM lessons WHERE id = :id";
		$parameters = array(':id' => $id);
		$query = $conn->prepare($ssql);
		$query->execute($parameters);
		
		$teacher_id=$query->fetchColumn();

		$ssql = "SELECT name FROM teachers WHERE id = :teacher_id";
		$parameters = array(':teacher_id' => $teacher_id);
		$query = $conn->prepare($ssql);
		$query->execute($parameters);		

		return $query->fetch();		
	}


	public static function store($data)
	{
		$conn = Database::getInstance()->getDatabase();

		$errores_validacion = false;
		if (strlen($data['name']) < 5 || empty($data['name'])) {
			Sesion::addFeedback('feedback_negative' , 'Nombre incorrecto');
			$errores_validacion = true;
		}
		if (strlen($data['description']) < 5 || empty($data['description'] || strlen($data['description']) > 255)) {
			Sesion::addFeedback('feedback_negative' , 'Descripcion incorrecta');
			$errores_validacion = true;
		}
		if (strlen($data['body']) < 10 || empty($data['body'] || strlen($data['body']) > 1000)) {
			Sesion::addFeedback('feedback_negative' , 'Body incorrecto');
			$errores_validacion = true;
		}
		if (strlen($data['iframe'])>255) {
			Sesion::addFeedback('feedback_negative' , 'Iframe incorrecto');
			$errores_validacion = true;
		}
		if (empty($data['lesson_id'])) {
			Sesion::addFeedback('feedback_negative' , 'Asignatura incorrecta');
			$errores_validacion = true;
		}
		if ($errores_validacion) {
			return false;
		}







		$ssql = "INSERT INTO clases (name, description , iframe , lesson_id , published , body, url) VALUES (:name, :description , :iframe , :lesson_id , :published, :body , :url)";
		$parameters = array(':description' => $data['description'] , ':name' => $data['name'] , ':iframe' => $data['iframe'] , ':lesson_id' => $data['lesson_id'] , ':published' => $data['published'] , ':body' => $data['body'] , ':url' => $data['url']);
		$query = $conn->prepare($ssql);
		$query->execute($parameters);
		$cuenta = $query->rowCount();
		//echo '[ PDO DEBUG ]: ' . Helper::debugPDO($ssql, $parameters);  exit();
		if ($cuenta == 1) {
			Sesion::addFeedback('feedback_positive' , 'Clase insertada correctamente');
			return true;
		}
		return false;
	}

	public static function update($data)
	{
		$conn = Database::getInstance()->getDatabase();
			
			$errores_validacion = false;
		if (strlen($data['name']) < 5 || empty($data['name'])) {
			Sesion::addFeedback('feedback_negative' , 'Nombre incorrecto');
			$errores_validacion = true;
		}
		if (strlen($data['description']) < 5 || empty($data['description'] || strlen($data['description']) > 255)) {
			Sesion::addFeedback('feedback_negative' , 'Descripcion incorrecta');
			$errores_validacion = true;
		}
		if (strlen($data['body']) < 10 || empty($data['body']) || strlen($data['body']) > 1000) {
			Sesion::addFeedback('feedback_negative' , 'Body incorrecto');
			$errores_validacion = true;
		}
		if (strlen($data['iframe'])>255) {
			Sesion::addFeedback('feedback_negative' , 'Iframe incorrecto');
			$errores_validacion = true;
		}
		if (empty($data['lesson_id'])) {
			Sesion::addFeedback('feedback_negative' , 'Asignatura incorrecta');
			$errores_validacion = true;
		}
		if ($errores_validacion) {
			return false;
		}




	$ssql = "UPDATE clases SET name = :name, lesson_id = :lesson_id , description = :description , iframe = :iframe, published = :published, body = :body, url = :url WHERE id = :id";
		$parameters = array(':description' => $data['description'] , ':name' => $data['name'] , ':iframe' => $data['iframe'] , ':lesson_id' => $data['lesson_id'] , ':published' => $data['published'] , ':body' => $data['body'] , ':url' => $data['url'] , ':id' => $data['id']);
		
		
		$query = $conn->prepare($ssql);
		
		$query->execute($parameters);
		$cuenta = $query->rowCount();
		//echo '[ PDO DEBUG ]: ' . Helper::debugPDO($ssql, $parameters);  exit();
		//echo '[ PDO DEBUG ]: ' . Helper::debugPDO($ssql, $parameters);  exit();
		if ($cuenta == 1) {
			Sesion::addFeedback('feedback_positive' , 'Clase editada correctamente');
			return true;
		}
		return false;
	}

	public static function delete($data)
	{
		$conn = Database::getInstance()->getDatabase();

			$ssql = "DELETE FROM clases WHERE id = :id";
			$parameters = array(':id' => $data['id']);
		
		$query = $conn->prepare($ssql);
		
		$query->execute($parameters);
		$cuenta = $query->rowCount();
		//echo '[ PDO DEBUG ]: ' . Helper::debugPDO($ssql, $parameters);  exit();
		if ($cuenta == 1) {
			Sesion::addFeedback('feedback_positive' , 'Clase eliminada correctamente');
			return true;
		}
		return false;
	}


}