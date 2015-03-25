<?php
/* @var $this ProductosController */
/* @var $model Productos */

/*$this->breadcrumbs=array(
	'Productoses'=>array('index'),
	$model->id,
);*/


?>

<h1>Ver Producto: <?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		//'tiposproducto_id',
        array(
            'name'=>'tiposproducto_id',
            'value'=>$model->tiposproducto->name,
        ),
		'rdate',
		'udate',
		//'status',
        array( 'name'=>'status',
            'value'=>$model["status"]==1?"Activo":"Inactivo",
            'filter' => array('1' => 'Activo', '0' => 'Inactivo')
        ),
		//'registros_id',
        array(
            'name'=>'registros_id',
            'value'=>$model->registros->name,
        ),
	),
)); ?>
