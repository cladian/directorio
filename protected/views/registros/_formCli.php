<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'registros-form',
	'enableAjaxValidation'=>false,
)); ?>

    <?php echo Yii::app()->params['requerido']; ?>
    <?php echo $form->errorSummary($model,'INFORMACIÓN DE REGISTRO'); ?>
    <?php echo $form->errorSummary($modelCliente,'INFORMACIÓN DE PYME'); ?>


    <?php
    $this->widget('bootstrap.widgets.TbTabs', array(
            'tabs'=>array(
                array(
                    'id'=>'tabcli1',
                    'active'=>true,
                    'label'=>'Información de Registro',
                    'content'=>$this->renderPartial("_tmpRegistro", array('model' => $model,'form'=>$form,'tipoRegistro'=>$tipoRegistro),true),
                ),
                array(
                    'id'=>'tabcli2',
                    'active'=>false,
                    'label'=>'Información de Pyme',
                    'content'=>$this->renderPartial("_tmpRegistroClientes", array('modelCliente' => $modelCliente,'form'=>$form,'id'=>$id),true),
                ),
            ))
    );

    ?>

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