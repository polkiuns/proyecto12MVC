    <?php use Mini\Libs\Sesion; ?>
    <?php use Mini\Model\Auth; ?>
<div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ">
            <a class="nav-link" href="/">Inicio<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo URL; ?>courses">Cursos</a>
          </li>

          <?php if(Sesion::get('logged') && ($_SESSION['role'] == 'teacher' || $_SESSION['role'] == 'student')): ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mis cursos</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
                <?php if(Auth::getSubjects($_SESSION['id'] , $_SESSION['role'])) : ?>
                  <?php foreach(Auth::getSubjects($_SESSION['id'] , $_SESSION['role']) as $subject) : ?>
              <a href="<?php echo URL . 'subjects/show/' . $subject->url ?>"><?= $subject->name ?></a> <br/>
                  <?php endforeach ?>
              <?php endif ?>
            </div>
          </li>
        <?php endif ?>  

  <?php if(Sesion::get('logged') && (Sesion::get('role') == 'admin' || Sesion::get('role') == 'teacher')): ?>        
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo URL; ?>admin">Mi perfil</a>
          </li>
    <?php endif ?> 
        </ul>
</div>
