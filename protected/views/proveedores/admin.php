<?php
/* @var $this ProveedoresController */
/* @var $model Proveedores */

/*$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	'Manage',
);*/



Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('proveedores-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
$visibleConsorcioName=true;
if (Yii::app()->user->checkAccess('adm'))
    $filtro= $model->search();
elseif (Yii::app()->user->checkAccess('cons')){
    $filtro= $model->searchByIdConsorcio(Yii::app()->user->getState('CONSORCIOREGISTROSID'));
    $visibleConsorcioName=false;
    echo Yii::app()->user->getState('CONSORCIOREGISTROSID');
}

?>

<h3>Administración de Proveedores</h3>

<!--
<?php /*echo Yii::app()->params['searchText'];*/?><?php /*echo CHtml::link(Yii::app()->params['searchTitle'],'#',array('class'=>'search-button')); */?>

<div class="search-form" style="display:none">
<?php /*$this->renderPartial('_search',array(
	'model'=>$model,
)); */?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'proveedores-grid',
	'dataProvider'=>$filtro,
	'filter'=>$model,
	'columns'=>array(
		//'id',
        array(
        'name'=>'id',
        'htmlOptions' => array('width' => '5%'),
        ),
        //'registros_id',
        array(
            'header'=>'Proveedor',
            'name'=>'registros_id',
            'value'=>'$data->registros->name',
        ),
        array(
            'header'=>'Pyme',
            'name'=>'registros_idp',
            'value'=>'$data->registrosIdp->name',
        ),
       // 'tiposproveedor_id',
        array(
           'header'=>'Tipo',
           'name'=>'tiposproveedor_id',
           'value'=>'$data->tiposproveedor->name',
            'filter'=>CHtml::listData(Tiposproveedor::model()->findAll(),'id','name')
        ),
        array(
           'header'=>'Clasificación',
           'name'=>'clasificaciontiposproveedor_id',
           'value'=>'$data->clasificaciontiposproveedor->name',
            'filter'=>CHtml::listData(Clasificaciontiposproveedor::model()->findAll(),'id','name')
        ),
        //'clasificaciontiposproveedor_id',
        //'status',
        array( 'name'=>'status',
            'value'=>'$data["status"]==1?"Activo":"Inactivo"',
            'filter' => array('1' => 'Activo', '0' => 'Inactivo')
        ),
        'rdate',
        //'udate',
        //'registros_idp',
		/*
		'tiposproveedor_id',
		'clasificaciontiposproveedor_id',
		*/


        array(
            'class'=>'CButtonColumn',
            'template'=>'{view}',
            'viewButtonUrl'=>'Yii::app()->controller->createUrl("proveedores/view",array("id"=>$data->id) )',
            'updateButtonUrl'=>'Yii::app()->controller->createUrl("proveedores/update",array("id"=>$data->id) )',
            'deleteButtonUrl'=>'Yii::app()->controller->createUrl("proveedores/delete",array("id"=>$data->id) )',
        ),
	),
)); ?>
