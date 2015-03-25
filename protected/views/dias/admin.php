<?php
/* @var $this DiasController */
/* @var $model Dias */

/*$this->breadcrumbs=array(
	'Diases'=>array('index'),
	'Manage',
);*/



Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('dias-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Administración de Dias</h3>

<!--
<?php /*echo Yii::app()->params['searchText'];*/?><?php /*echo CHtml::link(Yii::app()->params['searchTitle'],'#',array('class'=>'search-button')); */?>

<div class="search-form" style="display:none">
--><?php /*$this->renderPartial('_search',array(
	'model'=>$model,
)); */?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'dias-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
        array(
        'name'=>'id',
        'htmlOptions' => array('width' => '10%'),
        ),
		'name',
//		'order',
//		'rdate',
//		'udate',
        //'status',
        array( 'name'=>'status',
            'value'=>'$data["status"]==1?"Activo":"Inactivo"',
            'filter' => array('1' => 'Activo', '0' => 'Inactivo')
        ),
        //		array(
//			'class'=>'CButtonColumn',
//		),
        array(
            'class'=>'CButtonColumn',
            'template'=>'{view}{update}',
            'viewButtonUrl'=>'Yii::app()->controller->createUrl("dias/view",array("id"=>$data->id) )',
            'updateButtonUrl'=>'Yii::app()->controller->createUrl("dias/update",array("id"=>$data->id) )',
            // 'deleteButtonUrl'=>'Yii::app()->controller->createUrl("tiposanuncio/delete",array("id"=>$data->id) )',
        ),
	),
)); ?>
