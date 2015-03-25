<?php
/* @var $this CoberturasController */
/* @var $dataProvider CActiveDataProvider */

/*$this->breadcrumbs=array(
	'Coberturases',
);*/


?>

<h1>Coberturases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
