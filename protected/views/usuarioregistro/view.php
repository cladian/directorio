<?php
/* @var $this UsuarioregistroController */
/* @var $model Usuarioregistro */

/*$this->breadcrumbs=array(
	'Usuarioregistros'=>array('index'),
	$model->id,
);*/


?>

<h1>View Usuarioregistro # <?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'rdate',
		'udate',
		'status',
		'registros_id',
		'usuarios_id',
	),
)); ?>
