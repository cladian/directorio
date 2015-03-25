
<!--
    <div class="row">
        <?php /*echo $form->labelEx($modelCliente,'rdate'); */?>
        <?php /*echo $form->textField($modelCliente,'rdate'); */?>
        <?php /*echo $form->error($modelCliente,'rdate'); */?>
    </div>

    <div class="row">
        <?php /*echo $form->labelEx($modelCliente,'udate'); */?>
        <?php /*echo $form->textField($modelCliente,'udate'); */?>
        <?php /*echo $form->error($modelCliente,'udate'); */?>
    </div>

    <div class="row">
        <?php /*echo $form->labelEx($modelCliente,'status'); */?>
        <?php /*echo $form->textField($modelCliente,'status'); */?>
        <?php /*echo $form->error($modelCliente,'status'); */?>
    </div>-->

<!--    <div class="row">
        <?php /*echo $form->labelEx($modelCliente,'registros_id'); */?>
        <?php /*echo $form->textField($modelCliente,'registros_id'); */?>
        <?php /*echo $form->error($modelCliente,'registros_id'); */?>
    </div>
-->
    <div class="row">
        <?php echo $form->labelEx($modelCliente,'registros_idc'); ?>


        <?php echo $form->dropDownList($modelCliente, 'registros_idc',
            CHtml::listData(Registros::model()->findAll('tiposregistro_id=? and id=?',array(Yii::app()->params['idPyme'],$id)), 'id', 'name')
        ); ?>
        <?php echo $form->error($modelCliente,'registros_idc'); ?>

    </div>
