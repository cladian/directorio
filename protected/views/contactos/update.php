<?php
/* @var $this ContactosController */
/* @var $model Contactos */

/*$this->breadcrumbs=array(
	'Contactoses'=>array('index'),
        $model->id=>array('view','id'=>$model->id),
	'Update',
);*/


?>


<h3>Actualización de Contacto:  <?php echo $model->data; ?></h3>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>