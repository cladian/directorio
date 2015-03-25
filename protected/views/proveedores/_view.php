<?php
/* @var $this ProveedoresController */
/* @var $data Proveedores */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rdate')); ?>:</b>
	<?php echo CHtml::encode($data->rdate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('udate')); ?>:</b>
	<?php echo CHtml::encode($data->udate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('registros_id')); ?>:</b>
	<?php echo CHtml::encode($data->registros_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('registros_idp')); ?>:</b>
	<?php echo CHtml::encode($data->registros_idp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tiposproveedor_id')); ?>:</b>
	<?php echo CHtml::encode($data->tiposproveedor_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('clasificaciontiposproveedor_id')); ?>:</b>
	<?php echo CHtml::encode($data->clasificaciontiposproveedor_id); ?>
	<br />

	*/ ?>

</div>