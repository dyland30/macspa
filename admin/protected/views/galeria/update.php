<?php
/* @var $this GaleriaController */
/* @var $model Galeria */

$this->breadcrumbs=array(
	'Galerias'=>array('index'),
	$model->idgaleria=>array('view','id'=>$model->idgaleria),
	'Update',
);

$this->menu=array(
	array('label'=>'List Galeria', 'url'=>array('index')),
	array('label'=>'Create Galeria', 'url'=>array('create')),
	array('label'=>'View Galeria', 'url'=>array('view', 'id'=>$model->idgaleria)),
	array('label'=>'Manage Galeria', 'url'=>array('admin')),
);
?>

<h1>Update Galeria <?php echo $model->idgaleria; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>