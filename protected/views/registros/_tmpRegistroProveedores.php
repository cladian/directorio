
    <div class="row" style="display: none;">
        <?php echo $form->labelEx($modelProveedor,'registros_idp'); ?>

        <?php echo $form->dropDownList($modelProveedor, 'registros_idp',
            CHtml::listData(Registros::model()->findAll('tiposregistro_id=? and id=?',array(Yii::app()->params['idPyme'],$id)), 'id', 'name')
        ); ?>
        <?php echo $form->error($modelProveedor,'registros_idp'); ?>
    </div>
<div class="row">
    <?php echo $form->labelEx($modelProveedor,'tiposproveedor_id'); ?>

    <?php

    echo $form->dropDownList(
        $modelProveedor, 'tiposproveedor_id',
        CHtml::listData(Tiposproveedor::model()->findAll(), 'id', 'name')
        ,
        array (
            'ajax'=>array(
                'type'=>'POST',
                'url'=>CController::createUrl('tiposproveedor/clasificacion'),
                'data'=>array('padre'=>'js:this.value'),
                'update'=>'#'.CHtml::activeId($modelProveedor,'clasificaciontiposproveedor_id'),
            ),
            'prompt'=>'Seleccione ...'
        )

    );
    ?>
    <?php echo $form->error($modelProveedor,'tiposproveedor_id'); ?>
</div>


<div class="row">
    <?php echo $form->labelEx($modelProveedor,'clasificaciontiposproveedor_id'); ?>
    <?php

    $tipo='';
    if ($modelProveedor->tiposproveedor_id)
        $tipo=$modelProveedor->tiposproveedor_id;



    echo $form->dropDownList($modelProveedor, 'clasificaciontiposproveedor_id',
        CHtml::listData(Clasificaciontiposproveedor::model()->findAll('tiposproveedor_id=?',array($tipo)), 'id', 'name')
    ); ?>
    <?php echo $form->error($modelProveedor,'clasificaciontiposproveedor_id'); ?>
</div>
<hr>
