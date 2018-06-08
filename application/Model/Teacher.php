<?php

namespace Mini\Model;

use Mini\Core\Database;
use PDO;
use Mini\Libs\helper;
use Mini\Libs\Sesion;

class Teacher
{
	public static function all()
	{
		$conn = Database::getInstance()->getDatabase();
		$ssql = "SELECT * FROM teachers";
		$query = $conn->prepare($ssql);
		$query->execute();
		return $query->fetchAll();		
	}

	public function getSubjects($id)
	{
		$conn = Database::getInstance()->getDatabase();
		$ssql = "SELECT name FROM subjects WHERE id IN (SELECT subject_id FROM subject_teacher WHERE teacher_id = :teacher_id)";
		$parameters = array(':teacher_id' => $id);
		$query = $conn->prepare($ssql);		
		$query->execute($parameters);
//echo '[ PDO DEBUG ]: ' . Helper::debugPDO($ssql, $parameters);  exit();
		return $query->fetchAll();				
	}

	public function subjectsName($id)
	{
		$conn = Database::getInstance()->getDatabase();
		$ssql = "SELECT name FROM subjects WHERE id IN (SELECT subject_id FROM subject_teacher WHERE teacher_id = :teacher_id)";
		$parameters = array(':teacher_id' => $id);
		$query = $conn->prepare($ssql);		
		$query->execute($parameters);
		//
		return $query->fetchAll();		
	}

	public static function getTeacherSubject($id)
	{
		$conn = Database::getInstance()->getDatabase();
		$ssql = "SELECT name,id FROM teachers WHERE id = (SELECT teacher_id FROM subject_teacher WHERE subject_id = :subject_id)";
		$parameters = array(':teacher_id' => $id);
		$query = $conn->prepare($ssql);		
		$query->execute($parameters);
		//
		return $query->fetchAll();		
	}

	public static function find($id)
	{
		$conn = Database::getInstance()->getDatabase();
		$ssql = "SELECT * FROM teachers WHERE id = :id";
		$query = $conn->prepare($ssql);
		$parameters = array(':id' => $id);
		$query->execute($parameters);
		return $query->fetch();
	}

	public static function findUser($id)
	{
		$conn = Database::getInstance()->getDatabase();
		$ssql = "SELECT * FROM users WHERE id = :id";
		$query = $conn->prepare($ssql);
		$parameters = array(':id' => $id);
		$query->execute($parameters);
		return $query->fetch();
	}

	public function getPass($id)
	{
		$conn = Database::getInstance()->getDatabase();
		$ssql = "SELECT email FROM users WHERE id = :id";
		$query = $conn->prepare($ssql);
		$parameters = array(':id' => $id);
		$query->execute($parameters);
		return $query->fetchColumn();		
	}

	public static function store($data)
	{
		$conn = Database::getInstance()->getDatabase();



			$errores_validacion = false;
		if (strlen($data['name']) < 5 || empty($data['name'])) {
			Sesion::addFeedback('feedback_negative' , 'Nombre incorrecto');
			$errores_validacion = true;
		}
		if (empty($data['email'])) {
			Sesion::addFeedback('feedback_negative' , 'Email incorrecto');
			$errores_validacion = true;
		}
		if (strlen($data['password']) < 3 || empty($data['password']) || strlen($data['password']) > 16) {
			Sesion::addFeedback('feedback_negative' , 'Body incorrecto');
			$errores_validacion = true;
		}
		if (strlen($data['phone'])>10 || empty($data['phone'])) {
			Sesion::addFeedback('feedback_negative' , 'Numero incorrecto');
			$errores_validacion = true;
		}
		if (empty($data['dni']) || strlen($data['phone']) > 10) {
			Sesion::addFeedback('feedback_negative' , 'Dni incorrecto');
			$errores_validacion = true;
		}
		if ($errores_validacion) {
			return false;
		}


		$data['password'] = md5($data['password']);
		$ssql = "SELECT id FROM roles WHERE name='teacher'";
		$query = $conn->prepare($ssql);		
		$query->execute();
		$role_id = $query->fetchColumn();		

		$ssql = "INSERT INTO users (name, email , password, role_id) VALUES (:name, :email , :password, :role_id)";
		$parameters = array(':name' => $data['name'] , ':email' => $data['email'] , ':password' => $data['password'] , ':role_id' => $role_id);
		$query = $conn->prepare($ssql);		
		$query->execute($parameters);

	
		$ssql = "SELECT id FROM users ORDER BY id DESC LIMIT 1";
		$query = $conn->prepare($ssql);		
		$query->execute($parameters);
		$user_id = $query->fetchColumn();		


		$ssql = "INSERT INTO teachers (name, surname , phone, address, dni_profesor, user_id) VALUES (:name, :surname , :phone, :address, :dni , :user_id)";
		$parameters = array(':name' => $data['name'] , ':surname' => $data['surname'] , ':phone' => $data['phone'] , ':address' => $data['address'], ':dni' => $data['dni'] , ':user_id' => $user_id);
		$query = $conn->prepare($ssql);		
		$query->execute($parameters);
		$cuenta = $query->rowCount();


		$ssql = "SELECT id FROM teachers ORDER BY id DESC LIMIT 1";
		$query = $conn->prepare($ssql);		
		$query->execute($parameters);
		$teacher_id = $query->fetchColumn();

		for($i = 0 ; $i < count($data['subjects_id']) ; $i++){
		$ssql = "INSERT INTO subject_teacher (subject_id, teacher_id) VALUES (:subject_id, :teacher_id)";
		$parameters = array(':subject_id' => $data['subjects_id'][$i] , ':teacher_id' => $teacher_id);
		$query = $conn->prepare($ssql);		
		$query->execute($parameters);			
		}
		$cuenta = $query->rowCount();
		//echo '[ PDO DEBUG ]: ' . Helper::debugPDO($ssql, $parameters);  exit();
		
		if ($cuenta == 1) {
			Sesion::addFeedback('feedback_positive' , 'Profesor registrado correctamente');
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
		if (empty($data['email'])) {
			Sesion::addFeedback('feedback_negative' , 'Email incorrecto');
			$errores_validacion = true;
		}
		if (strlen($data['phone'])>10 || empty($data['phone'])) {
			Sesion::addFeedback('feedback_negative' , 'Numero incorrecto');
			$errores_validacion = true;
		}
		if (empty($data['dni']) || strlen($data['phone']) > 10) {
			Sesion::addFeedback('feedback_negative' , 'Dni incorrecto');
			$errores_validacion = true;
		}
		if ($errores_validacion) {
			return false;
		}






		if(count($data['password'])) {
		$data['password'] = md5($data['password']);
		$ssql = "UPDATE users SET name = :name, email = :email , password = :password WHERE id = :user_id";
		$parameters = array(':name' => $data['name'] , ':email' => $data['email'] , ':password' => $data['password'] , ':user_id' => $data['user_id']);			
		} else {
		$ssql = "UPDATE users SET name = :name, email = :email WHERE id = :user_id";
		$parameters = array(':name' => $data['name'] , ':email' => $data['email'] , ':user_id' => $data['user_id']);			
		}
		$query = $conn->prepare($ssql);		
		$query->execute($parameters);
	
		$ssql = "UPDATE teachers SET name = :name, surname = :surname , phone = :phone , address = :address , dni_profesor = :dni WHERE id = :id";
		$parameters = array(':name' => $data['name'] , ':surname' => $data['surname'] , ':phone' => $data['phone'] , ':address' => $data['address'], ':dni' => $data['dni'] , ':id' => $data['id']);
		$query = $conn->prepare($ssql);		
		$query->execute($parameters);
		$cuenta = $query->rowCount();

		$ssql = "DELETE FROM subject_teacher WHERE teacher_id = :id";
		$parameters = array(':id' => $data['id']);
		$query = $conn->prepare($ssql);		
		$query->execute($parameters);


		for($i = 0 ; $i < count($data['subjects_id']) ; $i++){
		$ssql = "INSERT INTO subject_teacher (subject_id, teacher_id) VALUES (:subject_id, :teacher_id)";
		$parameters = array(':subject_id' => $data['subjects_id'][$i] , ':teacher_id' => $data['id']);
		$query = $conn->prepare($ssql);		
		$query->execute($parameters);	
		//echo '[ PDO DEBUG ]: ' . Helper::debugPDO($ssql, $parameters);  exit();		
		}
//echo '[ PDO DEBUG ]: ' . Helper::debugPDO($ssql, $parameters);  exit();

		$cuenta = $query->rowCount();
		if ($cuenta == 1) {
			Sesion::addFeedback('feedback_positive' , 'Profesor editado correctamente');
			return true;
		}
		return false;
	}

	public static function delete($data)
	{
		$conn = Database::getInstance()->getDatabase();

		$ssql = "DELETE FROM users WHERE id = :id";
		$parameters = array(':id' => $data['id']);
		
		$query = $conn->prepare($ssql);
		
		$query->execute($parameters);
		$cuenta = $query->rowCount();
		//echo '[ PDO DEBUG ]: ' . Helper::debugPDO($ssql, $parameters);  exit();
		if ($cuenta == 1) {
			Sesion::addFeedback('feedback_positive' , 'Profesor eliminado correctamente');
			return true;
		}
		return false;
	}

}