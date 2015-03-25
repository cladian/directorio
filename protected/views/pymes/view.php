<?php
/* @var $this PymesController */
/* @var $model Pymes */

/*$this->breadcrumbs=array(
	'Pymes'=>array('index'),
	$model->id,
);*/


?>

    <h3>Pyme: <?php echo $model->registros->name; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$model,
    'attributes'=>array(
/*        'id',
        'registros_id',*/
//		'rdate',
//		'udate',
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
        //'consorcios_id',
        array(
            'name'=>'consorcios_id',
            'value'=>$model->consorcios->description,
        ),
    ),
)); ?>
    <br/>
    <br>
<?php
$this->widget('bootstrap.widgets.TbTabs', array(
        'tabs'=>array(
            array(
                'id'=>'tab1',
                'active'=>true,
                'label'=>'Coberturas',
                'content'=>$this->renderPartial("_tmpPymeCoberturas", array('modelCoberturas' => $modelCoberturas,'id'=>$model->registros_id),true),
            ),
            array(
                'id'=>'tab2',
                'active'=>false,
                'label'=>'Contacto',
                'content'=>$this->renderPartial("_tmpPymeContactos", array('modelContacto' => $modelContacto,'id'=>$model->registros_id),true),
            ),
            array(
                'id'=>'tab3',
                'active'=>false,
                'label'=>'Productos',
                'content'=>$this->renderPartial("_tmpPymeProductos", array('modelProductos' => $modelProductos, 'id' =>$model->registros_id , 'consorcio_id' =>$model->consorcios_id),true),
            ),
            array(
                'id'=>'tab4',
                'active'=>false,
                'label'=>'Días de Entrega',
                'content'=>$this->renderPartial("_tmpPymeDiasentrega", array('modelDiasentrega' => $modelDiasentrega, 'id' =>$model->registros_id ),true),
            ),
            array(
                'id'=>'tab5',
                'active'=>false,
                'label'=>'Proveedores',  // Enviamos el ID de la Pyme
                'content'=>$this->renderPartial("_tmpPymeProveedores", array('modelProveedores' => $modelProveedores, 'id' =>$model->registros_id ), true),
            ),
            array(
                'id'=>'tab6',
                'active'=>false,
                'label'=>'Clientes',
                'content'=>$this->renderPartial("_tmpPymeClientes", array('modelClientes' => $modelClientes, 'id' =>$model->registros_id ),true),
            ),
        ))
);
?>