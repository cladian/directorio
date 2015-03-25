<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>

<h4>Bienvenidos <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h4>
<?php

//echo Yii::app()->basePath . Yii::app()->params['upload'];

if (Yii::app()->user->checkAccess('adm')) {
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'anuncios-grid',
        'dataProvider' => $modelAnuncios->searchByStatus(),  // Search CONS
        'filter' => $modelAnuncios,
        'columns' => array(
           //  'id',
            'title',
            'description',
           // 'file',
          //  'status',
            array(
                'name' => 'file',
                'header' => 'Documento ',
                'type' => 'raw',
                'value'=>'CHtml::link("$data->file",  "http://".$_SERVER["SERVER_NAME"].Yii::app()->request->baseUrl . "/upload/".$data->file, array("target"=>"_blank"))',
            ),
            array(
                'class'=>'CButtonColumn',
                'template'=>'{view}',
                'viewButtonUrl'=>'Yii::app()->controller->createUrl("anuncios/view",array("id"=>$data->id) )',

            ),
            /*
            'rdate',
            'udate',

            'tiposanuncio_id',
            'registros_id',
            */
            /*                'startdate',
                            'enddate',*/
            /*                array(
                                'class'=>'CButtonColumn',
                            ),*/
        ),
    ));
}

?>


