
<div class="row">
    <div >
    <?php echo $form->labelEx($model,'type'); ?>
    <?php echo $form->dropdownList($model,'type',
        array('CI'=>'Cedula de Identidad','RUC'=>'Registro Unico de Proveedor'),
        array(
            'style' => "width: 300px;",
        )
    ); ?>
    <?php echo $form->error($model,'type'); ?>
    </div>


</div>
<div class="row">
    <?php echo $form->labelEx($model,'code'); ?>
    <?php echo $form->textField($model,'code',array('size'=>45,'maxlength'=>45)); ?>
    <?php echo $form->error($model,'code'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model,'name'); ?>
    <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>200)); ?>
    <?php echo $form->error($model,'name'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model,'representative'); ?>
    <?php echo $form->textField($model,'representative',array('size'=>60,'maxlength'=>100)); ?>
    <?php echo $form->error($model,'representative'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model,'address'); ?>
    <?php echo $form->textArea($model,'address',array('rows'=>6, 'cols'=>50)); ?>
    <?php echo $form->error($model,'address'); ?>
</div>

<div class="row" style="display: none;">
    <?php echo $form->labelEx($model,'status'); ?>
    <?php echo $form->dropdownList($model,'status',
        array('1'=>'Activo','0'=>'Inactivo'),
        array(
            'style' => "width: 100px;",
        )
    ); ?>
    <?php echo $form->error($model,'status'); ?>
    <code>OCULTAR</code>
</div>


<div class="row" style="display: none;">
    <?php echo $form->labelEx($model,'tiposregistro_id'); ?>
    <?php echo $form->dropDownList($model, 'tiposregistro_id',
        CHtml::listData(Tiposregistro::model()->findAll('id=?',array($tipoRegistro)), 'id', 'name')); ?>
    <?php echo $form->error($model,'tiposregistro_id'); ?>
    <code>OCULTAR</code>
</div>