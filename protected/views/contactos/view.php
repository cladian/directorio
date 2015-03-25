<?php
/* @var $this ContactosController */
/* @var $model Contactos */

/*$this->breadcrumbs=array(
	'Contactoses'=>array('index'),
	$model->id,
);*/

?>

<h3>Ver Contacto: <?php echo $model->data; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		//'data',
		'rdate',
		'udate',
		//'status',
        array( 'name'=>'status',
            'value'=>$model["status"]==1?"Activo":"Inactivo",
            'filter' => array('1' => 'Activo', '0' => 'Inactivo')
        ),
//		'tiposcontacto_id',
        array(
            'name'=>'tiposcontacto_id',
            'value'=>$model->tiposcontacto->name,
//            'filter'=>CHtml::listData(Module::model()->findAll(),'id','name')
        ),
		//'registros_id',
        array(
            'name'=>'registros_id',
            'value'=>$model->registros->name,
//            'filter'=>CHtml::listData(Module::model()->findAll(),'id','name')
        ),
	),
)); ?>
