<?php
/* @var $this AnunciosController */
/* @var $model Anuncios */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'anuncios-form',
        'enableAjaxValidation' => false,
        // Lineas adicionales
        'htmlOptions' => array(
            'enctype' => 'multipart/form-data',
            // fin lineas adicionales
        )
    )); ?>

    <?php echo Yii::app()->params['requerido']; ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'title'); ?>
        <?php echo $form->textField($model, 'title', array('size' => 45, 'maxlength' => 45)); ?>
        <?php echo $form->error($model, 'title'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'description'); ?>
        <?php echo $form->textField($model, 'description', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'description'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'file'); ?>

        <?php
        echo CHtml::activeFileField($model, 'file');
        //echo $form->textField($model,'file',array('size'=>45,'maxlength'=>45));
        ?>
        <?php echo $form->error($model, 'file'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'startdate'); ?>
        <?php
        if ($model->startdate != '') {
            $model->startdate = date('Y-m-d', strtotime($model->startdate));
        }
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => $model,
            'attribute' => 'startdate',
            'value' => $model->startdate,
            'language' => 'es',
            'htmlOptions' => array('readonly' => "readonly"),

            'options' => array(
                'autoSize' => true,
                'defaultDate' => $model->startdate,
                'dateFormat' => 'yy-mm-dd',
                'buttonImage' => Yii::app()->baseUrl . '/img/calendar.png',
                'buttonImageOnly' => true,
                'buttonText' => 'Fecha',
                'selectOtherMonths' => true,
                'showAnim' => 'slide',
                'showButtonPanel' => true,
                'showOn' => 'button',
                'showOtherMonths' => true,
                'changeMonth' => 'true',
                'changeYear' => 'true',
            ),
        )); ?>

        <?php echo $form->error($model, 'startdate'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'enddate'); ?>
        <?php
        if ($model->enddate != '') {
            $model->enddate = date('Y-m-d', strtotime($model->enddate));
        }
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => $model,
            'attribute' => 'enddate',
            'value' => $model->enddate,
            'language' => 'es',
            'htmlOptions' => array('readonly' => "readonly"),

            'options' => array(
                'autoSize' => true,
                'defaultDate' => $model->enddate,
                'dateFormat' => 'yy-mm-dd',
                'buttonImage' => Yii::app()->baseUrl . '/img/calendar.png',
                'buttonImageOnly' => true,
                'buttonText' => 'Fecha',
                'selectOtherMonths' => true,
                'showAnim' => 'slide',
                'showButtonPanel' => true,
                'showOn' => 'button',
                'showOtherMonths' => true,
                'changeMonth' => 'true',
                'changeYear' => 'true',
            ),
        )); ?>

        <?php echo $form->error($model, 'enddate'); ?>
    </div>


    <div class="row">
        <?php echo $form->labelEx($model, 'tiposanuncio_id'); ?>
        <?php echo(
        $form->dropDownList($model, 'tiposanuncio_id',
            CHtml::listData(Tiposanuncio::model()->findAll(), 'id', 'name'),
            array(
                'prompt' => '(Seleccione)',
            )
        )

        ); ?>
        <?php echo $form->error($model, 'tiposanuncio_id'); ?>
    </div>



    <?php
    if ((Yii::app()->user->checkAccess('adm'))) {
        ?>
        <div class="row">
            <?php echo $form->labelEx($model, 'registros_id'); ?>
            <?php echo $form->dropDownList($model, 'registros_id',
                //  CHtml::listData(Consorcios::model()->findAll(), 'id', 'description')
                CHtml::listData(Consorcios::model()->findAll(), 'id', 'description'));?>
            <?php echo $form->error($model, 'registros_id'); ?>
        </div>
    <?php
    }
    if ((Yii::app()->user->checkAccess('cons'))) {
        ?>
        <div class="row">
            <?php echo $form->labelEx($model, 'registros_id'); ?>
            <?php echo $form->dropDownList($model, 'registros_id',
                CHtml::listData(Consorcios::model()->findAll('id=?', array(Yii::app()->user->getState('CONSORCIOID'))), 'id', 'description'));?>
            <?php echo $form->error($model, 'registros_id'); ?>
        </div>
    <?php
    }
    ?>
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => $model->isNewRecord ? 'primary' : 'info',
        'label' => $model->isNewRecord ? 'Guardar' : 'Save',
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