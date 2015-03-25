<?php
/* @var $this RegistrosController */
/* @var $model Registros */

/*$this->breadcrumbs=array(
	'Registroses'=>array('index'),
	$model->name,
);*/


?>

<h1>View Registros # <?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'code',
		'name',
		'representative',
		'address',
		'type',
		'status',
		'rdate',
		'udate',
		//'tiposregistro_id',
        array(               // related city displayed as a link
            'name'=>'tiposregistro_id',
            'value'=>$model->tiposregistro->name,
        ),
	),
)); ?>
