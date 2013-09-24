<?php
/* @var $this SeccionController */
/* @var $model Seccion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'seccion-form',
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
		<?php echo $form->textField($model,'titulo',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'titulo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contenido'); ?>
		<?php echo $form->textArea($model,'contenido',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'contenido'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'div_id'); ?>
		<?php echo $form->textField($model,'div_id',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'div_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'flg_activo'); ?>
		<?php echo $form->textField($model,'flg_activo'); ?>
		<?php echo $form->error($model,'flg_activo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idusuario'); ?>
		<?php echo $form->textField($model,'idusuario'); ?>
		<?php echo $form->error($model,'idusuario'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->