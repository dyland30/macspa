<?php
/* @var $this ReservaController */
/* @var $model Reserva */

$this->breadcrumbs=array(
	'Reservas'=>array('index'),
	$model->idreserva,
);

$this->menu=array(
	array('label'=>'List Reserva', 'url'=>array('index')),
	array('label'=>'Create Reserva', 'url'=>array('create')),
	array('label'=>'Update Reserva', 'url'=>array('update', 'id'=>$model->idreserva)),
	array('label'=>'Delete Reserva', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idreserva),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Reserva', 'url'=>array('admin')),
);
?>

<h1>Número de Reserva: <?php echo $model->idreserva; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idreserva',
		'idcliente',
		'fch_programada',
		'fch_alternativa',
		'fch_registro',
		'precio_total',
		'estado',
		'idlocal',
	),
)); ?>
