<?php
require_once "../conexion/conexion.php";
require_once "../clases/Roles.php";
require_once "../helpers.php";

$objeto = new Roles();
$objeto->setRolId($_POST["txtCodigo"] ?? null);
$objeto->setNombre($_POST["txtNombre"] ?? null);
$objeto->setDescripcion($_POST["txtDescripcion"] ?? null);
$objeto->setConexion($conexion);

$accion = isset($_POST['accion']) ? $_POST['accion'] : 'insertar';
if ($accion === 'eliminar') {
    if ($objeto->eliminarRol($_POST["txtCodigo"] ?? null)) {
        echo "Rol eliminado con éxito";
    } else {
        echo "Error al eliminar";
    }
} else if ($accion === 'actualizar') {
    if ($objeto->actualizarRol()) {
        echo "Rol actualizado con éxito";
    } else {
        echo "Error al actualizar";
    }
} else {
    if($objeto->insertarRol()){
        echo "<br>Rol Guardado:";
        echo "<br>Nombre: ". escapar($_POST["txtNombre"] ?? '');
        echo "<br>Descripción: ". escapar($_POST["txtDescripcion"] ?? '');
    }else{
        echo "Error, verifique datos e intente nuevamente";
    }
}
?>
