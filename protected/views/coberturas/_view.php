<?php
/* @var $this CoberturasController */
/* @var $data Coberturas */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('provincias_id')); ?>:</b>
	<?php echo CHtml::encode($data->provincias_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('registros_id')); ?>:</b>
	<?php echo CHtml::encode($data->registros_id); ?>
	<br />


</div>