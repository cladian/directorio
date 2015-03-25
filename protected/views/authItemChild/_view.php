<?php
/* @var $this AuthItemChildController */
/* @var $data AuthItemChild */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('parent')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->parent), array('view', 'id'=>$data->parent.'|'.$data->child)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('child')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->child), array('view', 'id'=>$data->parent.'|'.$data->child)); ?>
	<br />


</div>