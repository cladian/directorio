<?php
/* @var $this TiposproductoController */
/* @var $model Tiposproducto */

/*$this->breadcrumbs=array(
	'Tiposproductos'=>array('index'),
	$model->name,
);*/


?>

<h3>Ver : <?php echo $model->name; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'name',
		'description',
		'rdate',
		'udate',
		//'status',
        array(
            'name'=>'status',
            'value'=>$model["status"]=="1"?"Activo":"Inactivo",
            'htmlOptions' => array('width' => '10%'),
            'filter' => array('1' => 'Activo', '0' => 'Inactivo')
        ),
		//'consorcios_id',
        array(
            'name'=>'consorcios_id',
            'value'=>$model->consorcios->description,
            'filter'=>CHtml::listData(Tiposregistro::model()->findAll(),'id','description')
        ),

	),
)); ?>
