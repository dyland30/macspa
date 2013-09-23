<?php
/* @var $this PromocionController */
/* @var $model Promocion */

$this->breadcrumbs=array(
	'Promocions'=>array('index'),
	$model->idpromocion,
);

$this->menu=array(
	array('label'=>'List Promocion', 'url'=>array('index')),
	array('label'=>'Create Promocion', 'url'=>array('create')),
	array('label'=>'Update Promocion', 'url'=>array('update', 'id'=>$model->idpromocion)),
	array('label'=>'Delete Promocion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idpromocion),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Promocion', 'url'=>array('admin')),
);
?>

<h1>View Promocion #<?php echo $model->idpromocion; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idpromocion',
		'titulo',
		'contenido',
		'imagen',
		'fch_inicio',
		'fch_fin',
		'orden',
		'flg_activo',
	),
)); ?>
