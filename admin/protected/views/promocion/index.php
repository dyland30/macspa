<?php
/* @var $this PromocionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Lista de Promociones',
);

$this->menu=array(
	array('label'=>'Crear Promoción', 'url'=>array('create')),
	array('label'=>'Administrar Promoción', 'url'=>array('admin')),
);
?>

<h1>Lista de Promociones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
