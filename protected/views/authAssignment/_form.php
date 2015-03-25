<?php
/* @var $this AuthAssignmentController */
/* @var $model AuthAssignment */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'auth-assignment-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo Yii::app()->params['requerido']; ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'itemname'); ?>
        <?php echo $form->dropDownList($model, 'itemname',
            CHtml::listData(AuthAssignment::model()->findAll(), 'itemname', 'itemname'), array( 'prompt'=>'(Seleccione)')); ?>
		<?php echo $form->error($model,'itemname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'userid'); ?>
		<?php echo $form->textField($model,'userid',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'userid'); ?>
	</div>

<!--	<div class="row">
		<?php /*echo $form->labelEx($model,'bizrule'); */?>
		<?php /*echo $form->textArea($model,'bizrule',array('rows'=>6, 'cols'=>50)); */?>
		<?php /*echo $form->error($model,'bizrule'); */?>
	</div>

	<div class="row">
		<?php /*echo $form->labelEx($model,'data'); */?>
		<?php /*echo $form->textArea($model,'data',array('rows'=>6, 'cols'=>50)); */?>
		<?php /*echo $form->error($model,'data'); */?>
	</div>
-->
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => $model->isNewRecord ? 'primary' : 'info',
        'label' => $model->isNewRecord ? 'Guardar' : 'Guardar',
        'loadingText'=>'Verificando...',
        'htmlOptions'=>array('id'=>'buttonSave'),
    ));
    ?>


    <?php $this->endWidget(); ?>

</div><!-- form -->