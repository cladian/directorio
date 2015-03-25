<?php
/* @var $this ClasificaciontiposproveedorController */
/* @var $model Clasificaciontiposproveedor */

/*$this->breadcrumbs=array(
	'Clasificaciontiposproveedors'=>array('index'),
	$model->name,
);*/


?>

<h3>Ver Clasificación : <?php echo $model->name; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'name',
		'rdate',
		'udate',
//		'status',
        array( 'name'=>'status',
            'value'=>$model["status"]==1?"Activo":"Inactivo",
            'filter' => array('1' => 'Activo', '0' => 'Inactivo')
        ),
//		'tiposproveedor_id',
        array(
            'name'=>'tiposproveedor_id',
            'value'=>$model->tiposproveedor->name,
        ),
	),
)); ?>
