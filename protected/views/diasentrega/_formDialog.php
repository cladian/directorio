<?php
/* @var $this DiasentregaController */
/* @var $model Diasentrega */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'diasentrega-form',
        'enableAjaxValidation'=>false,
    )); ?>

    <?php echo Yii::app()->params['requerido']; ?>

    <?php echo $form->errorSummary($model); ?>

<!--    <div class="row">-->
<!--        --><?php //echo $form->labelEx($model,'name'); ?>
<!--        --><?php //echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
<!--        --><?php //echo $form->error($model,'name'); ?>
<!--    </div>-->

    <div class="row">
        <?php echo $form->labelEx($model,'frecuency'); ?>
<!--        --><?php //echo $form->textField($model,'frecuency',array('size'=>2,'maxlength'=>2)); ?>
        <?php echo $form->dropdownList($model,'frecuency',
            array('O'=>' Ocacional ','PP'=>'Por Pedido'),
            array(
                'style' => "width: 300px;",
            )
        ); ?>
        <?php echo $form->error($model,'frecuency'); ?>

    </div>

    <div class="row" style="display: none;">
        <?php echo $form->labelEx($model,'status'); ?>
        <?php echo $form->textField($model,'status'); ?>
        <?php echo $form->error($model,'status'); ?>
    </div>

<!--    <div class="row">-->
<!--        --><?php //echo $form->labelEx($model,'rdate'); ?>
<!--        --><?php //echo $form->textField($model,'rdate'); ?>
<!--        --><?php //echo $form->error($model,'rdate'); ?>
<!--    </div>-->
<!---->
<!--    <div class="row">-->
<!--        --><?php //echo $form->labelEx($model,'udate'); ?>
<!--        --><?php //echo $form->textField($model,'udate'); ?>
<!--        --><?php //echo $form->error($model,'udate'); ?>
<!--    </div>-->

    <div class="row">
        <?php echo $form->labelEx($model,'dias_id'); ?>
        <?php echo(
        $form->dropDownList($model, 'dias_id',
            CHtml::listData(Dias::model()->findAll(), 'id', 'name'),
            array(
                'prompt'=> '(Seleccione)',
            )
        )
        ); ?>
        <?php echo $form->error($model,'dias_id'); ?>
    </div>

    <div class="row" style="display: none;">
        <?php echo $form->labelEx($model,'registros_id'); ?>
        <?php echo(
        $form->dropDownList($model, 'registros_id',
            CHtml::listData(Registros::model()->findAll('id=? and status=1', array ($id)), 'id', 'name'))); ?>
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
