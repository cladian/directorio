<?php
/* @var $this RegistrosController */
/* @var $model Registros */

/*$this->breadcrumbs=array(
	'Registroses'=>array('index'),
        $model->name=>array('view','id'=>$model->id),
	'Update',
);*/


?>


<h1>Update Registros <?php echo $model->id; ?></h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>