<?php
/* @var $this PromocionController */
/* @var $model Promocion */

$this->breadcrumbs=array(
	'Promocions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Promocion', 'url'=>array('index')),
	array('label'=>'Manage Promocion', 'url'=>array('admin')),
);
?>

<h1>Create Promocion</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>