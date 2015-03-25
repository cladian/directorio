<?php
/* @var $this ProductosController */
/* @var $dataProvider CActiveDataProvider */

/*$this->breadcrumbs=array(
	'Productoses',
);*/


?>

<h1>Productoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
