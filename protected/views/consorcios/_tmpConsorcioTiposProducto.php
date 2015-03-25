<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Nuevo Tipo de Producto',
    'type'=>'primary',
    'htmlOptions'=>array(
        'onclick'=>"{addTiposproducto(); $('#dialogTiposproducto').dialog('open');}",
    ),
));
?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'tiposproducto-grid',
    'dataProvider'=>$modelTiposProducto->searchByConsorcio($id),
    'filter'=>$modelTiposProducto,
    'columns'=>array(
        //'id',
        'name',
        'description',
        //'rdate',
        //'udate',
        //'status',
        array( 'name'=>'status',
            'value'=>'$data["status"]==1?"Activo":"Inactivo"',
            'filter' => array('1' => 'Activo', '0' => 'Inactivo')
        ),
        //'consorcios_id',
//        array(
//            'name'=>'consorcios_id',
//            'value'=>'$data->consorcios->registros->name',
//            'filter' => CHtml::listData(Consorcios::model()->findAll(), 'id', 'description'),
//        ),
//	    'class'=>'CButtonColumn',
//		),
      /*  array(
            'class'=>'CButtonColumn',
            'template'=>'{view}{update}',
            'viewButtonUrl'=>'Yii::app()->controller->createUrl("tiposproducto/view",array("id"=>$data->id) )',
            'updateButtonUrl'=>'Yii::app()->controller->createUrl("tiposproducto/update",array("id"=>$data->id) )',
            // 'deleteButtonUrl'=>'Yii::app()->controller->createUrl("tiposanuncio/delete",array("id"=>$data->id) )',
        ),*/
    ),
)); ?>


<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'dialogTiposproducto',
    'options'=>array(
        'title'=>'Nuevo Tipo de Producto',
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
    function addTiposproducto()
    {
        <?php echo CHtml::ajax(array(
                'url'=>array('tiposproducto/createdialog&id='.$id),
                'data'=> "js:$(this).serialize()",
                'type'=>'post',
                'dataType'=>'json',
                'success'=>"function(data)
                {
                    if (data.status == 'failure')
                    {
                        $('#dialogTiposproducto div.divForForm').html(data.div);
                              // Here is the trick: on submit-> once again this function!
                        $('#dialogTiposproducto div.divForForm form').submit(addTiposproducto);
                    }
                    else
                    {
                        $('#dialogTiposproducto div.divForForm').html(data.div);
                        setTimeout(\"$('#dialogTiposproducto').dialog('close') \",300);
                        $.fn.yiiGridView.update('tiposproducto-grid');
                    }

                } ",
                ))?>;
        return false;

    }

</script>
