<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'pymes-grid',
    'dataProvider'=>$modelPymes->searchByIdConsorcio($id),
    'filter'=>$modelPymes,
    'columns'=>array(
       // 'id',
//        'rdate',
//        'udate',
        //'status',
        array( 'name'=>'status',
            'value'=>'$data["status"]==1?"Activo":"Inactivo"',
            'filter' => array('1' => 'Activo', '0' => 'Inactivo')
        ),
        array( 'name'=>'registros_id',
            'value'=>'$data->registros->name',
        ),

        array( 'name'=>'consorcios_id',
            'value'=>'$data->consorcios->description',

        ),

//        'registros_id',
//        'consorcios_id',
//        array(
//            'class'=>'CButtonColumn',
//        ),
        array(
            'class'=>'CButtonColumn',
            'template'=>'{view}',
            'viewButtonUrl'=>'Yii::app()->controller->createUrl("pymes/view",array("id"=>$data->id))',
//            'updateButtonUrl'=>'Yii::app()->controller->createUrl("scale/update",array("id"=>$data->id) )',
//            'deleteButtonUrl'=>'Yii::app()->controller->createUrl("scale/delete",array("id"=>$data->id) )',
        ),),
)); ?>