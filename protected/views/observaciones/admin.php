<?php
/* @var $this ObservacionesController */
/* @var $model Observaciones */

/*$this->breadcrumbs=array(
	'Observaciones'=>array('index'),
	'Manage',
);*/



Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('observaciones-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administración de Observaciones</h1>


<?php echo Yii::app()->params['searchText'];?><?php echo CHtml::link(Yii::app()->params['searchTitle'],'#',array('class'=>'search-button')); ?>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'observaciones-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'cliente_id',
		'name',
		'description',
		'rdate',
		'udate',
		/*
		'status',
		'registros_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
