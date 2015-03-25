<?php
/* @var $this ProvinciasController */
/* @var $model Provincias */

/*$this->breadcrumbs=array(
	'Provinciases'=>array('index'),
	$model->name,
);*/


?>

<h3>Ver Provincia:  <?php echo $model->name; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'id',
//		'name',
		'code',
		'rdate',
		'udate',
		//'status',
        array( 'name'=>'status',
            'value'=>$model["status"]==1?"Activo":"Inactivo",
            'filter' => array('1' => 'Activo', '0' => 'Inactivo')
        ),
	),
)); ?>
