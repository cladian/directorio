<?php
/* @var $this ClientesController */
/* @var $model Clientes */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'clientes-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo Yii::app()->params['requerido']; ?>

	<?php echo $form->errorSummary($model); ?>

	<!--<div class="row">
		<?php /*echo $form->labelEx($model,'rdate'); */?>
		<?php /*echo $form->textField($model,'rdate'); */?>
		<?php /*echo $form->error($model,'rdate'); */?>
	</div>

	<div class="row">
		<?php /*echo $form->labelEx($model,'udate'); */?>
		<?php /*echo $form->textField($model,'udate'); */?>
		<?php /*echo $form->error($model,'udate'); */?>
	</div>-->

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
		<?php echo $form->labelEx($model,'registros_id'); ?>
		<?php echo $form->textField($model,'registros_id'); ?>
		<?php echo $form->error($model,'registros_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'registros_idc'); ?>
		<?php echo $form->textField($model,'registros_idc'); ?>
		<?php echo $form->error($model,'registros_idc'); ?>
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