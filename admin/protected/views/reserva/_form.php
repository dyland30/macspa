<?php
/* @var $this ReservaController */
/* @var $model Reserva */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reserva-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idreserva'); ?>
		<?php echo $form->textField($model,'idreserva'); ?>
		<?php echo $form->error($model,'idreserva'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idcliente'); ?>
		<?php echo $form->textField($model,'idcliente'); ?>
		<?php echo $form->error($model,'idcliente'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fch_programada'); ?>
		<?php echo $form->textField($model,'fch_programada'); ?>
		<?php echo $form->error($model,'fch_programada'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fch_alternativa'); ?>
		<?php echo $form->textField($model,'fch_alternativa'); ?>
		<?php echo $form->error($model,'fch_alternativa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fch_registro'); ?>
		<?php echo $form->textField($model,'fch_registro'); ?>
		<?php echo $form->error($model,'fch_registro'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'precio_total'); ?>
		<?php echo $form->textField($model,'precio_total',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'precio_total'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estado'); ?>
		<?php echo $form->textField($model,'estado',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'estado'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'idlocal'); ?>
		<?php echo $form->textField($model,'idlocal'); ?>
		<?php echo $form->error($model,'idlocal'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->