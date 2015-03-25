<?php
/* @var $this RegistrosController */
/* @var $model Registros */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'registros-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo Yii::app()->params['requerido']; ?>
    <?php echo $form->errorSummary($model,'INFORMACIÓN DE REGISTRO'); ?>
    <?php echo $form->errorSummary($modelProveedor,'INFORMACIÓN DE PYME'); ?>

    <?php
    $this->widget('bootstrap.widgets.TbTabs', array(
            'tabs'=>array(
                array(
                    'id'=>'tabpro1',
                    'active'=>true,
                    'label'=>'Información de Registro',
                    'content'=>$this->renderPartial("_tmpRegistro", array('model' => $model,'form'=>$form,'tipoRegistro'=>$tipoRegistro),true),
                ),
                array(
                    'id'=>'tabpro2',
                    'active'=>false,
                    'label'=>'Información de Proveedor',
                    'content'=>$this->renderPartial("_tmpRegistroProveedores", array('modelProveedor' => $modelProveedor,'form'=>$form,'id'=>$id),true,true),
                ),
                /* array(
                     'id'=>'tab3',
                     'active'=>false,
                     'label'=>'Información de Consorcio',
                     'content'=>$this->renderPartial("_tmpPyme", array('modelPyme' => $modelPyme,'form'=>$form),true),
                 ),*/

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

<?php $this->endWidget(); ?>

</div><!-- form -->