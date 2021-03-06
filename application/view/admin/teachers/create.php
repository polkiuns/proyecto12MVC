<?php $this->layout('layouts/admin/layout') ?>

    <section class="content-header">
      <h1>
        Resgistrar un profesor
        <small>A continuacion podra registrar un profesor</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li>Profesores</li>
        <li class="active">Registrar</li>
      </ol>
    </section>

            
  <div class="row">
    <form action="//proyecto12.test/teachers/store" method="post" class="login">    
       <div class="col-md-8">
        <div class="box">
          <div class="box-body">
              <div class="form-group" >
              	<label>Nombre del profesor</label>
					<input type="text" name="name" placeholder="Escriba el nombre del profesor" class="form-control">   
              </div>
              <div class="form-group" >
              	<label>Apellidos del profesor</label>
					<input type="text" name="surname" placeholder="Escriba los apellidos  del profesor" class="form-control"> 
              </div>

              <div class="form-group" >
              	<label>Telefono de contacto</label>
					<input type="number" name="phone" placeholder="Escriba el telefono de contacto" class="form-control"> 
              </div>

              <div class="form-group" >
              	<label>Direccion del profesor</label>
					<input type="text" name="address" placeholder="Escriba la direccion del profesor" class="form-control"> 
              </div>
              
              <div class="form-group" >
              	<label>Dni del profesor</label>
					<input type="text" name="dni" placeholder="Escriba la direccion del profesor" class="form-control"> 
              </div>


          </div>
        </div>
      </div>
        
        <div class="col-md-4">
        <div class="box">
          <div class="box-body">
              
                <div class="form-group">

                  <label>Agregar asignaturas al profesor</label>
                  
                  <select name="subject_id[]" class="form-control" multiple="true" required>
                      <?php foreach($subjects as $subject): ?>
                        <option value="<?=$subject->id?>"><?=$subject->name?></option>
                      <?php endforeach ?>
                  </select>
                  <span class="text-danger"></span>

                </div>
              
              <div class="form-group" >
              	<label>Email de creacion de cuenta</label>
					<input type="email" name="email" placeholder="Escriba el email del profesor" class="form-control"> 
              </div>
              
              <div class="form-group" >
              	<label>Contraseña de la cuenta profesor</label>
					<input type="password" name="password" placeholder="Escriba la contraseña de la cuenta" class="form-control"> 
              </div>

              <div class="form-group">
                <label></label>
                  <button type="submit" class="btn btn-primary btn-block">Registrar un profesor</button>
              </div>

          </div>
        </div>
      </div>
    </form>
  </div>