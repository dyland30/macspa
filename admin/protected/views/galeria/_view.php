<?php
/* @var $this GaleriaController */
/* @var $data Galeria */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idgaleria')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idgaleria), array('view', 'id'=>$data->idgaleria)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fch_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->fch_creacion); ?>
	<br />


</div>