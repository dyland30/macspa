<?php
/* @var $this FotoController */
/* @var $model Foto */

$this->breadcrumbs=array(
	'Fotos'=>array('index'),
	$model->idfoto,
);

$this->menu=array(
	array('label'=>'List Foto', 'url'=>array('index')),
	array('label'=>'Create Foto', 'url'=>array('create')),
	array('label'=>'Update Foto', 'url'=>array('update', 'id'=>$model->idfoto)),
	array('label'=>'Delete Foto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idfoto),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Foto', 'url'=>array('admin')),
);
?>

<h1>Foto Nro: <?php echo $model->idfoto; ?></h1>
<h3></h3>
<?php echo CHtml::image(Yii::app()->request->baseUrl."/images/fotos/".$model->img_orig,"Foto"); ?>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idfoto',
		'titulo',
		'img_orig',
		'img_small',
		'fch_creacion',
		'idgaleria',
	),
)); ?>
