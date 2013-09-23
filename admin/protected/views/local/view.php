<?php
/* @var $this LocalController */
/* @var $model Local */

$this->breadcrumbs=array(
	'Locals'=>array('index'),
	$model->idlocal,
);

$this->menu=array(
	array('label'=>'List Local', 'url'=>array('index')),
	array('label'=>'Create Local', 'url'=>array('create')),
	array('label'=>'Update Local', 'url'=>array('update', 'id'=>$model->idlocal)),
	array('label'=>'Delete Local', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idlocal),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Local', 'url'=>array('admin')),
);
?>

<h1>View Local #<?php echo $model->idlocal; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idlocal',
		'nombre',
		'direccion',
		'telefono',
	),
)); ?>
