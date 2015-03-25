<?php
/* @var $this ClientesController */
/* @var $model Clientes */

/*$this->breadcrumbs=array(
	'Clientes'=>array('index'),
        $model->id=>array('view','id'=>$model->id),
	'Update',
);*/


?>


<h1>Update Clientes <?php echo $model->id; ?></h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>