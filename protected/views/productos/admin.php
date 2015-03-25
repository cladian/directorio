<?php
/* @var $this ProductosController */
/* @var $model Productos */

/*$this->breadcrumbs=array(
	'Productoses'=>array('index'),
	'Manage',
);*/



Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('productos-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administración de Productos</h1>


<?php echo Yii::app()->params['searchText'];?><?php echo CHtml::link(Yii::app()->params['searchTitle'],'#',array('class'=>'search-button')); ?>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'productos-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'tiposproducto_id',
		'rdate',
		'udate',
		'status',
		'registros_id',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
