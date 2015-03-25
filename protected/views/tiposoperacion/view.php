<?php
/* @var $this TiposoperacionController */
/* @var $model Tiposoperacion */

/*$this->breadcrumbs=array(
	'Tiposoperacions'=>array('index'),
	$model->name,
);*/

?>

<h3>Ver: <?php echo $model->name; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'id',
//		'name',
		'description',
		'rdate',
		'udate',
		//'status',
        array( 'name'=>'status',
            'value'=>$model["status"]==1?"Activo":"Inactivo",
            'filter' => array('1' => 'Activo', '0' => 'Inactivo')
        ),
	),
)); ?>
