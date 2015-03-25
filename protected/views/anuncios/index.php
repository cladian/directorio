<?php
/* @var $this AnunciosController */
/* @var $dataProvider CActiveDataProvider */

/*$this->breadcrumbs=array(
	'Anuncioses',
);*/


?>

<h1>Anuncioses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
