<?php
/* @var $this FotoController */
/* @var $model Foto */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'foto-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
    'htmlOptions' => array('enctype' => 'multipart/form-data', 'class' => 'well'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'titulo',array('size'=>45,'maxlength'=>45,'class'=>'span3')); ?>
	<?php echo $form->textFieldRow($model,'img_orig',array('size'=>60,'maxlength'=>100,'class'=>'span3')); ?>
	<?php echo $form->textFieldRow($model,'img_small',array('size'=>60,'maxlength'=>100,'class'=>'span3')); ?>
	<?php echo $form->textFieldRow($model,'fch_creacion',array('class'=>'span3')); ?>
	<?php echo $form->textFieldRow($model,'idgaleria',array('class'=>'span3')); ?>
	
<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>

        
	

<?php $this->endWidget(); ?>

</div><!-- form -->