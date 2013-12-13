<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
        <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jquery-te-1.4.0.css" />
        
        <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-te-1.4.0.min.js"></script>
       
        
        
        
</head>

<body>
    
<?php $this->widget('bootstrap.widgets.TbNavbar',array(
    'type'=>'inverse',
    'brandUrl'=>'#',
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'Home', 'url'=>array('/site/index')),
                array('label'=>'Administrar','url'=>'#','items'=>array(
                    array('label'=>'Locales','url'=>array('/Local/Index')),
                    array('label'=>'Páginas','url'=>array('/Seccion/Index')),
                    array('label'=>'Promociones','url'=>array('/Promocion/Index')),
                    array('label'=>'Usuarios','url'=>array('Usuario/Index')),
                    array('label'=>'Categorias de Servicio','url'=>array('Categoria/Index')),
                    array('label'=>'Servicios','url'=>array('Servicio/Index')),
                    array('label'=>'Empleados','url'=>array('Personal/Index')),
                    array('label'=>'Clientes','url'=>array('Cliente/Index')),
                )),
                array('label'=>'Reservas', 'url'=>'#','items'=>array(
                    array('label'=>'Administrar Reservas','url'=>array('/Reserva/Index')),
                )),
                array('label'=>'Administrar Galeria', 'url'=>array('Galeria/Index'),'items'=>array(
                    array('label'=>'Galeria','url'=>array('/Galeria/Index')),
                    array('label'=>'Fotos','url'=>array('/Foto/Index')),
                )),
                array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
                array('label'=>'Contact', 'url'=>array('/site/contact')),
                array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
            ),
        ),
    ),
)); ?>

<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> Mac Salón & SPA<br/>
		All Rights Reserved.<br/>
		
	</div><!-- footer -->

</div><!-- page -->
 <script type ="text/javascript">
    $(document).ready(function(){
        $(".dp_fecha").datepicker( {'dateFormat' : 'dd/mm/yy', changeMonth: true,
      changeYear: true});
        
        
    });
    </script>
</body>
</html>
