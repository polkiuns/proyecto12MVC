<?php

namespace Mini\Model;

use Mini\Core\Database;
use PDO;
use Mini\Libs\helper;
use Mini\Libs\Sesion;

class Auth
{
	public static function user()
	{
		$conn = Database::getInstance()->getDatabase();
		$ssql = "SELECT * FROM users WHERE email = :email AND password = :password";
		$query = $conn->prepare($ssql);
		$parameters = array(':email' => $_POST['email'], ':password' => md5($_POST['password']));
		$query->execute($parameters);
		return $query->fetch();		
	}

	public static function getRole($role_id)
	{
		$conn = Database::getInstance()->getDatabase();
		$ssql = "SELECT name FROM roles WHERE id = :role_id";
		$query = $conn->prepare($ssql);
		$parameters = array(':role_id' => $role_id);
		$query->execute($parameters);
		//echo '[ PDO DEBUG ]: ' . Helper::debugPDO($ssql, $parameters);  exit();
		return $query->fetchColumn();			
	}

	public static function getSubjects($id , $role)
	{
		if($role == "student")
		{
			$conn = Database::getInstance()->getDatabase();
			$ssql = "SELECT name, url FROM subjects WHERE id IN (SELECT subject_id FROM student_subject WHERE student_id = (SELECT id FROM students WHERE user_id = :id) )";
			$query = $conn->prepare($ssql);
			$parameters = array(':id' => $id);
			$query->execute($parameters);
			//echo '[ PDO DEBUG ]: ' . Helper::debugPDO($ssql, $parameters);  
			return $query->fetchAll();	
		
		} else {
			$conn = Database::getInstance()->getDatabase();
			$ssql = "SELECT name, url FROM subjects WHERE id IN (SELECT subject_id FROM subject_teacher WHERE teacher_id = (SELECT id FROM teachers WHERE user_id = :id) )";
			$query = $conn->prepare($ssql);
			$parameters = array(':id' => $id);
			$query->execute($parameters);
			//echo '[ PDO DEBUG ]: ' . Helper::debugPDO($ssql, $parameters);  
			return $query->fetchAll();	
		}
	}

	public function checkSubject($subject_id, $user_id)
	{
			$conn = Database::getInstance()->getDatabase();
			$ssql = "SELECT * FROM subjects WHERE id IN (SELECT subject_id FROM student_subject WHERE student_id = (SELECT id FROM students WHERE user_id = :user_id) )";
			$query = $conn->prepare($ssql);
			$parameters = array(':user_id' => $user_id);
			$query->execute($parameters);
			//echo '[ PDO DEBUG ]: ' . Helper::debugPDO($ssql, $parameters);  
			$subjects =  $query->fetchAll();

			$ssql = "SELECT * FROM subjects WHERE id = :subject_id";
			$query = $conn->prepare($ssql);
			$parameters = array(':subject_id' => $subject_id);
			$query->execute($parameters);
			//echo '[ PDO DEBUG ]: ' . Helper::debugPDO($ssql, $parameters);  
			$subjectOriginal =  $query->fetch();
			foreach($subjects as $subject) {
				if($subject->name == $subjectOriginal->name) {
					return true;
				}
			}

			return false;
	}

	public static function authorice($role,$accion,$model)
	{
		
		if(Sesion::get('role')){
			switch ($model) {
				case 'course':
				
				if($role != 'admin'){
				return false;					
									}
				return true;
				break;
				case 'subject':
					if($accion == 'view'){
						if($role != 'admin' && $role != 'teacher') {
							return false;
						}
						return true;
					} else if ($accion == 'edit') {
						if($role != 'admin') {
							return false;
						}
						return true;
					} else if ($accion == 'show') {
						return true;
					}
				break;
				case 'lesson':
					if($accion == 'create') {
						if($role != 'admin' && $role != 'teacher'){
							return false;
						}
						return true;
					}
				break;
				case 'teacher':
					if($accion == 'view') {
						if($role != 'admin') {
							return false;
						}
						return true;
					}
				break;
				case 'clases':
					return true;
				break;
				}
		}				
	
	else {
		return false;
			}
	}

}