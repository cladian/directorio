<?php
/* @var $this ClasificaciontiposproveedorController */
/* @var $dataProvider CActiveDataProvider */

/*$this->breadcrumbs=array(
	'Clasificaciontiposproveedors',
);*/


?>

<h1>Clasificación de Proveedores</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
