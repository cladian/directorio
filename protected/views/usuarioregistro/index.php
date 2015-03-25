<?php
/* @var $this UsuarioregistroController */
/* @var $dataProvider CActiveDataProvider */

/*$this->breadcrumbs=array(
	'Usuarioregistros',
);*/

$this->menu=array(
	array('label'=>'Create Usuarioregistro', 'url'=>array('create')),
	array('label'=>'Manage Usuarioregistro', 'url'=>array('admin')),
);
?>

<h1>Usuarioregistros</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
