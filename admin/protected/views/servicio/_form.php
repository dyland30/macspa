<?php
/* @var $this ServicioController */
/* @var $model Servicio */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'servicio-form',
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

        <?php echo $form->textFieldRow($model, 'nombre', array('size' => 45, 'maxlength' => 45, 'class' => 'span3')); ?>
        <?php echo $form->textFieldRow($model, 'descripcion', array('size' => 45, 'maxlength' => 45, 'class' => 'span3')); ?>
        <?php echo $form->dropDownListRow($model, 'idcategoria', $model->getCategorias(), array('class' => 'span3')); ?>
        <?php echo $form->textFieldRow($model, 'precio', array('size' => 10, 'maxlength' => 10, 'class' => 'span3')); ?>
    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'type' => 'primary', 'label' => 'Submit')); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'reset', 'label' => 'Reset')); ?>
    </div>


<?php $this->endWidget(); ?>

</div><!-- form -->