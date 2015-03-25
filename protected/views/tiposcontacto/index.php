<?php
/* @var $this TiposcontactoController */
/* @var $dataProvider CActiveDataProvider */

/*$this->breadcrumbs=array(
	'Tiposcontactos',
);*/

$this->menu=array(
	array('label'=>'Crear contacto', 'url'=>array('create')),
	array('label'=>'Administración de contacto', 'url'=>array('admin')),
);
?>

<h1>Tipos de Contactos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
