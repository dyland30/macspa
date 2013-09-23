<?php
/* @var $this LocalController */
/* @var $data Local */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idlocal')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idlocal), array('view', 'id'=>$data->idlocal)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('direccion')); ?>:</b>
	<?php echo CHtml::encode($data->direccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono')); ?>:</b>
	<?php echo CHtml::encode($data->telefono); ?>
	<br />


</div>