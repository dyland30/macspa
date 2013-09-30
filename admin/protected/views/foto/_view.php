<?php
/* @var $this FotoController */
/* @var $data Foto */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idfoto')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idfoto), array('view', 'id'=>$data->idfoto)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('img_orig')); ?>:</b>
	<?php echo CHtml::encode($data->img_orig); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('img_small')); ?>:</b>
	<?php echo CHtml::encode($data->img_small); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fch_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->fch_creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idgaleria')); ?>:</b>
	<?php echo CHtml::encode($data->idgaleria); ?>
	<br />


</div>