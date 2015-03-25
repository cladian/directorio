<?php
/* @var $this ObservacionesController */
/* @var $model Observaciones */

/*$this->breadcrumbs=array(
	'Observaciones'=>array('index'),
        $model->name=>array('view','id'=>$model->id),
	'Update',
);*/


?>


<h1>Update Observaciones <?php echo $model->id; ?></h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>