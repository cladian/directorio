<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */

/*$this->breadcrumbs=array(
	'Usuarioses'=>array('index'),
	'Manage',
);*/


?>

<h3>Nuevo Usuario</h3>

<?php echo $this->renderPartial('_form', array(
    'model'=>$model,
    'modelAuthAssignment'=>$modelAuthAssignment,
)); ?>