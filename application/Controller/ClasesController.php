<?php

namespace Mini\Controller;

use Mini\Core\Controller;
use Mini\Model\Subject;
use Mini\Model\Auth;
use Mini\Libs\Sesion;
use Mini\Libs\helper;
use Mini\Model\Course;
use Mini\Model\Lesson;
use Mini\Model\Clase;


class ClasesController extends Controller
{
	public function index()
	{
		$courseModel = new Course();
		$courses = $courseModel->parents();
		echo $this->view->render('courses/index',
						['courses' => $courses,
						'courseModel' => $courseModel
						
							]);
	}

	public function create()
	{
		if(Auth::authorice($_SESSION['role'], 'view', 'subject')) {
			$subjects = Subject::all();
			echo $this->view->render('admin/clases/create', ['subjects' => $subjects]);
		} else {
			Sesion::addFeedback('feedback_negative' , 'Error');
			header('location: ' . URL . '');
		}
	}

	public function store()
	{
		if(Auth::authorice($_SESSION['role'], 'view', 'subject')) {
			if ( ! $_POST) {
				echo $this->view->render('admin/clases/create');
			} else {
				$url = helper::createSlug($_POST["name"]);
				if(isset($_POST['published'])){
				$data = ['name' => $_POST["name"],
					  	'lesson_id' => $_POST["lesson_id"],
					  	'description' => $_POST["description"],
					  	'iframe' => $_POST["iframe"],
					  	'body' => $_POST["body"],
					  	'published' => 1,
					  	'url' => $url
					  ];					
				} else {
				$data = ['name' => $_POST["name"],
					  	'lesson_id' => $_POST["lesson_id"],
					  	'description' => $_POST["description"],
					  	'iframe' => $_POST["iframe"],
					  	'body' => $_POST["body"],
					  	'published' => 0,
					  	'url' => $url
					  ];							
				}


				if (Clase::store($data)) {
					header('location: ' . URL . 'clases/create');
				} else {
					header('location: ' . URL . 'clases/create');
						}
			}
			} else {
			Sesion::addFeedback('feedback_negative' , 'Error');
			header('location: ' . URL . '');
			}
	}

	public function edit($clase_url)
	{
		if(Auth::authorice($_SESSION['role'], 'view', 'subject')) {
			$selectedClass = Clase::findUrl($clase_url);
			$subjects = Subject::all();
			$model = new Clase;
			echo $this->view->render('admin/clases/edit', ['selectedClass' => $selectedClass , 'subjects'=>$subjects , 'model' => $model]);
		} else {
			Sesion::addFeedback('feedback_negative' , 'Error');
			header('location: ' . URL . '');
		}
	}

	public function update()
	{

		if(Auth::authorice($_SESSION['role'], 'view', 'subject')) {
			if ( ! $_POST) {
				echo $this->view->render('admin/subjects');
			} else {
				$exists = Clase::find($_POST['id']);
				if($exists) {
					$url = helper::createSlug($_POST["name"]);
					if(isset($_POST['published'])) {
				$data = ['name' => $_POST["name"],
					  	'lesson_id' => $_POST["lesson_id"],
					  	'description' => $_POST["description"],
					  	'iframe' => $_POST["iframe"],
					  	'body' => $_POST["body"],
					  	'published' => 1,
					  	'url' => $url,
					  	'id' => $_POST['id']
					  ];						
					} else {
				$data = ['name' => $_POST["name"],
					  	'lesson_id' => $_POST["lesson_id"],
					  	'description' => $_POST["description"],
					  	'iframe' => $_POST["iframe"],
					  	'body' => $_POST["body"],
					  	'published' => 1,
					  	'url' => $url,
					  	'id' => $_POST['id']
					  ];
					}


				if (Clase::update($data)) {
					header('location: ' . URL . 'admin/clases');
				} else {
					header('location: ' . URL . 'admin/');
						}					
				}

			}
			} else {
			Sesion::addFeedback('feedback_negative' , 'Error');
			header('location: ' . URL . '');
			}
			
	}
	
	public function delete()
	{
		if(Auth::authorice($_SESSION['role'], 'view', 'subject')) {
			if ( ! $_POST) {
				echo $this->view->render('admin');
			} else {
				$exists = Clase::find($_POST['id']);
				if($exists){
				$data = [
					  	'id' => $_POST["id"]
					  ];

				if (Clase::delete($data)) {
					header('location: ' . URL . 'admin/clases');
				} else {
					header('location: ' . URL . 'admin/');
						}					
					} else {
						header('location: ' . URL . 'admin/subjects');
					}

			}
			} else {
			Sesion::addFeedback('feedback_negative' , 'Error');
			header('location: ' . URL . '');
			}	
	}

	public function show($url)
	{
		if(Auth::authorice($_SESSION['id'], 'view', 'subject')) {

			$clase = Clase::findUrl($url);
			if($clase) {
				$claseModel = new Clase;
				echo $this->view->render('clases/index' , ['clase' => $clase , 'claseModel' => $claseModel]);
			} else {
			header('location: ' . URL . '');				
			}

			} else {
			Sesion::addFeedback('feedback_negative' , 'Error');
			header('location: ' . URL . '');
			}	
	}
}