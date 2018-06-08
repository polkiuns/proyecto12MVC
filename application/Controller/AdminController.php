<?php

namespace Mini\Controller;

use Mini\Core\Controller;
use Mini\Libs\Sesion;
use Mini\Model\Teacher;
use Mini\Model\Student;
use Mini\Model\Auth;
use Mini\Model\Course;
use Mini\Model\Subject;
use Mini\Model\Clase;
use Mini\Model\Lesson;


class AdminController extends Controller
{
	public function index()
	{
		if(Sesion::get('logged') && ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'teacher')){
		echo $this->view->render('admin/index');			
		} else {
		header('location: ' . URL . '');
		}

	}

	public function courses()
	{
		if(Auth::authorice($_SESSION['role'], 'create', 'course')) {
			$courses = Course::all();
			$model = new Course;
			echo $this->view->render('admin/courses/index' , ['courses' => $courses , 'model' => $model]);	
			
			} else {
			Sesion::addFeedback('feedback_negative' , 'Error');
			header('location: ' . URL . '');				
			}
	}

	public function subjects()
	{
		if(Auth::authorice($_SESSION['role'], 'view', 'subject')) {
			$subjects = Subject::all();
			$model = new Subject;
			echo $this->view->render('admin/subjects/index' , ['subjects' => $subjects , 'model' => $model]);	
			
			} else {
			Sesion::addFeedback('feedback_negative' , 'Error');
			header('location: ' . URL . '');				
			}
	}

	public function teachers()
	{
		if(Auth::authorice($_SESSION['role'], 'view', 'teacher')) {
			$teachers = Teacher::all();
			$model = new Teacher;
			echo $this->view->render('admin/teachers/index' , ['teachers' => $teachers , 'model' => $model]);	
			
			} else {
			Sesion::addFeedback('feedback_negative' , 'Error');
			header('location: ' . URL . '');				
			}
	}

	public function students()
	{
		if(Auth::authorice($_SESSION['role'], 'view', 'subject')) {
			$students = Student::all();
			$model = new Student;
			echo $this->view->render('admin/students/index' , ['students' => $students , 'model' => $model]);	
			
			} else {
			Sesion::addFeedback('feedback_negative' , 'Error');
			header('location: ' . URL . '');				
			}
	}

	public function lessons()
	{
		if(Auth::authorice($_SESSION['role'], 'view', 'subject')) {
			$lessons = Lesson::all();
			$model = new Lesson;
			echo $this->view->render('admin/lessons/index' , ['lessons' => $lessons , 'model' => $model]);	
			
			} else {
			Sesion::addFeedback('feedback_negative' , 'Error');
			header('location: ' . URL . '');				
			}		
	}
	public function clases()
	{
		if(Auth::authorice($_SESSION['role'], 'view', 'subject')) {
			$clases = Clase::all();
			$model = new Clase;
			echo $this->view->render('admin/clases/index' , ['clases' => $clases , 'model' => $model]);	
			
			} else {
			Sesion::addFeedback('feedback_negative' , 'Error');
			header('location: ' . URL . '');				
			}				
	}

}