<?php
/* @var $this AnunciosController */
/* @var $model Anuncios */

/*$this->breadcrumbs=array(
	'Anuncioses'=>array('index'),
        $model->title=>array('view','id'=>$model->id),
	'Update',
);*/


?>


<h1>Update Anuncios <?php echo $model->id; ?></h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>