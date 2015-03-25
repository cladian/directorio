<?php
/* @var $this AuthAssignmentController */
/* @var $model AuthAssignment */

/*$this->breadcrumbs=array(
	'Auth Assignments'=>array('index'),
	'Manage',
);*/


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('auth-assignment-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Administración de Roles</h3>

<?php //echo Yii::app()->params['searchText'];?><!----><?php //echo CHtml::link(Yii::app()->params['searchTitle'],'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'auth-assignment-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'itemname',
        array(
            'name'=>'itemname',
            'value'=>'$data->itemname',
           'filter'=>CHtml::listData(AuthItem::model()->findAll(),'name','name'),
            'htmlOptions' => array('width' => '15%'),
        ),

		'userid',
/*		'bizrule',
		'data',*/
/*		array(
			'class'=>'CButtonColumn',
		),*/
	),

)); ?>


<hr/>
&nbsp;
<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'label' => 'Nuevo Rol',
    'type' => 'danger',
    'url'=>Yii::app()->controller->createUrl("authAssignment/create"),

));
?>

