<?php
/* @var $this ContactosController */
/* @var $model Contactos */

/*$this->breadcrumbs=array(
	'Contactoses'=>array('index'),
	'Manage',
);*/



Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('contactos-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administración de Contáctos</h1>


<?php echo Yii::app()->params['searchText'];?><?php echo CHtml::link(Yii::app()->params['searchTitle'],'#',array('class'=>'search-button')); ?>


<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'contactos-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',

		'data',
		'rdate',
		'udate',
		'status',
		'tiposcontacto_id',
		/*
		'registros_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
