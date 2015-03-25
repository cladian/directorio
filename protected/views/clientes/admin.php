<?php
/* @var $this ClientesController */
/* @var $model Clientes */

/*$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	'Manage',
);*/



Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('clientes-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Administración de Clientes</h3>




<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'clientes-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
        array(
            'name'=>'id',
            'htmlOptions' => array('width' => '5%'),
        ),
        array(
            'header'=>'Cliente',

            'name'=>'registros_id',
            'value'=>'$data->registros->name',
        ),
        array(
            'header'=>'Pyme',
            'name'=>'registros_idc',
            'value'=>'$data->registrosIdc->name',
        ),

       // 'status',
        array( 'name'=>'status',
            'value'=>'$data["status"]==1?"Activo":"Inactivo"',
            'filter' => array('1' => 'Activo', '0' => 'Inactivo')
        ),
        // 'rdate',
       // 'udate',

        array(
            'class'=>'CButtonColumn',
            'template'=>'{view}',
            'viewButtonUrl'=>'Yii::app()->controller->createUrl("clientes/view",array("id"=>$data->id) )',
            'updateButtonUrl'=>'Yii::app()->controller->createUrl("clientes/update",array("id"=>$data->id) )',
            'deleteButtonUrl'=>'Yii::app()->controller->createUrl("clientes/delete",array("id"=>$data->id) )',
        ),

    ),

)); ?>
