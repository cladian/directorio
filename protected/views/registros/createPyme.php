<?php
/* @var $this RegistrosController */
/* @var $model Registros */

/*$this->breadcrumbs=array(
	'Registroses'=>array('index'),
	'Create',
);*/

?>

<h3>Nueva Pyme</h3>

<?php echo $this->renderPartial('_formPyme', array(
    'model'=>$model,
    'modelUsuario'=>$modelUsuario,
    'modelPyme'=>$modelPyme,
    'tipoRegistro'=>$tipoRegistro,
));

?>