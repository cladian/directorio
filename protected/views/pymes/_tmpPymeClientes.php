
<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'label' => 'Nuevo Cliente',
    'type' => 'primary',
    //'url'=>Yii::app()->controller->createUrl("registros/createcli"),
    'htmlOptions'=>array(
        'onclick'=>"{addClientes(); $('#dialogClientes').dialog('open');}",
    ),
));
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'clientes-grid',
    'dataProvider'=>$modelClientes->searchByIdPyme($id),
    'filter'=>$modelClientes,
    'columns'=>array(
       // 'id',

        array(
            'header'=>'Cliente',

            'name'=>'registros_id',
            'value'=>'$data->registros->name',
        ),
/*        array(
            'header'=>'Pyme',
            'name'=>'registros_idc',
            'value'=>'$data->registrosIdc->name',
        ),*/

        //'status',
        array( 'name'=>'status',
            'value'=>'$data["status"]==1?"Activo":"Inactivo"',
            'filter' => array('1' => 'Activo', '0' => 'Inactivo')
        ),

        'rdate',
        // 'udate',
        array(
            'class'=>'CButtonColumn',
            'template'=>'{view}',
            'viewButtonUrl'=>'Yii::app()->controller->createUrl("clientes/view",array("id"=>$data->id) )',
            'updateButtonUrl'=>'Yii::app()->controller->createUrl("clientes/update",array("id"=>$data->id) )',
            'deleteButtonUrl'=>'Yii::app()->controller->createUrl("scale/delete",array("id"=>$data->id) )',
        ),
    ),
)); ?>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'dialogClientes',
    'options'=>array(
        'title'=>'Nuevo Registro de Cliente',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>800,
        'height'=>600,
    ),
));?>

<div class="divForForm"></div>

<?php $this->endWidget();?>

<script type="text/javascript">
    // here is the magic
    function addClientes()
    {
        <?php echo CHtml::ajax(array(
                //'url'=>array('clientes/createdialog&id='.$id),
                'url'=>array('registros/createdialogcliente&id='.$id),
                'data'=> "js:$(this).serialize()",
                'type'=>'post',
                'dataType'=>'json',
                'success'=>"function(data)
                {
                    if (data.status == 'failure')
                    {
                        $('#dialogClientes div.divForForm').html(data.div);
                              // Here is the trick: on submit-> once again this function!
                        $('#dialogClientes div.divForForm form').submit(addClientes);
                    }
                    else
                    {
                        $('#dialogClientes div.divForForm').html(data.div);
                        setTimeout(\"$('#dialogClientes').dialog('close') \",300);
                        $.fn.yiiGridView.update('clientes-grid');
                    }

                } ",
                ))?>;
        return false;

    }

</script>