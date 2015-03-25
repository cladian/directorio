<?php
/* @var $this TiposcontactoController */
/* @var $model Tiposcontacto */

/*$this->breadcrumbs=array(
	'Tiposcontactos'=>array('index'),
	$model->name,
);*/


?>

<h3>Ver Tipo Contacto : <?php echo $model->name; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		/*'id',
		'name',*/
		'ismail',
		'rdate',
		'udate',
		//'status',
        array( 'name'=>'status',
            'value'=>$model["status"]==1?"Activo":"Inactivo",
            'filter' => array('1' => 'Activo', '0' => 'Inactivo')
        ),
	),
)); ?>
