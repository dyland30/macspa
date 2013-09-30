<?php
/* @var $this FotoController */
/* @var $model Foto */

$this->breadcrumbs=array(
	'Fotos'=>array('index'),
	$model->idfoto,
);

$this->menu=array(
	array('label'=>'List Foto', 'url'=>array('index')),
	array('label'=>'Create Foto', 'url'=>array('create')),
	array('label'=>'Update Foto', 'url'=>array('update', 'id'=>$model->idfoto)),
	array('label'=>'Delete Foto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idfoto),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Foto', 'url'=>array('admin')),
);
?>

<h1>View Foto #<?php echo $model->idfoto; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idfoto',
		'titulo',
		'img_orig',
		'img_small',
		'fch_creacion',
		'idgaleria',
	),
)); ?>
