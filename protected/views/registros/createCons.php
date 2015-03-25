<?php
/* @var $this RegistrosController */
/* @var $model Registros */

/*$this->breadcrumbs=array(
	'Registroses'=>array('index'),
	'Create',
);*/


?>

<h3>Nuevo Consorcio</h3>

<?php echo $this->renderPartial('_formCons', array(
    'model'=>$model,
    'modelUsuario'=>$modelUsuario,
    'modelConsorcio'=>$modelConsorcio,
    'tipoRegistro'=>$tipoRegistro,
));
?>