<div class="row">
    <?php echo $form->labelEx($modelConsorcio,'provincias_id'); ?>
    <?php
    echo $form->dropDownList($modelConsorcio, 'provincias_id',
        CHtml::listData(Provincias::model()->findAll(), 'id', 'name'),
        array(
            'prompt'=> '(Seleccione)',
        )
    );?>
    <?php echo $form->error($modelConsorcio,'provincias_id'); ?>
</div>



<div class="row">
    <?php echo $form->labelEx($modelConsorcio,'tiposoperacion_id'); ?>
    <?php
    echo $form->dropDownList($modelConsorcio, 'tiposoperacion_id',
        CHtml::listData(Tiposoperacion::model()->findAll(), 'id', 'name'),
        array(
            'prompt'=> '(Seleccione)',
        )
    );?>
    <?php echo $form->error($modelConsorcio,'tiposoperacion_id'); ?>
</div>

