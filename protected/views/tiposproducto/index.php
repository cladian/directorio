<?php
/* @var $this TiposproductoController */
/* @var $dataProvider CActiveDataProvider */

/*$this->breadcrumbs=array(
	'Tiposproductos',
);*/

$this->menu=array(
	array('label'=>'Create Tiposproducto', 'url'=>array('create')),
	array('label'=>'Manage Tiposproducto', 'url'=>array('admin')),
);
?>

<h1>Tiposproductos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
