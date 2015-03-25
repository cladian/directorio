<?php
/* @var $this TiposanuncioController */
/* @var $dataProvider CActiveDataProvider */

/*$this->breadcrumbs=array(
	'Tiposanuncios',
);*/


?>

<h1>Tipos de Anuncios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
