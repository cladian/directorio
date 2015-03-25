<?php
/* @var $this ContactosController */
/* @var $dataProvider CActiveDataProvider */

/*$this->breadcrumbs=array(
	'Contactoses',
);*/


?>

<h1>Contactoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
