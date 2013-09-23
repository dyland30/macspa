<?php
/* @var $this PersonalController */
/* @var $model Personal */

$this->breadcrumbs=array(
	'Personals'=>array('index'),
	$model->idPersonal=>array('view','id'=>$model->idPersonal),
	'Update',
);

$this->menu=array(
	array('label'=>'List Personal', 'url'=>array('index')),
	array('label'=>'Create Personal', 'url'=>array('create')),
	array('label'=>'View Personal', 'url'=>array('view', 'id'=>$model->idPersonal)),
	array('label'=>'Manage Personal', 'url'=>array('admin')),
);
?>

<h1>Update Personal <?php echo $model->idPersonal; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>