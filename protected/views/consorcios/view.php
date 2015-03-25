<?php
/* @var $this ConsorciosController */
/* @var $model Consorcios */

/*$this->breadcrumbs=array(
	'Consorcioses'=>array('index'),
	$model->id,
);*/

?>

<h3>Consorcio: <?php echo $model->description; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
	/*	'id',
        'registros_id',*/
		'description',
//		'rdate',
//		'udate',
		//'status',
        array( 'name'=>'status',
            'value'=>$model["status"]==1?"Activo":"Inactivo",
            'filter' => array('1' => 'Activo', '0' => 'Inactivo')
        ),
		//'provincias_id',
        array(
            'name'=>'provincias_id',
            'value'=>$model->provincias->name,
        ),
		//'tiposoperacion_id',
        array(
            'name'=>'tiposoperacion_id',
            'value'=>$model->tiposoperacion->name,
        ),

        array(
            'name'=>'registros_id',
            'value'=>$model->registros->name,
        ),
	),
)); ?>
<br/>
<?php
$this->widget('bootstrap.widgets.TbTabs', array(
        'tabs'=>array(
            array(
                'id'=>'tab1',
                'active'=>true,
                'label'=>'Contactos',
                'content'=>$this->renderPartial("_tmpConsorcioContacto", array('modelContacto' => $modelContacto,'id'=>$model->registros_id),true),

            ),
            array(
                'id'=>'tab2',
                'active'=>false,
                'label'=>'Tipos de Producto',
               'content'=>$this->renderPartial("_tmpConsorcioTiposProducto", array('modelTiposProducto' => $modelTiposProducto, 'id' =>$model->id ),true),
            ),
            array(
                'id'=>'tab3',
                'active'=>false,
                'label'=>'Pymes',
                'content'=>$this->renderPartial("_tmpConsorcioPymes", array('modelPymes' => $modelPymes, 'id' =>$model->id ),true),
            ),

        ))
);

?>


