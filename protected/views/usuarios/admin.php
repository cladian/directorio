<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */

/*$this->breadcrumbs=array(
	'Usuarioses'=>array('index'),
	'Manage',
);*/



Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('usuarios-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Administración de Usuarios</h3>


<?php /*echo Yii::app()->params['searchText'];*/?><!----><?php /*echo CHtml::link(Yii::app()->params['searchTitle'],'#',array('class'=>'search-button')); */?>

<!--<div class="search-form" style="display:none">
<?php /*$this->renderPartial('_search',array(
	'model'=>$model,
)); */?>
</div>-->

<!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'usuarios-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
        array(
            'name'=>'id',
            'htmlOptions' => array('width' => '5%'),
        ),
		'username',
		'email',
		'rdate',
	//	'udate',
		//'status',
        array( 'name'=>'status',
            'value'=>'$data["status"]==1?"Activo":"Inactivo"',
            'filter' => array('1' => 'Activo', '0' => 'Inactivo')
        ),
		/*array(
			'class'=>'CButtonColumn',
		),
		*/
	),
)); ?>
<hr/>
&nbsp;
<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'label' => 'Nuevo Usuario (solo usuario)',
    'type' => 'danger',
    'url'=>Yii::app()->controller->createUrl("usuarios/create"),

));
?>

