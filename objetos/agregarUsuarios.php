<?php
require_once "../conexion/conexion.php";
require_once "../clases/Usuarios.php";

$objeto = new Usuarios();
$objeto->setUsuarioId($_POST["txtCodigo"] ?? null);
$objeto->setUsuario($_POST["txtUsuario"] ?? null);
$objeto->setEmail($_POST["txtEmail"] ?? null);
$objeto->setContrasenia($_POST["txtContrasenia"] ?? null);
$objeto->setEstado($_POST["txtEstado"] ?? null);
$objeto->setRolId($_POST["txtRolId"] ?? null);
$objeto->setConexion($conexion);

$accion = isset($_POST['accion']) ? $_POST['accion'] : 'insertar';
if ($accion === 'eliminar') {
    if ($objeto->eliminarUsuario($_POST["txtCodigo"])) {
        echo "Usuario eliminado con éxito";
    } else {
        echo "Error al eliminar";
    }
} else if ($accion === 'actualizar') {
    if ($objeto->actualizarUsuario()) {
        echo "Usuario actualizado con éxito";
    } else {
        echo "Error al actualizar";
    }
} else {
    if($objeto->insertarUsuario()){
        echo "<br>Usuario Guardado:";
        echo "<br>Usuario: ". $_POST["txtUsuario"];
        echo "<br>Email: ". $_POST["txtEmail"];
    }else{
        echo "Error, verifique datos e intente nuevamente";
    }
}
?>
