<?php
/* @var $this FotoController */
/* @var $model Foto */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'foto-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'titulo'); ?>
		<?php echo $form->textField($model,'titulo',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'titulo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'img_orig'); ?>
		<?php echo $form->textField($model,'img_orig',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'img_orig'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'img_small'); ?>
		<?php echo $form->textField($model,'img_small',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'img_small'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fch_creacion'); ?>
		<?php echo $form->textField($model,'fch_creacion'); ?>
		<?php echo $form->error($model,'fch_creacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idgaleria'); ?>
		<?php echo $form->textField($model,'idgaleria'); ?>
		<?php echo $form->error($model,'idgaleria'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->