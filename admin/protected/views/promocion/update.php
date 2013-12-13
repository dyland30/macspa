<?php
/* @var $this PromocionController */
/* @var $model Promocion */

$this->breadcrumbs=array(
	'Promocions'=>array('index'),
	$model->idpromocion=>array('view','id'=>$model->idpromocion),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Promociones', 'url'=>array('index')),
	array('label'=>'Crear Promoción', 'url'=>array('create')),
	array('label'=>'Ver Promoción', 'url'=>array('view', 'id'=>$model->idpromocion)),
	array('label'=>'Administrar Promoción', 'url'=>array('admin')),
);
?>

<h1>Update Promocion <?php echo $model->idpromocion; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>