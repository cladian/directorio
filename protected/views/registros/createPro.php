<?php
/* @var $this RegistrosController */
/* @var $model Registros */

/*$this->breadcrumbs=array(
	'Registroses'=>array('index'),
	'Create',
);*/


?>

<h1>Crear Nuevo Proveedor </h1>

<?php echo $this->renderPartial('_formProDialog', array(
    'model'=>$model,
    'modelProveedor'=>$modelProveedor,
    'tipoRegistro'=>$tipoRegistro,

)); ?>