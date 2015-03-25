<?php
/* @var $this DiasentregaController */
/* @var $model Diasentrega */

/*$this->breadcrumbs=array(
	'Diasentregas'=>array('index'),
	$model->name,
);*/


?>

<h3>Ver Dias de Entrega:  <?php echo $model->name; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'id',
//		'name',
		//'frecuency',
        array( 'name'=>'frecuency',
            'value'=>$model["frecuency"]=="PP"?"Por Pedido":"Ocasional",
            'filter' => array('PP' => 'Por Pedido', 'O' => 'Ocasional')
        ),
		//'status',
        array( 'name'=>'status',
            'value'=>$model["status"]==1?"Activo":"Inactivo",
            'filter' => array('1' => 'Activo', '0' => 'Inactivo')
        ),
		'rdate',
		'udate',
		//'dias_id',
        array(
            'name'=>'dias_id',
            'value'=>$model->dias->name,
        ),
		//'registros_id',
        array(
            'name'=>'registros_id',
            'value'=>$model->registros->name,
        ),

	),
)); ?>
