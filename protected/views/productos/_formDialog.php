<?php
/* @var $this ProductosController */
/* @var $model Productos */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'productos-form',
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'tiposproducto_id'); ?>
		<?php echo $form->dropDownList($model, 'tiposproducto_id',
                    CHtml::listData(Tiposproducto::model()->findAll('consorcios_id=? and status=1', array($consorcio_id)), 'id', 'name'),
            array(
                'prompt'=>'(Seleccione)',
            )
        );
        ?>
		<?php echo $form->error($model,'tiposproducto_id'); ?>
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

	<div class="row" style="display: none;">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

    <div class="row" style="display: none;">
        <?php echo $form->labelEx($model,'registros_id'); ?>
        <?php echo(
        $form->dropDownList($model, 'registros_id',
            CHtml::listData(Registros::model()->findAll('id=? and status=1',array($id)), 'id', 'name')
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