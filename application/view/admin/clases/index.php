<?php $this->layout('layouts/admin/layout') ?>
    <section class="content-header">
      <h1>
        Todas las clases
        <small>A continuacion se mostraran las clases disponibles</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Clases</li>
      </ol>
    </section>
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Listado de clases</h3>
              </div>

            <div class="box-body">
              <table id="cursos-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Leccion</th>
                  <th>Asignatura</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
          
					<?php foreach($clases as $clase): ?>
            
                    <tr>
                      <td><?= $clase->id ?></td>
                      <td><?= $clase->name ?></td>
                      <td>
                        <?php if (count($model->lessonName($clase->lesson_id))) : ?>
                          <?php foreach($model->lessonName($clase->lesson_id) as $lesson): ?>
                            <?= $model->lessonName($clase->lesson_id)->name ?> 
                          <?php endforeach ?>
                        <?php endif ?>
                      </td>
                      <td>
                        <?php if (count($model->subjectName($clase->lesson_id))) : ?>
                          <?php foreach($model->subjectName($clase->lesson_id) as $subject): ?>
                            <?= $model->subjectName($clase->lesson_id)->name ?> 
                          <?php endforeach ?>
                        <?php endif ?>
                      </td>
                      <td>
                          
                          <a href="<?php echo URL . 'clases/edit/' . $clase->url ?>" title="Editar curso" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
                         
                          <form method = "POST" action ="<?php echo URL . 'clases/delete/' ?>" style="display: inline;">
                            <input value="<?=$clase->id?>" type="hidden" name="id">
                          <button onclick = "return confirm('¿Estas seguro de querer borrar este curso?')" title="Eliminar curso" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></button>
                          
                          </form>
                      </td>
                    </tr>
					<?php endforeach ?>     
                </tbody>
              </table>
            </div>
          </div>