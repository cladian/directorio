<?php
/* @var $this TiposregistroController */
/* @var $dataProvider CActiveDataProvider */

/*$this->breadcrumbs=array(
	'Tiposregistros',
);*/

$this->menu=array(
	array('label'=>'Crear registro', 'url'=>array('create')),
	array('label'=>'Administración de registro', 'url'=>array('admin')),
);
?>

<h1>Tipos de registros</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
