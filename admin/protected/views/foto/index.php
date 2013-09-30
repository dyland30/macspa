<?php
/* @var $this FotoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Fotos',
);

$this->menu=array(
	array('label'=>'Create Foto', 'url'=>array('create')),
	array('label'=>'Manage Foto', 'url'=>array('admin')),
);
?>

<h1>Fotos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
