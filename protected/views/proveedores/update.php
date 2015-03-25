<?php
/* @var $this ProveedoresController */
/* @var $model Proveedores */

/*$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
        $model->id=>array('view','id'=>$model->id),
	'Update',
);*/


?>


<h3>Actualización de Proveedor <?php echo $model->id; ?></h3>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>