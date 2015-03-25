<?php
/* @var $this ContactosController */
/* @var $model Contactos */
/* @var $form CActiveForm */

?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contactos-form',
	'enableAjaxValidation'=>false,
)); ?>



	<?php echo $form->errorSummary($model); ?>
    <div class="row">
        <?php echo $form->labelEx($model,'tiposcontacto_id'); ?>
        <?php echo(
        $form->dropDownList($model, 'tiposcontacto_id',
            CHtml::listData(Tiposcontacto::model()->findAll(), 'id', 'name'),
            array(
                'prompt'=>'(Seleccione)'
            )
        )
        ); ?>
        <?php echo $form->error($model,'tiposcontacto_id'); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'data'); ?>
		<?php echo $form->textField($model,'data',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'data'); ?>
	</div>

	<div class="row" style="display: none;">
		<?php echo $form->labelEx($model,'registros_id'); ?>
		<?php echo(
            $form->dropDownList($model, 'registros_id',
            CHtml::listData(Registros::model()->findAll('id=?',array($id)), 'id', 'name')
            )
        ); ?>
		<?php echo $form->error($model,'registros_id'); ?>
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