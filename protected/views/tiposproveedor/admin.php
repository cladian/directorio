<?php
/* @var $this TiposproveedorController */
/* @var $model Tiposproveedor */

/*$this->breadcrumbs=array(
	'Tiposproveedors'=>array('index'),
	'Manage',
);*/


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tiposproveedor-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Administración Tipos de Proveedor</h3>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tiposproveedor-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
        array(
            'name'=>'id',
            'htmlOptions' => array('width' => '5%'),
        ),
		'name',
		'description',
        //'rdate',
        //'udate',
        //'status',
        array( 'name'=>'status',
            'value'=>'$data["status"]==1?"Activo":"Inactivo"',
            'filter' => array('1' => 'Activo', '0' => 'Inactivo')
        ),
        //	'class'=>'CButtonColumn',
        //		),
        array(
            'class'=>'CButtonColumn',
            'template'=>'{view}{update}',
            'viewButtonUrl'=>'Yii::app()->controller->createUrl("tiposproveedor/view",array("id"=>$data->id) )',
            'updateButtonUrl'=>'Yii::app()->controller->createUrl("tiposproveedor/update",array("id"=>$data->id) )',
            // 'deleteButtonUrl'=>'Yii::app()->controller->createUrl("tiposanuncio/delete",array("id"=>$data->id) )',
        ),
	),
)); ?>

&nbsp;
<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'label' => 'Nuevo Tipo de Proveedor',
    'type' => 'danger',
    'url'=>Yii::app()->controller->createUrl("tiposproveedor/create"),

));
?>
