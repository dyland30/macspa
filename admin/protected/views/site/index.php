<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Bienvenidos a <?php echo CHtml::encode(Yii::app()->name); ?></i></h1>


<ul>
	<li>View file: <code><?php echo __FILE__; ?></code></li>
	<li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul>

<h3>Opciones</h3>
<ul>
    <li><?php echo CHtml::link("Administrar Páginas",$this->createUrl('Seccion/Index')); ?></li>
    <li><?php echo CHtml::link("Administrar Promociones",$this->createUrl('Promocion/Index')); ?></li>
    <li><?php echo CHtml::link("Administrar Locales",$this->createUrl('Local/Index')); ?></li>
    <li><?php echo CHtml::link("Administrar Usuarios",$this->createUrl('Usuario/Index')); ?></li>
    <li><?php echo CHtml::link("Administrar Categorias de Servicio",$this->createUrl('Categoria/Index')); ?></li>
    <li><?php echo CHtml::link("Administrar Servicios",$this->createUrl('Servicio/Index')); ?></li>
    <li><?php echo CHtml::link("Administrar Empleados",$this->createUrl('Personal/Index')); ?></li>
    <li><?php echo CHtml::link("Administrar Clientes",$this->createUrl('Cliente/Index')); ?></li>
    <li><?php echo CHtml::link("Reservas",$this->createUrl('Reserva/Index')); ?></li>
	<li><?php echo CHtml::link("Fotos",$this->createUrl('Foto/Index')); ?></li>
	<li><?php echo CHtml::link("Galeria",$this->createUrl('Galeria/Index')); ?></li>
</ul>

<p>For more details on how to further develop this application, please read
the <a href="http://www.yiiframework.com/doc/">documentation</a>.
Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
should you have any questions.</p>
