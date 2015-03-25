<?php
/* @var $this ConsorciosController */
/* @var $dataProvider CActiveDataProvider */

/*$this->breadcrumbs=array(
	'Consorcioses',
);*/


?>

<h1>Consorcioses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
