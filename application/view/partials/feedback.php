<?php use Mini\Libs\Sesion; ?>
<?php if ( ! is_null(Sesion::get("feedback_negative")) && 
			count(Sesion::get("feedback_negative")) > 0 ) : ?>

	<div class="alert alert-danger">
		<ul>
			<?php foreach (Sesion::get("feedback_negative") as $error) : ?>
				<li><?= $error ?></li>
			<?php endforeach ?>
		</ul>
	</div>
<?php endif ?>

<?php if ( ! is_null(Sesion::get("feedback_positive")) && 
			count(Sesion::get("feedback_positive")) > 0 ) : ?>

	<div class="alert alert-success">
		<ul>
			<?php foreach (Sesion::get("feedback_positive") as $error) : ?>
				<li><?= $error ?></li>
			<?php endforeach ?>
		</ul>
	</div>
<?php endif ?>
<?php $this->borrar_msg_feedback() ?>