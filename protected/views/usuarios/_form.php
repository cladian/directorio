<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuarios-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo Yii::app()->params['requerido']; ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model,'email'); ?>
        <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>150)); ?>
        <?php echo $form->error($model,'email'); ?>
    </div>

<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'rdate'); ?>
<!--		--><?php //echo $form->textField($model,'rdate'); ?>
<!--		--><?php //echo $form->error($model,'rdate'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'udate'); ?>
<!--		--><?php //echo $form->textField($model,'udate'); ?>
<!--		--><?php //echo $form->error($model,'udate'); ?>
<!--	</div>-->

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
<!--		--><?php //echo $form->textField($model,'status'); ?>
        <?php echo $form->dropdownList($model,'status',
            array('1'=>'Activo','0'=>'Inactivo'),
            array(
                'style' => "width: 100px;",
            )
        ); ?>
        <?php echo $form->error($model,'status'); ?>

	</div>
    <div class="row">
        <?php echo $form->labelEx($modelAuthAssignment,'itemname'); ?>
        <?php echo $form->dropDownList($modelAuthAssignment, 'itemname',
            CHtml::listData(AuthAssignment::model()->findAll(), 'itemname', 'itemname')); ?>
        <?php echo $form->error($modelAuthAssignment,'itemname'); ?>
    </div>
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => $model->isNewRecord ? 'primary' : 'info',
        'label' => $model->isNewRecord ? 'Guardar' : 'Save',
        'loadingText'=>'Verificando...',
        'htmlOptions'=>array('id'=>'buttonSave'),
    ));
    ?>
    <script>
        $('#buttonSave').click(function() {
            var btn = $(this);
            btn.button('loading'); // call the loading function
            setTimeout(function() {
                btn.button('reset'); // call the reset function
            }, 15000);
        });
    </script>

<?php $this->endWidget(); ?>

</div><!-- form -->