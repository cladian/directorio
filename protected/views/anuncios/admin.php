<?php
/* @var $this AnunciosController */
/* @var $model Anuncios */

/*$this->breadcrumbs=array(
	'Anuncioses'=>array('index'),
	'Manage',
);*/


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('anuncios-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
if ((Yii::app()->user->checkAccess('adm'))) {
    $filter = $model->search();
}
if ((Yii::app()->user->checkAccess('cons'))) {
    $filter = $model->searchByIdConsorcio(Yii::app()->user->getState('CONSORCIOID')); // Search CONS
}

?>

<h3>Administración de Anuncios</h3>


<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'anuncios-grid',
    'dataProvider' => $filter,
    'filter' => $model,
    'columns' => array(
        //'id',
        'title',
        'description',
        //'file',
        'startdate',
        'enddate',
        // 'status',
        array('name' => 'status',
            'value' => '$data["status"]==1?"Activo":"Inactivo"',
            'filter' => array('1' => 'Activo', '0' => 'Inactivo')
        ),
        /*
        'rdate',
        'udate',

        'tiposanuncio_id',
        'registros_id',
        */
        array(
            'name' => 'file',
            'header' => 'Archivo',
            'type' => 'raw',
            'value' => 'CHtml::link("$data->file",  "http://".$_SERVER["SERVER_NAME"].Yii::app()->request->baseUrl . "/upload/".$data->file, array("target"=>"_blank"))',
        ),

        array(
            'class' => 'CButtonColumn',
            'template' => '{view}{delete}',
            'viewButtonImageUrl' => Yii::app()->baseUrl . '/img/change.gif',
            'viewButtonUrl' => 'Yii::app()->controller->createUrl("anuncios/updateStatus",array("id"=>$data->id) )',

        ),
        /* array(
             'class'=>'CButtonColumn',
         ),*/


    ),
)); ?>

<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'label' => 'Nuevo Anuncio',
    'type' => 'primary',
    'url' => Yii::app()->controller->createUrl("anuncios/create"),

));
?>
