<?php
/* @var $this LocalController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Locals',
);

$this->menu=array(
	array('label'=>'Create Local', 'url'=>array('create')),
	array('label'=>'Manage Local', 'url'=>array('admin')),
);
?>

<h1>Locals</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
