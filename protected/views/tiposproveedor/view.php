<?php
/* @var $this TiposproveedorController */
/* @var $model Tiposproveedor */

/*$this->breadcrumbs=array(
	'Tiposproveedors'=>array('index'),
	$model->name,
);*/


?>

<h3>Ver Tipo Proveedor: <?php echo $model->name; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'id',
//		'name',
		'description',
		'rdate',
		'udate',
		//'status',
        array( 'name'=>'status',
            'value'=>$model["status"]==1?"Activo":"Inactivo",
            'filter' => array('1' => 'Activo', '0' => 'Inactivo')
        ),
	),
)); ?>
<?php
$this->widget('bootstrap.widgets.TbTabs', array(
        'tabs'=>array(
            array(
                'id'=>'tab1',
                'active'=>true,
                'label'=>'Clasificación',
               'content'=>$this->renderPartial("_tmpClasificacion", array('modelClasificaciontiposproveedor'=> $modelClasificaciontiposproveedor, 'id' => $model->id),true),

            ),
        ))
);

?>
