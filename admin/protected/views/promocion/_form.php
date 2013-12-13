<?php
/* @var $this PromocionController */
/* @var $model Promocion */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'promocion-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'htmlOptions' => array('enctype' => 'multipart/form-data', 'class' => 'well'),
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    <?php echo $form->textFieldRow($model, 'titulo', array('size' => 45, 'maxlength' => 45, 'class' => 'span3')); ?>
    <?php echo $form->textAreaRow($model, 'contenido', array('rows' => 6, 'cols' => 50, 'class' => 'span3')); ?>
    <?php echo $form->fileFieldRow($model, 'rutaimagen', array('class' => 'span3')); ?>
    <?php echo $form->textFieldRow($model, 'fch_inicio', array('class' => 'span3 dp_fecha')); ?>
    <?php echo $form->textFieldRow($model, 'fch_fin', array('class' => 'span3 dp_fecha')); ?>
<?php echo $form->textFieldRow($model, 'orden', array('class' => 'span3')); ?>
        <?php echo $form->textFieldRow($model, 'flg_activo', array('class' => 'span3')); ?>

    <div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'type' => 'primary', 'label' => 'Submit')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'reset', 'label' => 'Reset')); ?>
    </div>

<?php $this->endWidget(); ?>

     <script type="text/javascript">
    $("#Promocion_contenido").jqte();
    
    </script>
   
</div><!-- form -->