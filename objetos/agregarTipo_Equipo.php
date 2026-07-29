<?php
require_once "../conexion/conexion.php";
require_once "../clases/Tipo_Equipo.php";
require_once "../helpers.php";

$objeto = new Tipo_Equipo();
$objeto->setTipoId($_POST["txtCodigo"] ?? null);
$objeto->setNombre($_POST["txtNombre"] ?? null);
$objeto->setConexion($conexion);

$accion = isset($_POST['accion']) ? $_POST['accion'] : 'insertar';
if ($accion === 'eliminar') {
    if ($objeto->eliminarTipo_Equipo($_POST["txtCodigo"] ?? null)) {
        echo "Tipo de equipo eliminado con éxito";
    } else {
        echo "Error al eliminar";
    }
} else if ($accion === 'actualizar') {
    if ($objeto->actualizarTipo_Equipo()) {
        echo "Tipo de equipo actualizado con éxito";
    } else {
        echo "Error al actualizar";
    }
} else {
    if($objeto->insertarTipo_Equipo()){
        echo "<br>Tipo de Equipo Guardado:";
        echo "<br>Nombre: ". escapar($_POST["txtNombre"] ?? '');
    }else{
        echo "Error, verifique datos e intente nuevamente";
    }
}
?>
