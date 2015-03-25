<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'label' => 'Nuevo Proveedor',
    'type' => 'primary',
    //'url'=>Yii::app()->controller->createUrl("registros/createpro"),
    'htmlOptions'=>array(
        'onclick'=>"{addProveedores(); $('#dialogProveedores').dialog('open');}",
    ),

));
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'proveedores-grid',
    'dataProvider'=>$modelProveedores->searchByIdPyme($id),
    //'dataProvider'=>$modelProveedores->search(),
    'filter'=>$modelProveedores,
    'columns'=>array(
        //'id',
        //'registros_id',
        array(
            'header'=>'Proveedor',
            'name'=>'registros_id',
            'value'=>'$data->registros->name',
        ),
/*        array(
            'header'=>'Pyme',
            'name'=>'registros_idp',
            'value'=>'$data->registrosIdp->name',
        ),*/
        // 'tiposproveedor_id',
        array(
            'header'=>'Tipo',
            'name'=>'tiposproveedor_id',
            'value'=>'$data->tiposproveedor->name',
            'filter'=>CHtml::listData(Tiposproveedor::model()->findAll(),'id','name')
        ),
        array(
            'header'=>'Clasificación',
            'name'=>'clasificaciontiposproveedor_id',
            'value'=>'$data->clasificaciontiposproveedor->name',
            'filter'=>CHtml::listData(Clasificaciontiposproveedor::model()->findAll(),'id','name')
        ),
        //'clasificaciontiposproveedor_id',
        //'status',
        array( 'name'=>'status',
            'value'=>'$data["status"]==1?"Activo":"Inactivo"',
            'filter' => array('1' => 'Activo', '0' => 'Inactivo')
        ),
        'rdate',
        //'udate',
        //'registros_idp',
        /*
        'tiposproveedor_id',
        'clasificaciontiposproveedor_id',
        */
        array(
            'class'=>'CButtonColumn',
            'template'=>'{view}',
            'viewButtonUrl'=>'Yii::app()->controller->createUrl("proveedores/view",array("id"=>$data->id) )',
            'updateButtonUrl'=>'Yii::app()->controller->createUrl("proveedores/update",array("id"=>$data->id) )',
            'deleteButtonUrl'=>'Yii::app()->controller->createUrl("proveedores/delete",array("id"=>$data->id) )',
        ),
    ),
)); ?>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'dialogProveedores',
    'options'=>array(
        'title'=>'Nuevo Registro de Proveedor',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>800,
        'height'=>800,
    ),
));?>

<div class="divForForm"></div>

<?php $this->endWidget();?>

<script type="text/javascript">
    // here is the magic
    function addProveedores()
    {
        <?php echo CHtml::ajax(array(
               // 'url'=>array('registros/createdialogproveedor'),
                'url'=>array('registros/createdialogproveedor&id='.$id),
                'data'=> "js:$(this).serialize()",
                'type'=>'post',
                'dataType'=>'json',
                'success'=>"function(data)
                {
                    if (data.status == 'failure')
                    {
                        $('#dialogProveedores div.divForForm').html(data.div);
                              // Here is the trick: on submit-> once again this function!
                        $('#dialogProveedores div.divForForm form').submit(addProveedores);
                    }
                    else
                    {
                        $('#dialogProveedores div.divForForm').html(data.div);

                        setTimeout(\"$('#dialogProveedores').dialog('close')\",300);
                         $.fn.yiiGridView.update('proveedores-grid');


                    }

                } ",
                ))?>;
        return false;

    }

</script>






