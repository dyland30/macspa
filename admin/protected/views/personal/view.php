<?php
/* @var $this PersonalController */
/* @var $model Personal */

$this->breadcrumbs = array(
    'Personals' => array('index'),
    $model->idPersonal,
);

$this->menu = array(
    array('label' => 'List Personal', 'url' => array('index')),
    array('label' => 'Create Personal', 'url' => array('create')),
    array('label' => 'Update Personal', 'url' => array('update', 'id' => $model->idPersonal)),
    array('label' => 'Delete Personal', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->idPersonal), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Personal', 'url' => array('admin')),
);
?>

<h1>View Personal #<?php echo $model->idPersonal; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'idPersonal',
        'nombres',
        'apellidos',
        'direccion',
        'fechaNacimiento',
        'correo',
        'celular',
        'telefono',
        'local.nombre',
        'flg_activo',
    ),
));
?>

<h3>Servicios</h3>
<div id ="frm_servicios">

    <input type="button" id="btn_agregar" value="Agregar Servicios"/>

</div>
<div id="servicios">
    <table border="0" id="tb_servicios">
        <thead>
            <tr>
                <th>Servicio</th>
                <th>Descripcion</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody id="tb_servicios_contenido">
            <tr>
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
                <th>Descripcion</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody id="tb_buscar_contenido">
            <tr>
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

        $('#btn_agregar').click(function() {
            mostrarBuscador();

        });

        $('#frm_buscar_btn_buscar').click(function() {
            buscarServicios();
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
                        "<td><input type='image' name='seleccionar' id='seleccionar' src='<?php echo Yii::app()->request->baseUrl; ?>/images/icons/003.png' value=" + item.idservicio + " onclick='seleccionar(this)' alt='Seleccionar'/></td>" +
                        "</tr>"
                        );
            });

        }, "json");
        return false;

    }
    function seleccionar(boton) {
        var idServicio = boton.value;
        var idPersonal = <?php echo $model->idPersonal; ?>;
        agregarServicio(idPersonal, idServicio);

    }
    function cargarTabla() {
        $("#tb_servicios_contenido").html("");
        $.post("<?php echo Yii::app()->createUrl('Personal/obtenerservicios') ?>", {id: <?php echo $model->idPersonal; ?>}, function(datos) {
            $.each(datos, function(i, item) {
                $("#tb_servicios_contenido").append("<tr>" +
                        "<td>" + item.nombre + "</td>" +
                        "<td>" + item.descripcion + "</td>" +
                        "<td><input type='image' name='seleccionar' id='seleccionar' src='<?php echo Yii::app()->request->baseUrl; ?>/images/icons/004.png' value=" + item.idservicio + " onclick='remover(this)' alt='Remover'/></td>" +
                        "</tr>"
                        );
            });

        }, "json");
        return false;

    }

    function agregarServicio(idPer, idServ) {

        $.post("<?php echo Yii::app()->createUrl('Personal/agregarservicios') ?>", {idPersonal: idPer, idServicio: idServ}, function(datos) {

            if (datos === 'OK') {
                cargarTabla();

            }
            else {
                alert(datos);
            }

        });

    }

    function remover(boton) {

        $.post("<?php echo Yii::app()->createUrl('Personal/removerservicio') ?>", {idPersonal: <?php echo $model->idPersonal; ?>, idServicio: boton.value}, function(datos) {
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