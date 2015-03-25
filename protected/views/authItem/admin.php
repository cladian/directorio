<?php
/* @var $this AuthItemController */
/* @var $model AuthItem */

/*$this->breadcrumbs=array(
	'Auth Items'=>array('index'),
	'Manage',
);*/


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('auth-item-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Administración de Perfiles</h3>

<?php /*echo Yii::app()->params['searchText'];*/?><!--<?php /*echo CHtml::link(Yii::app()->params['searchTitle'],'#',array('class'=>'search-button')); */?>
<div class="search-form" style="display:none">
<?php /*$this->renderPartial('_search',array(
	'model'=>$model,
)); */?>
</div>-->
<!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'auth-item-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'name',
		//'type',
		'description',
/*		array(
			'class'=>'CButtonColumn',
		),*/
	),
)); ?>

<hr/>
&nbsp;
<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'label' => 'Nuevo Perfil',
    'type' => 'danger',
    'url'=>Yii::app()->controller->createUrl("authItem/create"),

));
?>
