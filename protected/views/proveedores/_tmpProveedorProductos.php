
<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Nuevo Producto',
    'type'=>'primary',
    'htmlOptions'=>array(
        'onclick'=>"{addProductos(); $('#dialogProductos').dialog('open');}",
    ),
));
?>
<br>


<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'productos-grid',
    'dataProvider'=>$modelProductos->searchByProductos($id),
    'filter'=>$modelProductos,
    'columns'=>array(
        //'id',
        //'tiposproducto_id',
        array( 'name'=>'tiposproducto_id',
              'value'=>'$data->tiposproducto->name',
        ),
//        'rdate',
//        'udate',
        //'status',
        array( 'name'=>'status',
            'value'=>'$data["status"]==1?"Activo":"Inactivo"',
            'filter' => array('1' => 'Activo', '0' => 'Inactivo')
        ),
        //'registros_id',
       /* array(
            'class'=>'CButtonColumn',
            'template'=>'{view}{update}{delete}',
            'viewButtonUrl'=>'Yii::app()->controller->createUrl("productos/view",array("id"=>$data->id) )',
            'updateButtonUrl'=>'Yii::app()->controller->createUrl("productos/update",array("id"=>$data->id) )',
            'deleteButtonUrl'=>'Yii::app()->controller->createUrl("productos/delete",array("id"=>$data->id) )',
        ),*/
    ),
)); ?>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'dialogProductos',
    'options'=>array(
        'title'=>'Nuevos Productos',
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
    function addProductos()
    {
        <?php echo CHtml::ajax(array(
                'url'=>array('productos/createdialog&id='.$id.'&consorcio_id='.$consorcio_id),
                'data'=> "js:$(this).serialize()",
                'type'=>'post',
                'dataType'=>'json',
                'success'=>"function(data)
                {
                    if (data.status == 'failure')
                    {
                        $('#dialogProductos div.divForForm').html(data.div);
                              // Here is the trick: on submit-> once again this function!
                        $('#dialogProductos div.divForForm form').submit(addProductos);
                    }
                    else
                    {
                        $('#dialogProductos div.divForForm').html(data.div);
                        setTimeout(\"$('#dialogProductos').dialog('close') \",300);
                        $.fn.yiiGridView.update('productos-grid');

                    }

                } ",
                ))?>;
        return false;

    }

</script>
