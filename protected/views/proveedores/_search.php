<?php
/* @var $this ProveedoresController */
/* @var $model Proveedores */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rdate'); ?>
		<?php echo $form->textField($model,'rdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'udate'); ?>
		<?php echo $form->textField($model,'udate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'registros_id'); ?>
		<?php echo $form->textField($model,'registros_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'registros_idp'); ?>
		<?php echo $form->textField($model,'registros_idp'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tiposproveedor_id'); ?>
		<?php echo $form->textField($model,'tiposproveedor_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'clasificaciontiposproveedor_id'); ?>
		<?php echo $form->textField($model,'clasificaciontiposproveedor_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->