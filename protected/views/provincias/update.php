<?php
/* @var $this ProvinciasController */
/* @var $model Provincias */

/*$this->breadcrumbs=array(
	'Provinciases'=>array('index'),
        $model->name=>array('view','id'=>$model->id),
	'Update',
);*/


?>


<h3>Actualización de la Provincia: <?php echo $model->name; ?></h3>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>