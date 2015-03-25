
<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Nuevo Contacto',
    'type'=>'primary',
    'htmlOptions'=>array(
        'onclick'=>"{addContacto(); $('#dialogContacto').dialog('open');}",
    ),
));
?>
<br>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'contactos-grid',
    'dataProvider'=>$modelContacto->searchByRegistro($id),
    'filter'=>$modelContacto,
    'columns'=>array(
        //'tiposcontacto_id',
        array(
            'name'=>'tiposcontacto_id',
            'value'=>'$data->tiposcontacto->name',
            'filter'=>CHtml::listData(Tiposcontacto::model()->findAll(),'id','name'),
            'htmlOptions' => array('width' => '15%'),
        ),
        'data',
        //  'rdate',
        //  'udate',
        //'status',
        array( 'name'=>'status',
            'value'=>'$data["status"]==1?"Activo":"Inactivo"',
            'filter' => array('1' => 'Activo', '0' => 'Inactivo')
        ),
        /*
        'registros_id',
        */
        array(
            'class'=>'CButtonColumn',
            // 'template'=>'{view}{update}{delete}',
            'template'=>'{delete}',
//            'viewButtonUrl'=>'Yii::app()->controller->createUrl("contactos/view",array("id"=>$data->id) )',
//            'updateButtonUrl'=>'Yii::app()->controller->createUrl("contactos/update",array("id"=>$data->id) )',
            'deleteButtonUrl'=>'Yii::app()->controller->createUrl("contactos/delete",array("id"=>$data->id) )',
        ),
    ),
)); ?>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'dialogContacto',
    'options'=>array(
        'title'=>'Nuevo Registro de Contacto',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>550,
        'height'=>470,
    ),
));?>

<div class="divForForm"></div>

<?php $this->endWidget();?>

<script type="text/javascript">
    // here is the magic
    function addContacto()
    {
        <?php echo CHtml::ajax(array(
                'url'=>array('contactos/createdialog&id='.$id),
                'data'=> "js:$(this).serialize()",
                'type'=>'post',
                'dataType'=>'json',
                'success'=>"function(data)
                {
                    if (data.status == 'failure')
                    {
                        $('#dialogContacto div.divForForm').html(data.div);
                              // Here is the trick: on submit-> once again this function!
                        $('#dialogContacto div.divForForm form').submit(addContacto);
                    }
                    else
                    {
                        $('#dialogContacto div.divForForm').html(data.div);
                        setTimeout(\"$('#dialogContacto').dialog('close') \",300);
                        $.fn.yiiGridView.update('contactos-grid');
                    }

                } ",
                ))?>;
        return false;

    }

</script>