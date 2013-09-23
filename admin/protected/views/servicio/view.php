<?php
/* @var $this ServicioController */
/* @var $model Servicio */

$this->breadcrumbs=array(
	'Servicios'=>array('index'),
	$model->idservicio,
);

$this->menu=array(
	array('label'=>'List Servicio', 'url'=>array('index')),
	array('label'=>'Create Servicio', 'url'=>array('create')),
	array('label'=>'Update Servicio', 'url'=>array('update', 'id'=>$model->idservicio)),
	array('label'=>'Delete Servicio', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idservicio),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Servicio', 'url'=>array('admin')),
);
?>

<h1>View Servicio #<?php echo $model->idservicio; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idservicio',
		'nombre',
		'descripcion',
		'idcategoria',
		'precio',
	),
)); ?>
