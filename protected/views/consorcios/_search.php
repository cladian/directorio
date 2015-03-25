<?php
/* @var $this ConsorciosController */
/* @var $model Consorcios */
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
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>45,'maxlength'=>45)); ?>
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
		<?php echo $form->label($model,'provincias_id'); ?>
		<?php echo $form->textField($model,'provincias_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tiposoperacion_id'); ?>
		<?php echo $form->textField($model,'tiposoperacion_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'registros_id'); ?>
		<?php echo $form->textField($model,'registros_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->