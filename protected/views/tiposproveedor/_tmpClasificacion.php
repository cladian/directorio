<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Crear Clasificación',
    'type'=>'primary',
    'htmlOptions'=>array(
        'onclick'=>"{addClasificaciontiposproveedor(); $('#dialogclasificaciontiposproveedor').dialog('open');}",
    ),
));
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'clasificaciontiposproveedor-grid',
    'dataProvider'=>$modelClasificaciontiposproveedor->searchClasificacion($id),
    'filter'=>$modelClasificaciontiposproveedor,
    'columns'=>array(
//        'id',
        array(
            'name'=>'id',
            'htmlOptions' => array('width' => '5%'),
        ),
        'name',
        //'rdate',
        //'udate',
        //'status',
        array( 'name'=>'status',
            'value'=>'$data["status"]==1?"Activo":"Inactivo"',
            'filter' => array('1' => 'Activo', '0' => 'Inactivo')
        ),
        array(
            'name'=>'tiposproveedor_id',
            'value'=>'$data->tiposproveedor->name',
            'filter'=>CHtml::listData(Tiposproveedor::model()->findAll(),'id','name'),
        ),

        //'tiposproveedor_id',
        //		array(
//			'class'=>'CButtonColumn',
//		),
        array(
            'class'=>'CButtonColumn',
            'template'=>'{view}{update}',
            'viewButtonUrl'=>'Yii::app()->controller->createUrl("clasificaciontiposproveedor/view",array("id"=>$data->id) )',
            'updateButtonUrl'=>'Yii::app()->controller->createUrl("clasificaciontiposproveedor/update",array("id"=>$data->id) )',
            // 'deleteButtonUrl'=>'Yii::app()->controller->createUrl("tiposanuncio/delete",array("id"=>$data->id) )',
        ),
    ),
)); ?>
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'dialogclasificaciontiposproveedor',
    'options'=>array(
        'title'=>'Nueva Clasificación  ',
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
    function addClasificaciontiposproveedor()
    {   //alert('funcion');
        <?php echo CHtml::ajax(array(
                'url'=>array('clasificaciontiposproveedor/createdialog&id='.$id),
                'data'=> "js:$(this).serialize()",
                'type'=>'post',
                'dataType'=>'json',
                'success'=>"function(data)
                {
                    if (data.status == 'failure')
                    {
                        $('#dialogclasificaciontiposproveedor div.divForForm').html(data.div);
                              // Here is the trick: on submit-> once again this function!
                        $('#dialogclasificaciontiposproveedor div.divForForm form').submit(addClasificaciontiposproveedor);
                    }
                    else
                    {
                        $('#dialogclasificaciontiposproveedor div.divForForm').html(data.div);
                        setTimeout(\"$('#dialogclasificaciontiposproveedor').dialog('close') \",300);
                        $.fn.yiiGridView.update('clasificaciontiposproveedor-grid');
                    }

                } ",
                ))?>;
        return false;

    }

</script>