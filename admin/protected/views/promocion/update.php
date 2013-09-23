<?php
/* @var $this PromocionController */
/* @var $model Promocion */

$this->breadcrumbs=array(
	'Promocions'=>array('index'),
	$model->idpromocion=>array('view','id'=>$model->idpromocion),
	'Update',
);

$this->menu=array(
	array('label'=>'List Promocion', 'url'=>array('index')),
	array('label'=>'Create Promocion', 'url'=>array('create')),
	array('label'=>'View Promocion', 'url'=>array('view', 'id'=>$model->idpromocion)),
	array('label'=>'Manage Promocion', 'url'=>array('admin')),
);
?>

<h1>Update Promocion <?php echo $model->idpromocion; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>