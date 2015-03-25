<?php
/* @var $this ObservacionesController */
/* @var $dataProvider CActiveDataProvider */

/*$this->breadcrumbs=array(
	'Observaciones',
);*/


?>

<h1>Observaciones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
