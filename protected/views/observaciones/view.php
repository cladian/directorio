<?php
/* @var $this ObservacionesController */
/* @var $model Observaciones */

/*$this->breadcrumbs=array(
	'Observaciones'=>array('index'),
	$model->name,
);*/


?>

<h1>View Observaciones # <?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'cliente_id',
		'name',
		'description',
		'rdate',
		'udate',
		'status',
		'registros_id',
	),
)); ?>
