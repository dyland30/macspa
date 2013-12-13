<?php
/* @var $this SeccionController */
/* @var $model Seccion */

$this->breadcrumbs=array(
	'Seccions'=>array('index'),
	$model->idseccion,
);

$this->menu=array(
	array('label'=>'Listar Páginas', 'url'=>array('index')),
	array('label'=>'Crear Página', 'url'=>array('create')),
	array('label'=>'Editar Página', 'url'=>array('update', 'id'=>$model->idseccion)),
	array('label'=>'Eliminar Página', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idseccion),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Páginas', 'url'=>array('admin')),
);
?>

<h1>Código de Página: <?php echo $model->idseccion; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idseccion',
		'titulo',
		array(               // related city displayed as a link
                'label'=>'Contenido',
                'type'=>'raw',
                'value'=>CHtml::decode($model->contenido)
                ),
		'div_id',
		'flg_activo',
		'idusuario',
	),
)); ?>
