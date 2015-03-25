<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Nueva Cobertura',
    'type'=>'primary',
    'htmlOptions'=>array(
        'onclick'=>"{addCobertura(); $('#dialogCoberturas').dialog('open');}",
    ),
));
?>
<br>
<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'coberturas-grid',
    'dataProvider'=>$modelCoberturas->searchByCoberturas($id),
    'filter'=>$modelCoberturas,
    'columns'=>array(
        //'id',
        //'provincias_id',
        array( 'name'=>'provincias_id',
            'value'=>'$data->provincias->name',
        ),
        //'status',
        array( 'name'=>'status',
            'value'=>'$data["status"]==1?"Activo":"Inactivo"',
            'filter' => array('1' => 'Activo', '0' => 'Inactivo')
        ),
        //'registros_id',

        array(
            'class'=>'CButtonColumn',
            // 'template'=>'{view}{update}{delete}',
            'template'=>'{delete}',
//            'viewButtonUrl'=>'Yii::app()->controller->createUrl("coberturas/view",array("id"=>$data->id) )',
//            'updateButtonUrl'=>'Yii::app()->controller->createUrl("coberturas/update",array("id"=>$data->id) )',
            'deleteButtonUrl'=>'Yii::app()->controller->createUrl("coberturas/delete",array("id"=>$data->id) )',
        ),
    ),
)); ?>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'dialogCoberturas',
    'options'=>array(
        'title'=>'Nuevo Registro de Coberturas',
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
    function addCobertura()
    {
        <?php echo CHtml::ajax(array(
                'url'=>array('coberturas/createdialog&id='.$id),
                'data'=> "js:$(this).serialize()",
                'type'=>'post',
                'dataType'=>'json',
                'success'=>"function(data)
                {
                    if (data.status == 'failure')
                    {
                        $('#dialogCoberturas div.divForForm').html(data.div);
                              // Here is the trick: on submit-> once again this function!
                        $('#dialogCoberturas div.divForForm form').submit(addCobertura);
                    }
                    else
                    {
                        $('#dialogCoberturas div.divForForm').html(data.div);
                        setTimeout(\"$('#dialogCoberturas').dialog('close') \",300);
                        $.fn.yiiGridView.update('coberturas-grid');
                    }

                } ",
                ))?>;
        return false;

    }

</script>