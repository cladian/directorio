<?php
/* @var $this CoberturasController */
/* @var $model Coberturas */

/*$this->breadcrumbs=array(
	'Coberturases'=>array('index'),
	'Manage',
);*/

$this->menu=array(
	array('label'=>'List Coberturas', 'url'=>array('index')),
	array('label'=>'Create Coberturas', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('coberturas-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administración de Coberturas</h1>


<?php echo Yii::app()->params['searchText'];?><?php echo CHtml::link(Yii::app()->params['searchTitle'],'#',array('class'=>'search-button')); ?>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'coberturas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'provincias_id',
		'status',
		'registros_id',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
