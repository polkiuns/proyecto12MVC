<?php $this->layout('layouts/admin/layout') ?>


    <section class="content-header">
      <h1>
        Crear clase
        <small>A continuacion podra crear una clase</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li>Clase</li>
        <li class="active">Crear</li>
      </ol>
    </section>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
<script src="<?php echo URL; ?>adminlte/bower_components/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.js"></script>
<script>
  $(function () {
    CKEDITOR.replace('editor1');
  });
</script>
            
  <div class="row">
    <form action="//proyecto12.test/clases/update" method="post" class="login">
        <input type="hidden" name="id" value="<?=$selectedClass->id?>">
       <div class="col-md-8">
        <div class="box">
          <div class="box-body">
                <div class="form-group">
                  <label>Nombre de la clase</label>
                  
                  <input value="<?=$selectedClass->name?>" type="text" name="name" class="form-control" placeholder="Enter class name"> 
                  <!--Aqui van los errores -->
                  <span class="text-danger"></span>

                </div>
                <div class="form-group">

                  <label>Descripcion breve de la clase</label>
                  
                  <input value="<?=$selectedClass->description?>" type="text" name="description" class="form-control" placeholder="Enter class description"> 
                  <!--Aqui van los errores -->
                  <span class="text-danger"></span>

                </div>
                <div class="form-group">

                  <label>Iframe</label>
                  
                  <textarea value="<?=$selectedClass->iframe?>" rows="3" cols="10" name="iframe" class="form-control" placeholder="Enter only iframes" ><?=$selectedClass->iframe?></textarea>
                  <!--Aqui van los errores -->
                  <span class="text-danger"></span>

                </div>
                <div class="form-group">

                  <label>Nombre de la clase</label>
                  
                  <textarea value="<?=$selectedClass->body?>" id="editor1" rows="5" cols="5" name="body" class="form-control" placeholder="Enter class" > <?=$selectedClass->body?></textarea>
                  <!--Aqui van los errores -->
                  <span class="text-danger"></span>

                </div>
          </div>
        </div>
      </div>
        
        <div class="col-md-4">
        <div class="box">
          <div class="box-body">
              
                <div class="form-group">

                  <label>Asignatura de la leccion</label>
                  
                  <select id="subject" name="subject_id" class="form-control" required>
            <?php foreach($subjects as $subject): ?>
				<?php if($subject->name == $model->subjectName($selectedClass->lesson_id)->name): ?>
				<option value="<?=$subject->id?>" selected><?=$subject->name?></option>
			<?php else : ?>
				<option value="<?=$subject->id?>"><?=$subject->name?></option>
				<?php endif ?>
             
            <?php endforeach ?>
                  </select>
                  <span class="text-danger"></span>

                </div>

                <div class="form-group">

                  <label>¿Desea crear un subtema?</label>
                  
                  <select id="lesson" name="lesson_id" class="form-control" required>
					<option value="<?=$selectedClass->lesson_id?>"><?=$model->lessonName($selectedClass->lesson_id)->name?></option>
                  </select>
                  <span class="text-danger"></span>

                </div>
           
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="published">Publicar
                </label>
              </div>
              <div class="form-group">
                <label></label>
                  <button type="submit" class="btn btn-primary btn-block" id="enviar">Crear nueva clase</button>
              </div>

          </div>
        </div>
      </div>
    </form>
  </div>
  <script type="text/javascript">
  $(document).ready(function() {
      $("#subject").change(function() {
      	$("#lesson").html('');
        console.log("ok");
          $("#subject option:selected").each(function() {
        console.log($(this).val());
              id_subject = $(this).val();
              $.post("http://proyecto12.test/dynamicselects/getLesson/" , {id_subject : id_subject} , function(data) {
                  console.log(data);
                  $("#lesson").html(data);
                  if($("#lesson option:selected").val() == 0)
                  {
                    $.post("http://proyecto12.test/dynamicselects/getTeachers/" , {id_subject : id_subject} , function(data) {
                      console.log(data);
                      $("#teacher").html(data);
                  });
                  } else {
                    $("#lesson").change(function() {
                        id_lesson = $(this).val();
                        if($("#lesson option:selected").val() == 0)
                        {
                            $("#teacher").html('');
                        }else {
                         $.post("http://proyecto12.test/dynamicselects/getTeacher/" , {id_lesson : id_lesson} , function(data){
                            console.log(data);
                            $("#teacher").html(data);
                        });                         
                        }

                    });
            
                  }
              });
          });
      });
  });
</script>