<?php
/* @var $this AuthItemController */
/* @var $model AuthItem */

/*$this->breadcrumbs=array(
	'Auth Items'=>array('index'),
	'Create',
);*/

$this->menu=array(
	array('label'=>'List AuthItem', 'url'=>array('index')),
	array('label'=>'Manage AuthItem', 'url'=>array('admin')),
);
?>

<h3>Nuevo Perfil</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>