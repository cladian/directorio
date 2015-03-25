<?php
/* @var $this PymesController */
/* @var $model Pymes */

/*$this->breadcrumbs=array(
	'Pymes'=>array('index'),
	'Manage',
);*/


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('pymes-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
$visibleConsorcioName=true;
if (Yii::app()->user->checkAccess('adm'))
    $filtro= $model->search();
elseif (Yii::app()->user->checkAccess('cons')){
    $filtro= $model->searchByIdConsorcio(Yii::app()->user->getState('CONSORCIOID'));
    $visibleConsorcioName=false;
}

?>

<h3>Administración de Pymes</h3>

<?php //echo Yii::app()->params['searchText'];?><!----><?php //echo CHtml::link(Yii::app()->params['searchTitle'],'#',array('class'=>'search-button')); ?>

<div class="search-form" style="display:none">
    <?php $this->renderPartial('_search', array(
        'model' => $model,
    )); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'pymes-grid',
    'dataProvider' =>$filtro,
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'registros_id',
            'header' => 'Pyme',
            'value' => '$data->registros->name',
        ),
        array(
            'name' => 'consorcios_id',
            'filter' => CHtml::listData(Consorcios::model()->findAll(), 'id', 'description'),
            'value' => '$data->consorcios->description',
            'visible'=>$visibleConsorcioName,
        ),
        'status',
        array(
            'class' => 'CButtonColumn',
            'template' => '{view}{update}',
            'viewButtonUrl' => 'Yii::app()->controller->createUrl("pymes/view",array("id"=>$data->id) )',
            'updateButtonUrl' => 'Yii::app()->controller->createUrl("pymes/update",array("id"=>$data->id) )',
            // 'deleteButtonUrl'=>'Yii::app()->controller->createUrl("tiposanuncio/delete",array("id"=>$data->id) )',
        ),
    ),
)); ?>

<?php
if ((Yii::app()->user->checkAccess('adm'))||(Yii::app()->user->checkAccess('cons') )){
    $this->widget('bootstrap.widgets.TbButton', array(
        'label' => 'Nueva Pyme',
        'type' => 'primary',
        'url' => Yii::app()->controller->createUrl("registros/createpyme"),

    ));

}
?>
