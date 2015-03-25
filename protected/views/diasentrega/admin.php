<?php
/* @var $this DiasentregaController */
/* @var $model Diasentrega */

/*$this->breadcrumbs=array(
	'Diasentregas'=>array('index'),
	'Manage',
);*/



Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('diasentrega-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administración de Dias de Entrega</h1>


<?php echo Yii::app()->params['searchText'];?><?php echo CHtml::link(Yii::app()->params['searchTitle'],'#',array('class'=>'search-button')); ?>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'diasentrega-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'frecuency',
		'status',
		'rdate',
		'udate',
		/*
		'dias_id',
		'registros_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
