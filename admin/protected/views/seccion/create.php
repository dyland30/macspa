<?php
/* @var $this SeccionController */
/* @var $model Seccion */

$this->breadcrumbs=array(
	'Seccions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Páginas', 'url'=>array('index')),
	array('label'=>'Administrar Páginas', 'url'=>array('admin')),
);
?>

<h1>Create Seccion</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>