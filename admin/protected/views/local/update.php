<?php
/* @var $this LocalController */
/* @var $model Local */

$this->breadcrumbs=array(
	'Locals'=>array('index'),
	$model->idlocal=>array('view','id'=>$model->idlocal),
	'Update',
);

$this->menu=array(
	array('label'=>'List Local', 'url'=>array('index')),
	array('label'=>'Create Local', 'url'=>array('create')),
	array('label'=>'View Local', 'url'=>array('view', 'id'=>$model->idlocal)),
	array('label'=>'Manage Local', 'url'=>array('admin')),
);
?>

<h1>Update Local <?php echo $model->idlocal; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>