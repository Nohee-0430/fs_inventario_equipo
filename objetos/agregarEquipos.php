<?php
require_once "../conexion/conexion.php";
require_once "../clases/Equipos.php";
require_once "../helpers.php";

$objeto = new Equipos();
$objeto->setEquipoId($_POST["txtCodigo"] ?? null);
$objeto->setNoSerie($_POST["txtNoSerie"] ?? null);
$objeto->setMarcaId($_POST["txtMarcaId"] ?? null);
$objeto->setDescripcion($_POST["txtDescripcion"] ?? null);
$objeto->setFechaCompra($_POST["txtFechaCompra"] ?? null);
$objeto->setPrecio($_POST["numPrecio"] ?? null);
$objeto->setTipoId($_POST["txtTipoId"] ?? null);
$objeto->setEmpleadoId($_POST["txtEmpleadoId"] ?? null);
$objeto->setConexion($conexion);

$accion = isset($_POST['accion']) ? $_POST['accion'] : 'insertar';
if ($accion === 'eliminar') {
    if ($objeto->eliminarEquipo($_POST["txtCodigo"] ?? null)) {
        echo "Equipo eliminado con éxito";
    } else {
        echo "Error al eliminar";
    }
} else if ($accion === 'actualizar') {
    if ($objeto->actualizarEquipo()) {
        echo "Equipo actualizado con éxito";
    } else {
        echo "Error al actualizar";
    }
} else {
    if($objeto->insertarEquipo()){
        echo "<br>Equipo Guardado:";
        echo "<br>No. Serie: ". escapar($_POST["txtNoSerie"] ?? '');
        echo "<br>Descripción: ". escapar($_POST["txtDescripcion"] ?? '');
    }else{
        echo "Error, verifique datos e intente nuevamente";
    }
}
?>
