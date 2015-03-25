<?php
if (Yii::app()->user->checkAccess('adm')){
?>
<div class="row">
    <?php echo $form->labelEx($modelPyme,'consorcios_id'); ?>
    <?php echo $form->dropDownList($modelPyme, 'consorcios_id',
        CHtml::listData(Consorcios::model()->findAll(), 'id', 'description'),
        array(
            'prompt'=> '(Seleccione)',
        )
    );?>
    <?php echo $form->error($modelPyme,'consorcios_id'); ?>
</div>
<?php }?>

<?php
if (Yii::app()->user->checkAccess('cons')){
    ?>
    <div class="row">
        <?php echo $form->labelEx($modelPyme,'consorcios_id'); ?>
        <?php echo $form->dropDownList($modelPyme, 'consorcios_id',
            CHtml::listData(Consorcios::model()->findAll('id=?',array(Yii::app()->user->getState('CONSORCIOID'))), 'id', 'description')

        );?>
        <?php echo $form->error($modelPyme,'consorcios_id'); ?>
    </div>
<?php }?>