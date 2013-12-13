<?php
/* @var $this SeccionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Lista de Páginas',
);

$this->menu=array(
	array('label'=>'Crear Páginas', 'url'=>array('create')),
	array('label'=>'Administrar Páginas', 'url'=>array('admin')),
);
?>

<h1>Lista de Páginas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
