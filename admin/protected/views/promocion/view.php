<?php
/* @var $this PromocionController */
/* @var $model Promocion */

$this->breadcrumbs=array(
	'Promocions'=>array('index'),
	$model->idpromocion,
);

$this->menu=array(
	array('label'=>'List Promocion', 'url'=>array('index')),
	array('label'=>'Create Promocion', 'url'=>array('create')),
	array('label'=>'Update Promocion', 'url'=>array('update', 'id'=>$model->idpromocion)),
	array('label'=>'Delete Promocion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idpromocion),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Promocion', 'url'=>array('admin')),
);
?>

<h1>Código Promoción: <?php echo $model->idpromocion; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idpromocion',
		'titulo',
		'contenido',
		'imagen',
		'fch_inicio',
		'fch_fin',
		'orden',
		'flg_activo',
	),
)); ?>

<h3>Imagen</h3>
<?php echo CHtml::image(Yii::app()->request->baseUrl."/images/promociones/".$model->imagen,"Promocion"); ?>
<h3>Servicios incluidos</h3>

<div id ="frm_servicios">
	<p>
	Servicio:	
	<input type="text" id="txt_nombre_servicio">
	<input type="hidden" id="txt_id_servicio">
    Precio Promoción:
	<input type="text" id="txt_precio">
	<input type="button" id="btn_agregar" value="Agregar"/>
	</p>
</div>
<div id="servicios">
    <table border="0" id="tb_servicios">
        <thead>
            <tr>
                <th>Servicio</th>
                <th>Descripción</th>
				<th>Precio Promoción</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody id="tb_servicios_contenido">
            <tr>
                <td></td>
				<td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>

<div id ="frm_buscar">
    <p>Buscar: <input type="text" id="txt_buscar"/> <input type="button" id="frm_buscar_btn_buscar" value="Buscar"/></p>
    <table border="0" id="tb_buscar">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
				<th>Precio</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody id="tb_buscar_contenido">
            <tr>
				<td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>

</div>

<script type="text/javascript">
    $('#frm_buscar').dialog({autoOpen: false, height: 250, width: 400, title: 'Seleccionar Servicio'});
    $(document).ready(function() {

        $('#txt_nombre_servicio').click(function() {
            mostrarBuscador();

        });

        $('#frm_buscar_btn_buscar').click(function() {
            buscarServicios();
        });
		
		$('#btn_agregar').click(function() {
            agregarServicio();
        });

        cargarTabla();

    });

    function mostrarBuscador() {
        $('#frm_buscar').dialog('open');

    }
    function buscarServicios() {
        $("#tb_buscar_contenido").html("");
        $.post("<?php echo Yii::app()->createUrl('Servicio/buscarservicios') ?>", {filtro: $("#txt_buscar").val()}, function(datos) {
            $.each(datos, function(i, item) {
                $("#tb_buscar_contenido").append("<tr>" +
                        "<td>" + item.nombre + "</td>" +
                        "<td>" + item.descripcion + "</td>" +
						"<td>" + item.precio + "</td>" +
                        "<td><input type='image' name='seleccionar' id='seleccionar' src='<?php echo Yii::app()->request->baseUrl; ?>/images/icons/003.png' value='" + item.idservicio +"|"+item.nombre+"|"+item.precio+ "|' onclick='seleccionar(this)' alt='Seleccionar'/></td>" +
                        "</tr>"
                        );
            });

        }, "json");
        return false;

    }
    function seleccionar(boton) {
        var cadena = boton.value;
		//obtener servicio por id
		var ser = cadena.split("|");
		$("#txt_id_servicio").val(ser[0]);
		$("#txt_nombre_servicio").val(ser[1]);
		$("#txt_precio").val(ser[2]);
		
    }
    function cargarTabla() {
        $("#tb_servicios_contenido").html("");
        $.post("<?php echo Yii::app()->createUrl('Promocion/obtenerservicios') ?>", {id: <?php echo $model->idpromocion; ?>}, function(datos) {
            $.each(datos, function(i, item) {
                $("#tb_servicios_contenido").append("<tr>" +
                        "<td>" + item.nombre + "</td>" +
                        "<td>" + item.descripcion + "</td>" +
						"<td>" + item.precio + "</td>" +
                        "<td><input type='image' name='seleccionar' id='seleccionar' src='<?php echo Yii::app()->request->baseUrl; ?>/images/icons/004.png' value=" + item.idservicio + " onclick='remover(this)' alt='Remover'/></td>" +
                        "</tr>"
                        );
            });

        }, "json");
        return false;

    }

    function agregarServicio() {
		var idServ = $("#txt_id_servicio").val();
		var idProm = <?php echo $model->idpromocion; ?>;
		var prec = $("#txt_precio").val();

        $.post("<?php echo Yii::app()->createUrl('Promocion/agregarservicios') ?>", {idPromocion: idProm, idServicio: idServ, precio:prec}, function(datos) {

            if (datos === 'OK') {
                cargarTabla();

            }
            else {
                alert(datos);
            }

        });

    }

    function remover(boton) {

        $.post("<?php echo Yii::app()->createUrl('Promocion/removerservicio') ?>", {idPromocion: <?php echo $model->idpromocion; ?>, idServicio: boton.value}, function(datos) {
            if (confirm("¿Desea remover el servicio?")) {
                if (datos === 'OK') {
                    cargarTabla();
                }
                else {
                    alert(datos);
                }
            }
        });

    }

</script>
