<?php
/* @var $this TiposcontactoController */
/* @var $model Tiposcontacto */

/*$this->breadcrumbs=array(
	'Tiposcontactos'=>array('index'),
	'Manage',
);*/



Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tiposcontacto-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Administración de Contáctos</h3>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tiposcontacto-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
        array(
            'name'=>'id',
            'htmlOptions' => array('width' => '5%'),
        ),
		'name',
		//'ismail',
        array( 'name'=>'ismail',
            'value'=>'$data["ismail"]==1?"Si":"No"',
            'filter' => array('1' => 'Si', '0' => 'No')
        ),


        //'rdate',
        //'udate',
        //'status',
        array( 'name'=>'status',
            'value'=>'$data["status"]==1?"Activo":"Inactivo"',
            'filter' => array('1' => 'Activo', '0' => 'Inactivo')
        ),
        //			'class'=>'CButtonColumn',
//		),
        array(
            'class'=>'CButtonColumn',
            'template'=>'{view}{update}',
            'viewButtonUrl'=>'Yii::app()->controller->createUrl("tiposcontacto/view",array("id"=>$data->id) )',
            'updateButtonUrl'=>'Yii::app()->controller->createUrl("tiposcontacto/update",array("id"=>$data->id) )',
            // 'deleteButtonUrl'=>'Yii::app()->controller->createUrl("tiposanuncio/delete",array("id"=>$data->id) )',
        ),
	),
)); ?>
    &nbsp;
<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'label' => 'Nuevo Contacto',
    'type' => 'danger',
    'url'=>Yii::app()->controller->createUrl("tiposcontacto/create"),

));
?>