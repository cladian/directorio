<?php
/* @var $this ConsorciosController */
/* @var $model Consorcios */

/*$this->breadcrumbs=array(
	'Consorcioses'=>array('index'),
        $model->id=>array('view','id'=>$model->id),
	'Update',
);*/

$this->menu=array(
	array('label'=>'List Consorcios', 'url'=>array('index')),
	array('label'=>'Create Consorcios', 'url'=>array('create')),
	array('label'=>'View Consorcios', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Consorcios', 'url'=>array('admin')),
);
?>


<h3>Actualización de Consorcios </h3>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>