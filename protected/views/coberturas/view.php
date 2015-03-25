<?php
/* @var $this CoberturasController */
/* @var $model Coberturas */

/*$this->breadcrumbs=array(
	'Coberturases'=>array('index'),
	$model->id,
);*/


?>

<h3>Ver Cobertura:   <?php echo $model->id; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		//'provincias_id',
        array(
            'name'=>'provincias_id',
            'value'=>$model->provincias->name,
            //'filter'=>CHtml::listData(Module::model()->findAll(),'id','name')
        ),
		//'status',
        array( 'name'=>'status',
            'value'=>$model["status"]==1?"Activo":"Inactivo",
            'filter' => array('1' => 'Activo', '0' => 'Inactivo')
        ),
		//'registros_id',
        array(
            'name'=>'registros_id',
            'value'=>$model->registros->name,
            //'filter'=>CHtml::listData(Module::model()->findAll(),'id','name')
        ),
	),
)); ?>
