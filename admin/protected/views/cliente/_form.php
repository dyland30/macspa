<?php
/* @var $this ClienteController */
/* @var $model Cliente */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'cliente-form',
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


    <?php echo $form->textFieldRow($model, 'nombres', array('size' => 60, 'maxlength' => 60,'class'=>'span3')); ?>
    <?php echo $form->textFieldRow($model, 'apellidos', array('size' => 60, 'maxlength' => 60,'class'=>'span3')); ?>
    <?php echo $form->textFieldRow($model, 'dni', array('size' => 45, 'maxlength' => 45,'class'=>'span3')); ?>
    <?php echo $form->textFieldRow($model, 'correo', array('size' => 45, 'maxlength' => 45,'class'=>'span3')); ?>
    <?php echo $form->textFieldRow($model, 'celular', array('size' => 45, 'maxlength' => 45,'class'=>'span3')); ?>
    <?php echo $form->textFieldRow($model, 'telefono', array('size' => 45, 'maxlength' => 45,'class'=>'span3')); ?>
    <?php echo $form->textFieldRow($model, 'login', array('size' => 45, 'maxlength' => 45,'class'=>'span3')); ?>
    <?php echo $form->textFieldRow($model, 'clave', array('size' => 45, 'maxlength' => 45,'class'=>'span3')); ?>


    <div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'type' => 'primary', 'label' => 'Submit')); ?>
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'reset', 'label' => 'Reset')); ?>
    </div>


<?php $this->endWidget(); ?>

</div><!-- form -->