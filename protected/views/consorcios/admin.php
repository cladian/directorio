<?php
/* @var $this ConsorciosController */
/* @var $model Consorcios */

/*$this->breadcrumbs=array(
	'Consorcioses'=>array('index'),
	'Manage',
);*/


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('consorcios-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Administración de Consorcios</h3>
<p></p>


<?php /*echo Yii::app()->params['searchText']; */ ?><!--<?php /*echo CHtml::link(Yii::app()->params['searchTitle'], '#', array('class' => 'search-button')); */ ?>
<div class="search-form" style="display:none">
    <?php /*$this->renderPartial('_search', array(
        'model' => $model,
    )); */
?>
</div>
-->
<!-- search-form -->


<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'consorcios-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        //'id',
        array(
            'header' => 'Nombre',
            'name' => 'registros_id',
            'value' => '$data->registros->name',
            // 'filter'=>CHtml::listData(Registros::model()->findAll(),'id','name'),
            'htmlOptions' => array('width' => '15%'),
        ),
        array(

            'header' => 'Tipo',
            'value' => '$data->registros->type',
        ),
        array(
            'header' => 'CI/RUC',
            'value' => '$data->registros->code'
        ),

        'description',
        array(
            'header' => 'Provincia',
            'name' => 'provincias_id',
            'value' => '$data->provincias->name',
        ),

        /*
        'tiposoperacion_id',
        'registros_id',
        */
        /*        array(
                    'class'=>'CButtonColumn',
                ),*/
        /*        'link'=>array(
                    'header'=>'Go to...',
                    'type'=>'raw',
                    'value'=> 'CHtml::button("button label",
                            array("onclick"=>""))',
                ),*/
        /*        array(
                    'filter'=>false,
                    'type'=>'raw',
                    'value'=>'CHtml::link(\'open dialog\', \'#\', array(\'onclick\'=>\'{ $("#dialogContacto").dialog("open"); return false;} \',))',
                ),*/
        array(
            'class' => 'CButtonColumn',
            'template' => '{view}{update}',
            //'template'=>'{view}{update}{reply}',
            'viewButtonUrl' => 'Yii::app()->controller->createUrl("consorcios/view",array("id"=>$data->id) )',
            'updateButtonUrl' => 'Yii::app()->controller->createUrl("consorcios/update",array("id"=>$data->id) )',
            // 'deleteButtonUrl'=>'Yii::app()->controller->createUrl("tiposanuncio/delete",array("id"=>$data->id) )',
            /*            'buttons' => array(
                            'reply' => array( //the name {reply} must be same
                                'label' => 'Reply', // text label of the button
                              //  'onclick'=>"{ $('#dialogContacto').dialog('open');}",
                               // 'imageUrl' => Yii::app()->baseUrl . '/bootstrap/img/loading.gif', // image URL of the button. If not set or false, a text link is used, The image must be 16X16 pixels
                                'value'=>'CHtml::link(\'open dialog\', \'#\', array(\'onclick\'=>\'{ $("#dialogContacto").dialog("open"); return false;} \',))',
                            ),
                        ),*/
        ),
    ),
));
?>
<hr>
<?php
    if (Yii::app()->user->checkAccess('adm')) {
        $this->widget('bootstrap.widgets.TbButton', array(
            'label' => 'Nuevo Consorcio',
            'type' => 'primary',
            'url' => Yii::app()->controller->createUrl("registros/createcons"),
        ));
    }
?>


<?php /*$this->endWidget(); */ ?>

