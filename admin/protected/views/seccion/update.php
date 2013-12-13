<?php
/* @var $this SeccionController */
/* @var $model Seccion */

$this->breadcrumbs=array(
	'Seccions'=>array('index'),
	$model->idseccion=>array('view','id'=>$model->idseccion),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Páginas', 'url'=>array('index')),
	array('label'=>'Crear Página', 'url'=>array('create')),
	array('label'=>'Ver Página', 'url'=>array('view', 'id'=>$model->idseccion)),
	array('label'=>'Administrar Páginas', 'url'=>array('admin')),
);
?>

<h1>Update Seccion <?php echo $model->idseccion; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>