<?php
/* @var $this PymesController */
/* @var $dataProvider CActiveDataProvider */

/*$this->breadcrumbs=array(
	'Pymes',
);*/


?>

<h1>Pymes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
