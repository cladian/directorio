<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */

/*$this->breadcrumbs=array(
	'Usuarioses'=>array('index'),
	'Manage',
);*/



?>

<h1>View Usuarios # <?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'password',
		'rdate',
		'udate',
		'status',
	),
)); ?>
