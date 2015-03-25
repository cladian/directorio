<?php
/* @var $this RegistrosController */
/* @var $dataProvider CActiveDataProvider */

/*$this->breadcrumbs=array(
	'Registroses',
);*/

$this->menu=array(
	array('label'=>'Create Registros', 'url'=>array('create')),
	array('label'=>'Manage Registros', 'url'=>array('admin')),
);
?>

<h1>Registroses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
