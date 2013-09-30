<?php
/* @var $this ReservaController */
/* @var $data Reserva */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idreserva')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idreserva), array('view', 'id'=>$data->idreserva)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idcliente')); ?>:</b>
	<?php echo CHtml::encode($data->idcliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fch_programada')); ?>:</b>
	<?php echo CHtml::encode($data->fch_programada); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fch_alternativa')); ?>:</b>
	<?php echo CHtml::encode($data->fch_alternativa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fch_registro')); ?>:</b>
	<?php echo CHtml::encode($data->fch_registro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precio_total')); ?>:</b>
	<?php echo CHtml::encode($data->precio_total); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('idlocal')); ?>:</b>
	<?php echo CHtml::encode($data->idlocal); ?>
	<br />

	*/ ?>

</div>