<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */

/*$this->breadcrumbs=array(
	'Usuarioses'=>array('index'),
	'Manage',
);*/

?>

<h3>Actualización de Perfil Usuario: <i> <?php echo $model->username; ?></i></h3>
<?php echo $this->renderPartial('_formUpdate', array('model'=>$model)); ?>