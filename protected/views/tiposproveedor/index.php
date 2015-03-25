<?php
/* @var $this TiposproveedorController */
/* @var $dataProvider CActiveDataProvider */

/*$this->breadcrumbs=array(
	'Tiposproveedors',
);*/

$this->menu=array(
	array('label'=>'Crear proveedor', 'url'=>array('create')),
	array('label'=>'Administración de proveedor', 'url'=>array('admin')),
);
?>

<h1>Tipos de proveedor</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
