<?php
/* @var $this AnunciosController */
/* @var $model Anuncios */

$this->breadcrumbs=array(
	'Anuncios'=>array('site/adm'),
//	$model->title,
);

$this->menu=array(
	array('label'=>'List Anuncios', 'url'=>array('index')),
	array('label'=>'Create Anuncios', 'url'=>array('create')),
	array('label'=>'Update Anuncios', 'url'=>array('update', 'id'=>$model->id)),
        array('label'=>'Delete Anuncios', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
        array('label'=>'Manage Anuncios', 'url'=>array('admin')),
);
?>

<h3>Anuncios:  <?php echo $model->title; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'id',
//		'title',
        array( 'name'=>'status',
            'value'=>$model["status"]==1?"Activo":"Inactivo",
            'filter' => array('1' => 'Activo', '0' => 'Inactivo')
        ),
		'description',
		'file',
		'startdate',
		'enddate',
//		'rdate',
//        'udate',

//		'tiposanuncio_id',
        array(
            'name'=>'tiposanuncio_id',
            'value'=>$model->tiposanuncio->name,
        ),

        //'registros_id',
        array(
            'name'=>'registros_id',
            'value'=>$model->registros->name,
        ),
	),
)); ?>
