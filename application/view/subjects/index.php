<?php $this->layout('layouts/layout') ?>
	<br><br><br>
    <main role="main" class="container">
    <?php $this->insert('partials/feedback') ?>
      <div class="row">
        <div class="col-md-8 blog-main">
          <a class="btn btn-outline-primary" href="javascript:history.go(-1)">Atras</a>
          <br/><br/>
          <h3 class="pb-3 mb-4 font-italic border-bottom">
            Curso de: <?= $subject->name ?>
          </h3>

          <div class="blog-post">
            <p><?= $subject->description ?></p>
      <br>
      <h5 class="pb-3 mb-4 font-italic border-bottom" id="lecciones"> Lecciones </h3>
			



              <?php if(isset($_SESSION) && $_SESSION['role'] == 'student'): ?>
              <?php if($authModel->checkSubject($subject->id , $_SESSION['id'])): ?>
                 


          <?php foreach($subjectLessons as $lesson): ?>
              <?php if($lesson->published == 1): ?>
                  <div class="card-deck mb-3 text-center">
                  <div class="card mb-4 box-shadow">
                  <div class="card-header">
                  <h4 class="my-0 font-weight-normal"><?=$lesson->name?></h4>
                  </div>
                  <div class="card-body">
                  <ul class="list-unstyled mt-3 mb-4">
      
      <?php if(count($lessonModel->hasClase($lesson->id))) : ?>
      <?php foreach($lessonModel->hasClase($lesson->id) as $clase): ?>
        <?php if($clase->published !=0 ): ?>
<li class="text-center">
 <a href="<?php echo URL . 'clases/show/' . $clase->url ?>"><?=$clase->name?></a> 
</li>
      <?php endif ?>
      <?php endforeach ?>
      <?php endif ?>
      

      <?php if(count($lessonModel->childs($lesson->id))) : ?>
<?php $this->insert('tree/lessonChild', ['childs' => $lessonModel->childs($lesson->id) , 'lessonModel' => $lessonModel]) ?>
      <?php endif ?>                                   


                      </ul>
                    </div>
                  </div>
              </div>
            <?php endif ?>
          <?php endforeach ?>





              <?php else: ?>
                <span style="color: red;">No puedes ver las lecciones de este curso</span>
              <?php endif ?>
            <?php endif ?>			
<?php if($_SESSION['role'] == 'admin' || $_SESSION['role']="teacher"): ?>
<?php foreach($subjectLessons as $lesson): ?>
              <?php if($lesson->published == 1): ?>
                  <div class="card-deck mb-3 text-center">
                  <div class="card mb-4 box-shadow">
                  <div class="card-header">
                  <h4 class="my-0 font-weight-normal"><?=$lesson->name?></h4>
                  </div>
                  <div class="card-body">
                  <ul class="list-unstyled mt-3 mb-4">
      
      <?php if(count($lessonModel->hasClase($lesson->id))) : ?>
      <?php foreach($lessonModel->hasClase($lesson->id) as $clase): ?>
<li class="text-center">
 <a href="<?php echo URL . 'clases/show/' . $clase->url ?>"><?=$clase->name?></a> 
</li>
      <?php endforeach ?>
      <?php endif ?>
      

      <?php if(count($lessonModel->childs($lesson->id))) : ?>
<?php $this->insert('tree/lessonChild', ['childs' => $lessonModel->childs($lesson->id) , 'lessonModel' => $lessonModel]) ?>
      <?php endif ?>                                   


                      </ul>
                    </div>
                  </div>
              </div>
            <?php endif ?>
          <?php endforeach ?>
<?php endif ?>
          </div><!-- /.blog-post -->
      <br>
          <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#lecciones">Arriba</a>
          </nav>

        </div><!-- /.blog-main -->

        <aside class="col-md-4 blog-sidebar">
          <div class="p-3 mb-3 bg-light rounded">
              <?php if(isset($_SESSION) && $_SESSION['role'] == 'student'): ?>
              <?php if($authModel->checkSubject($subject->id , $_SESSION['id'])): ?>
                  <span style="color: green;"> Puedes ver este curso </span>
              <?php else: ?>
                <span style="color: red;">No estas matriculado en este curso, habla con el profesor</span>
              <?php endif ?>
            <?php endif ?>

          </div>

          <div class="p-3">
            <h4 class="font-italic">Profesores</h4>
            <ol class="list-unstyled mb-0">
                <?php if(count($subjectModel->getTeachers($subject->id))) : ?>
                      <?php foreach ($subjectModel->getTeachers($subject->id) as $teacher): ?>
                          <li><?=$teacher->name?></li>
                      <?php endforeach ?>
                <?php endif?>
            </ol>
          </div>

        </aside><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </main><!-- /.container -->

