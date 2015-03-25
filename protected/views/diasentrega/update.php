<?php
/* @var $this DiasentregaController */
/* @var $model Diasentrega */

/*$this->breadcrumbs=array(
	'Diasentregas'=>array('index'),
        $model->name=>array('view','id'=>$model->id),
	'Update',
);*/


?>


<h3>Actualización de  Dia de Entrega:  <?php echo $model->name; ?></h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>