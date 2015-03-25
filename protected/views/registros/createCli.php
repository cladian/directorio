<?php
/* @var $this RegistrosController */
/* @var $model Registros */

/*$this->breadcrumbs=array(
	'Registroses'=>array('index'),
	'Create',
);*/


?>

<h1>Nuevo Cliente</h1>

<?php echo $this->renderPartial('_formCli', array(
    'model'=>$model,
    'modelCliente'=>$modelCliente,
    'tipoRegistro'=>$tipoRegistro,

)); ?>