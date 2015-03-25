
<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Nuevo Dia de Entrega',
    'type'=>'primary',
    'htmlOptions'=>array(
        'onclick'=>"{addDiasentrega(); $('#dialogDiasentrega').dialog('open');}",
    ),
));
?>
<br>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'diasentrega-grid',
    'dataProvider'=>$modelDiasentrega->searchByDiasentrega($id),
    'filter'=>$modelDiasentrega,
    'columns'=>array(
      //  'id',
       // 'name',
       // 'frecuency',
        array( 'name'=>'frecuency',
            'value'=>'$data["frecuency"]=="O"?"Ocacional":"PorPedido"',
            'filter' => array('O' => 'Ocacional', 'PP' => 'PorPedido')
        ),

     // 'status',
        array( 'name'=>'status',
            'value'=>'$data["status"]==1?"Activo":"Inactivo"',
            'filter' => array('1' => 'Activo', '0' => 'Inactivo')
        ),
        //'rdate',
        //'udate',

        //'dias_id',
        array( 'name'=>'dias_id',
            'value'=>'$data->dias->name',
        ),
        /*'registros_id',
        */
       /* array(
            'class'=>'CButtonColumn',
            'template'=>'{view}{update}{delete}',
            'viewButtonUrl'=>'Yii::app()->controller->createUrl("diasentrega/view",array("id"=>$data->id) )',
            'updateButtonUrl'=>'Yii::app()->controller->createUrl("diasentrega/update",array("id"=>$data->id) )',
            'deleteButtonUrl'=>'Yii::app()->controller->createUrl("diasentrega/delete",array("id"=>$data->id) )',
        ),*/
    ),
)); ?>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'dialogDiasentrega',
    'options'=>array(
        'title'=>'Nuevo Dia de Entrega',
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
    function addDiasentrega()
    {
        <?php echo CHtml::ajax(array(
                'url'=>array('diasentrega/createdialog&id='.$id),
                'data'=> "js:$(this).serialize()",
                'type'=>'post',
                'dataType'=>'json',
                'success'=>"function(data)
                {
                    if (data.status == 'failure')
                    {
                        $('#dialogDiasentrega div.divForForm').html(data.div);
                              // Here is the trick: on submit-> once again this function!
                        $('#dialogDiasentrega div.divForForm form').submit(addDiasentrega);
                    }
                    else
                    {
                        $('#dialogDiasentrega div.divForForm').html(data.div);
                        setTimeout(\"$('#dialogDiasentrega').dialog('close') \",300);
                        $.fn.yiiGridView.update('diasentrega-grid');
                    }

                } ",
                ))?>;
        return false;

    }

</script>