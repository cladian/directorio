<?php
/* @var $this ClientesController */
/* @var $model Clientes */

/*$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	$model->id,
);*/


?>

<h3>Ver Cliente: <?php echo $model->registros->name; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'id',
		'rdate',
		'udate',
//		'status',
        array( 'name'=>'status',
            'value'=>$model["status"]==1?"Activo":"Inactivo",
            'filter' => array('1' => 'Activo', '0' => 'Inactivo')
        ),
//		'registros_id',
        array(
            'name'=>'registros_id',
            'value'=>$model->registros->name,
        ),
		//'registros_idc',
        array(
            'name'=>'registros_idc',
            'value'=>$model->registrosIdc->name,
        ),
	),
)); ?>
    <br/>
    <br>
<?php
$this->widget('bootstrap.widgets.TbTabs', array(
        'tabs'=>array(
            array(
                'id'=>'tab2',
                'active'=>true,
                'label'=>'Contacto',
                'content'=>$this->renderPartial("_tmpClienteContactos", array('modelContacto' => $modelContacto,'id'=>$model->registros_id),true),
            ),
            array(
                'id'=>'tab3',
                'active'=>false,
                'label'=>'Productos',
                'content'=>$this->renderPartial("_tmpClienteProductos", array('modelProductos' => $modelProductos, 'id' =>$model->registros_id , 'consorcio_id' =>$consorcios_id),true),
            ),
            array(
                'id'=>'tab4',
                'active'=>false,
                'label'=>'Días de Entrega',
                'content'=>$this->renderPartial("_tmpClienteDiasentrega", array('modelDiasentrega' => $modelDiasentrega, 'id' =>$model->registros_id ),true),
            ),
        ))
);
?>