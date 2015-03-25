<?php
/* @var $this ClasificaciontiposproveedorController */
/* @var $model Clasificaciontiposproveedor */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'clasificaciontiposproveedor-form',
        'enableAjaxValidation' => false,
    )); ?>
    <?php echo Yii::app()->params['requerido']; ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'name'); ?>
        <?php echo $form->textField($model, 'name', array('size' => 45, 'maxlength' => 45)); ?>
        <?php echo $form->error($model, 'name'); ?>
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

<!--    <div class="row">-->
<!--        --><?php //echo $form->labelEx($model, 'status'); ?>
<!--        --><?php //echo $form->textField($model, 'status'); ?>
<!--        --><?php //echo $form->error($model, 'status'); ?>
<!--    </div>-->

    <div class="row">
        <?php echo $form->labelEx($model, 'tiposproveedor_id'); ?>
        <?php
        echo $form->dropDownList
            (
                $model, 'tiposproveedor_id',
                CHtml::listData(Tiposproveedor::model()->findAll(), 'id', 'name'),
                array('prompt' => '(Seleccione)',));?>
        <?php echo $form->error($model, 'tiposproveedor_id'); ?>
    </div>

    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => $model->isNewRecord ? 'primary' : 'info',
        'label' => $model->isNewRecord ? 'Guardar' : 'Guardar',
        'loadingText' => 'Verificando...',
        'htmlOptions' => array('id' => 'buttonSave'),
    ));
    ?>
    <script>
        $('#buttonSave').click(function () {
            var btn = $(this);
            btn.button('loading'); // call the loading function
            setTimeout(function () {
                btn.button('reset'); // call the reset function
            }, 15000);
        });
    </script>

    <?php $this->endWidget(); ?>

</div><!-- form -->