<?php
/* @var $this AuthAssignmentController */
/* @var $model AuthAssignment */

/*$this->breadcrumbs=array(
	'Auth Assignments'=>array('index'),
        $model->itemname=>array('view','id'=>$model->itemname.'|'.$model->userid),
	'Update',
);*/

$this->menu=array(
	array('label'=>'List AuthAssignment', 'url'=>array('index')),
	array('label'=>'Create AuthAssignment', 'url'=>array('create')),
	array('label'=>'View AuthAssignment', 'url'=>array('view', 'id'=>$model->itemname.'|'.$model->userid)),
	array('label'=>'Manage AuthAssignment', 'url'=>array('admin')),
);
?>


<h1>Update AuthAssignment <?php echo $model->itemname.'|'.$model->userid; ?></h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>