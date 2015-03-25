<?php
/* @var $this ClasificaciontiposproveedorController */
/* @var $model Clasificaciontiposproveedor */

/*$this->breadcrumbs=array(
	'Clasificaciontiposproveedors'=>array('index'),
        $model->name=>array('view','id'=>$model->id),
	'Update',
);*/


?>


<h3> Actualización de Clasificación: <?php echo $model->name; ?></h3>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>