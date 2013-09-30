<?php
/* @var $this ReservaController */
/* @var $model Reserva */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'reserva-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
        'htmlOptions' => array('class' => 'well'),
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldRow($model, 'idcliente', array('class' => 'span3')); ?>
    <?php echo $form->textFieldRow($model, 'fch_programada', array('class' => 'span3')); ?>
    <?php echo $form->textFieldRow($model, 'fch_alternativa', array('class' => 'span3')); ?>
    <?php echo $form->textFieldRow($model, 'fch_registro', array('class' => 'span3')); ?>
    <?php echo $form->textFieldRow($model, 'precio_total', array('size' => 10, 'maxlength' => 10, 'class' => 'span3')); ?>
    <?php echo $form->textFieldRow($model, 'estado', array('size' => 1, 'maxlength' => 1, 'class' => 'span3')); ?>
    <?php echo $form->textFieldRow($model, 'idlocal', array('class' => 'span3')); ?>

    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'type' => 'primary', 'label' => 'Submit')); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'reset', 'label' => 'Reset')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->