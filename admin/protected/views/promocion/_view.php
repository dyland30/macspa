<?php
/* @var $this PromocionController */
/* @var $data Promocion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idpromocion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idpromocion), array('view', 'id'=>$data->idpromocion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contenido')); ?>:</b>
	<?php echo CHtml::encode($data->contenido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('imagen')); ?>:</b>
	<?php echo CHtml::encode($data->imagen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fch_inicio')); ?>:</b>
	<?php echo CHtml::encode($data->fch_inicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fch_fin')); ?>:</b>
	<?php echo CHtml::encode($data->fch_fin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('orden')); ?>:</b>
	<?php echo CHtml::encode($data->orden); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('flg_activo')); ?>:</b>
	<?php echo CHtml::encode($data->flg_activo); ?>
	<br />

	*/ ?>

</div>