<?php
/* @var $this GaleriaController */
/* @var $model Galeria */

$this->breadcrumbs=array(
	'Galerias'=>array('index'),
	$model->idgaleria,
);

$this->menu=array(
	array('label'=>'List Galeria', 'url'=>array('index')),
	array('label'=>'Create Galeria', 'url'=>array('create')),
	array('label'=>'Update Galeria', 'url'=>array('update', 'id'=>$model->idgaleria)),
	array('label'=>'Delete Galeria', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idgaleria),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Galeria', 'url'=>array('admin')),
);
?>

<h1>Galería Nro: <?php echo $model->idgaleria; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idgaleria',
		'descripcion',
		'fch_creacion',
	),
)); ?>

<h2>Fotos</h2>
<h4><?php echo CHtml::link("Nueva Foto",array("Foto/create")) ?></h4>
<br/>
<div class="row-fluid">
    <?php 
        foreach($model->fotos as $foto){
    ?>
    <div class="span2">
        <p><?php echo  CHtml::link(CHtml::image(Yii::app()->request->baseUrl."/images/fotos/".$foto->img_small,"Foto"),array("Foto/update/$foto->idfoto")); ?></p>
        <p><?php echo $foto->titulo ?></p>
    </div> 
    <?php  
        }
    ?>
    
</div>