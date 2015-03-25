<?php
/* @var $this CoberturasController */
/* @var $model Coberturas */

/*$this->breadcrumbs=array(
	'Coberturases'=>array('index'),
        $model->id=>array('view','id'=>$model->id),
	'Update',
);*/


?>


<h3>Actulización de Cobertura: <?php echo $model->id; ?></h3>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>