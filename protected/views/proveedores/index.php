<?php
/* @var $this ProveedoresController */
/* @var $dataProvider CActiveDataProvider */

/*$this->breadcrumbs=array(
	'Proveedores',
);*/


?>

<h1>Proveedores</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
