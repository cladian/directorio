<?php
/* @var $this ProveedoresController */
/* @var $model Proveedores */

/*$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	$model->id,
);*/


?>

<h3>Ver Proveedor: <?php echo $model->registros->name; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'id',
		'rdate',
		'udate',
		//'status',
        array( 'name'=>'status',
            'value'=>$model["status"]==1?"Activo":"Inactivo",
            'filter' => array('1' => 'Activo', '0' => 'Inactivo')
        ),
		//'registros_id',
        array(
            'name'=>'registros_id',
            'value'=>$model->registros->name,
        ),
		//'registros_idp',
        array(
            'name'=>'registros_idp',
            'value'=>$model->registrosIdp->name,
        ),
		//'tiposproveedor_id',
        array(
            'name'=>'tiposproveedor_id',
            'value'=>$model->tiposproveedor->name,
        ),
		//'clasificaciontiposproveedor_id',
        array(
            'name'=>'clasificaciontiposproveedor_id',
            'value'=>$model->clasificaciontiposproveedor->name,
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
                'content'=>$this->renderPartial("_tmpProveedorContactos", array('modelContacto' => $modelContacto,'id'=>$model->registros_id),true),
            ),
            array(
                'id'=>'tab3',
                'active'=>false,
                'label'=>'Productos',
                'content'=>$this->renderPartial("_tmpProveedorProductos", array('modelProductos' => $modelProductos, 'id' =>$model->registros_id , 'consorcio_id' =>$consorcios_id),true),
            ),
            array(
                'id'=>'tab4',
                'active'=>false,
                'label'=>'Días de Entrega',
                'content'=>$this->renderPartial("_tmpProveedorDiasentrega", array('modelDiasentrega' => $modelDiasentrega, 'id' =>$model->registros_id ),true),
            ),
        ))
);
?>