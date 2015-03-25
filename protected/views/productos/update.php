<?php
/* @var $this ProductosController */
/* @var $model Productos */

/*$this->breadcrumbs=array(
	'Productoses'=>array('index'),
        $model->id=>array('view','id'=>$model->id),
	'Update',
);*/


?>


<h3>Atualización  de Producto:  <?php echo $model->id; ?></h3>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>