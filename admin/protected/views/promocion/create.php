<?php
/* @var $this PromocionController */
/* @var $model Promocion */

$this->breadcrumbs=array(
	'Promocions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Promociones', 'url'=>array('index')),
	array('label'=>'Administrar Promoción', 'url'=>array('admin')),
);
?>

<h1>Crear Promoción</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>