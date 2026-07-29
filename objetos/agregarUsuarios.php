<?php
require_once "../conexion/conexion.php";
require_once "../clases/Usuarios.php";
require_once "../helpers.php";

$accion = $_POST['accion'] ?? 'insertar';
if ($accion !== 'eliminar' && empty($_POST['txtContrasenia'])) {
    exit('La contraseña es obligatoria.');
}

$objeto = new Usuarios();
$objeto->setUsuarioId($_POST["txtCodigo"] ?? null);
$objeto->setUsuario($_POST["txtUsuario"] ?? null);
$objeto->setEmail($_POST["txtEmail"] ?? null);
$objeto->setContrasenia($accion === 'eliminar' ? null : password_hash($_POST['txtContrasenia'], PASSWORD_DEFAULT));
$objeto->setEstado($_POST["txtEstado"] ?? null);
$objeto->setRolId($_POST["txtRolId"] ?? null);
$objeto->setConexion($conexion);

if ($accion === 'eliminar') {
    if ($objeto->eliminarUsuario($_POST["txtCodigo"] ?? null)) {
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
        echo "<br>Usuario: ". escapar($_POST["txtUsuario"] ?? '');
        echo "<br>Email: ". escapar($_POST["txtEmail"] ?? '');
    }else{
        echo "Error, verifique datos e intente nuevamente";
    }
}
?>
