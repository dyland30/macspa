<?php
/* @var $this SeccionController */
/* @var $model Seccion */

$this->breadcrumbs=array(
	'Seccions'=>array('index'),
	$model->idseccion,
);

$this->menu=array(
	array('label'=>'List Seccion', 'url'=>array('index')),
	array('label'=>'Create Seccion', 'url'=>array('create')),
	array('label'=>'Update Seccion', 'url'=>array('update', 'id'=>$model->idseccion)),
	array('label'=>'Delete Seccion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idseccion),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Seccion', 'url'=>array('admin')),
);
?>

<h1>Código de Página: <?php echo $model->idseccion; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idseccion',
		'titulo',
		'contenido',
		'div_id',
		'flg_activo',
		'idusuario',
	),
)); ?>
