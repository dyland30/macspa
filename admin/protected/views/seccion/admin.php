<?php
/* @var $this SeccionController */
/* @var $model Seccion */

$this->breadcrumbs = array(
    'Seccions' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Listar Páginas', 'url' => array('index')),
    array('label' => 'Crear Página', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#seccion-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Seccions</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'id' => 'seccion-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'idseccion',
        'titulo',
        array(
            'header'=> 'Contenido',
            'type' => 'raw',
            'value' => Chtml::decode($model->contenido)
        ),
        'div_id',
        'flg_activo',
        'idusuario',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'htmlOptions' => array('style' => 'width: 50px'),
        ),
    ),
));
?>
