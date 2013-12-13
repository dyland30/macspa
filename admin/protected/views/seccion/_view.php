<?php
/* @var $this SeccionController */
/* @var $data Seccion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idseccion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idseccion), array('view', 'id'=>$data->idseccion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contenido')); ?>:</b>
	<?php echo CHtml::decode($data->contenido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('div_id')); ?>:</b>
	<?php echo CHtml::encode($data->div_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('flg_activo')); ?>:</b>
	<?php echo CHtml::encode($data->flg_activo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idusuario')); ?>:</b>
	<?php echo CHtml::encode($data->idusuario); ?>
	<br />


</div>