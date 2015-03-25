<?php
/* @var $this CoberturasController */
/* @var $model Coberturas */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'coberturas-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo Yii::app()->params['requerido']; ?>

	<?php echo $form->errorSummary($model); ?>

<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'id'); ?>
<!--		--><?php //echo $form->textField($model,'id'); ?>
<!--		--><?php //echo $form->error($model,'id'); ?>
<!--	</div>-->

	<div class="row">
		<?php echo $form->labelEx($model,'provincias_id'); ?>
        <?php echo(
        $form->dropDownList($model, 'provincias_id',
            CHtml::listData(Provincias::model()->findAll(), 'id', 'name'),
            array(
                'prompt'=> '(Seleccione)',
            )
        )

        ); ?>
		<?php echo $form->error($model,'provincias_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
<!--		--><?php //echo $form->textField($model,'status'); ?>
        <?php echo $form->dropdownList($model,'status',
            array('1'=>'Activo','0'=>'Inactivo'),
            array(
                'style' => "width: 100px;",
            )); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'registros_id'); ?>
        <?php echo(
        $form->dropDownList($model, 'registros_id',
            CHtml::listData(Registros::model()->findAll(), 'id', 'name'),
            array(
                'prompt'=> '(Seleccione)',
            )
        )

        ); ?>
		<?php echo $form->error($model,'registros_id'); ?>
	</div>

    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => $model->isNewRecord ? 'primary' : 'info',
        'label' => $model->isNewRecord ? 'Guardar' : 'Guardar',
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