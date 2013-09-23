<?php
/* @var $this ServicioController */
/* @var $model Servicio */

$this->breadcrumbs=array(
	'Servicios'=>array('index'),
	$model->idservicio=>array('view','id'=>$model->idservicio),
	'Update',
);

$this->menu=array(
	array('label'=>'List Servicio', 'url'=>array('index')),
	array('label'=>'Create Servicio', 'url'=>array('create')),
	array('label'=>'View Servicio', 'url'=>array('view', 'id'=>$model->idservicio)),
	array('label'=>'Manage Servicio', 'url'=>array('admin')),
);
?>

<h1>Update Servicio <?php echo $model->idservicio; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>