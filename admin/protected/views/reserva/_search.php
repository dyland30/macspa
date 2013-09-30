<?php
/* @var $this ReservaController */
/* @var $model Reserva */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idreserva'); ?>
		<?php echo $form->textField($model,'idreserva'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idcliente'); ?>
		<?php echo $form->textField($model,'idcliente'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fch_programada'); ?>
		<?php echo $form->textField($model,'fch_programada'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fch_alternativa'); ?>
		<?php echo $form->textField($model,'fch_alternativa'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fch_registro'); ?>
		<?php echo $form->textField($model,'fch_registro'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'precio_total'); ?>
		<?php echo $form->textField($model,'precio_total',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estado'); ?>
		<?php echo $form->textField($model,'estado',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idlocal'); ?>
		<?php echo $form->textField($model,'idlocal'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->