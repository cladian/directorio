<?php
/* @var $this DiasentregaController */
/* @var $dataProvider CActiveDataProvider */

/*$this->breadcrumbs=array(
	'Diasentregas',
);*/


?>

<h1>Diasentregas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
