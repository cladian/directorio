<?php
/* @var $this TiposoperacionController */
/* @var $model Tiposoperacion */

/*$this->breadcrumbs=array(
	'Tiposoperacions'=>array('index'),
        $model->name=>array('view','id'=>$model->id),
	'Update',
);*/


?>


<h3>Actualización de:  <?php echo $model->name; ?></h3>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>