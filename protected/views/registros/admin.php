<?php
/* @var $this RegistrosController */
/* @var $model Registros */

/*$this->breadcrumbs=array(
	'Registroses'=>array('index'),
	'Manage',
);*/



Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('registros-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Administración de Registros</h3>
<p>Formulario de consulta de registros a nivel general, usado para realizar consultas especificas de registros del sistema</p>



<?php /*echo Yii::app()->params['searchText'];*/?><!----><?php /*echo CHtml::link(Yii::app()->params['searchTitle'],'#',array('class'=>'search-button')); */?>


<div class="search-form" style="display:none">
    <?php $this->renderPartial('_search',array(
        'model'=>$model,
    )); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'registros-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(

        //'id',
        array(
            'name'=>'tiposregistro_id',
            'value'=>'$data->tiposregistro->name',
            'filter'=>CHtml::listData(Tiposregistro::model()->findAll(),'id','name'),
            'htmlOptions' => array('width' => '15%'),
        ),
        array(
            'name'=>'type',
            'value'=>'$data["type"]=="CI"?"CI":"RUC"',
            'htmlOptions' => array('width' => '10%'),
            'filter' => array('CI' => 'CI', 'RUC' => 'RUC')
        ),
        'code',
        'name',
        'representative',
        //'address',
        //'type',
        //'tiposregistro_id',
        array( 'name'=>'status',
            'value'=>'$data["status"]==1?"Activo":"Inactivo"',
            'filter' => array('1' => 'Activo', '0' => 'Inactivo')
        ),
        /*
        'rdate',
        'udate',

        */
        //array(
        //	'class'=>'CButtonColumn',

        //button view
        /*  array(
              'class'=>'CButtonColumn',
              'template'=>'{view}',
              'viewButtonUrl'=>'Yii::app()->controller->createUrl("registros/viewAdm",array("id"=>$data->id) )',

         ),*/
    ),


)); ?>
<hr/>
<?php
// Acceso al botón de uso exclusivo para Administradore
if (Yii::app()->user->checkAccess('adm')) {
    $this->widget('bootstrap.widgets.TbButton', array(
        'label' => 'Nuevo Consorcio',
        'type' => 'primary',
        'url' => Yii::app()->controller->createUrl("registros/createcons"),

    ));
}
?>
&nbsp;
<?php
if (Yii::app()->user->checkAccess('adm')) {
    $this->widget('bootstrap.widgets.TbButton', array(
        'label' => 'Nueva Pyme',
        'type' => 'primary',
        'url' => Yii::app()->controller->createUrl("registros/createpyme"),

    ));
}
?>

&nbsp;
<?php
// Acceso al botón de uso exclusivo para Administradore
if (Yii::app()->user->checkAccess('adm')) {
    $this->widget('bootstrap.widgets.TbButton', array(
        'label' => 'Nuevo Usuario (solo usuario)',
        'type' => 'danger',
        'url' => Yii::app()->controller->createUrl("usuarios/create"),

    ));
}
?>

