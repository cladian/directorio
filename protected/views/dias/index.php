<?php
/* @var $this DiasController */
/* @var $dataProvider CActiveDataProvider */

/*$this->breadcrumbs=array(
	'Diases',
);*/


?>

<h1>Diases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
