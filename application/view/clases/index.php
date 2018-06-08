<?php $this->layout('layouts/layout') ?>
<br><br><br>
    <main role="main" class="container">
      <div class="row">
        <div class="col-md-8 blog-main">
          <h3 class="pb-3 mb-4 font-italic border-bottom">
          <a class="btn btn-outline-primary" href="javascript:history.go(-1)">Atras</a>
          <br/><br/>
            Nombre de la clase: <?=$clase->name?>
          </h3>

          <div class="blog-post">

        <?php if($clase->iframe): ?>
          	<?=$clase->iframe?>
        <?php endif ?>
        <br><br>
            <h3>Contenido de la clase</h3>
      <h3 class="pb-3 mb-4 font-italic border-bottom"></h3>
      <?=$clase->body?>
      <br>
      <br>

         </div><!-- /.blog-post -->

       </div><!-- /.blog-main -->

        <aside class="col-md-4 blog-sidebar">
          <div class="p-3 mb-3 bg-light rounded">
            <h4 class="font-italic">Breve descripcion de la clase</h4>
            <p class="mb-0"><?=$clase->description?></p>
          </div>

          <div class="p-3 mb-3 bg-light rounded">
            <h4 class="font-italic">Profesor</h4>
            <p class="mb-0"><?=$claseModel->getTeacher($clase->lesson_id)->name?></p>
          </div>
        </aside><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </main><!-- /.container -->