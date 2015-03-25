<?php
/* @var $this TiposoperacionController */
/* @var $dataProvider CActiveDataProvider */

/*$this->breadcrumbs=array(
	'Tiposoperacions',
);*/

$this->menu=array(
	array('label'=>'Crear Tiposoperacion', 'url'=>array('create')),
	array('label'=>'Administración  Tiposoperacion', 'url'=>array('admin')),
);
?>

<h1>Tipos de Operacion</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
