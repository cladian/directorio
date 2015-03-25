<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>

<h4>Bienvenidos <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h4>
<?php

//echo Yii::app()->basePath . Yii::app()->params['upload'];

if (Yii::app()->user->checkAccess('cons')) {
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'anuncios-grid',
        'dataProvider' => $modelAnuncios->searchByIdConsorcio(Yii::app()->user->getState('REGISTROID')),  // Search CONS
        'filter' => $modelAnuncios,
        'columns' => array(
           //  'id',
            'title',
            'description',
           // 'file',
          //  'status',
            array(
                'name' => 'file',
                'header' => 'Archivo',
                'type' => 'raw',
                'value'=>'CHtml::link("$data->file",  "http://".$_SERVER["SERVER_NAME"].Yii::app()->request->baseUrl . "/upload/".$data->file, array("target"=>"_blank"))',
            ),
            array(
                'class'=>'CButtonColumn',
                'template'=>'{view}',
                'viewButtonUrl'=>'Yii::app()->controller->createUrl("anuncios/view",array("id"=>$data->id) )',

            ),
        ),
    ));
}

?>


