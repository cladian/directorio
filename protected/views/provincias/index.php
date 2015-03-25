<?php
/* @var $this ProvinciasController */
/* @var $dataProvider CActiveDataProvider */

/*$this->breadcrumbs=array(
	'Provinciases',
);*/


?>

<h1>Provincias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
