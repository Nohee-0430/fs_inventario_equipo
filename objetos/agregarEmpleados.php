<?php
require_once "../conexion/conexion.php";
require_once "../clases/Empleados.php";
require_once "../helpers.php";

$objeto = new Empleados();
$objeto->setEmpleadoId($_POST["txtCodigo"] ?? null);
$objeto->setNombre($_POST["txtNombre"] ?? null);
$objeto->setApellido($_POST["txtApellido"] ?? null);
$objeto->setTelefono($_POST["txtTelefono"] ?? null);
$objeto->setPuestoId($_POST["txtPuestoId"] ?? null);
$objeto->setFechaNacimiento($_POST["txtFechaNacimiento"] ?? null);
$objeto->setConexion($conexion);

$accion = isset($_POST['accion']) ? $_POST['accion'] : 'insertar';
if ($accion === 'eliminar') {
    if ($objeto->eliminarEmpleado($_POST["txtCodigo"] ?? null)) {
        echo "Empleado eliminado con éxito";
    } else {
        echo "Error al eliminar";
    }
} else if ($accion === 'actualizar') {
    if ($objeto->actualizarEmpleado()) {
        echo "Empleado actualizado con éxito";
    } else {
        echo "Error al actualizar";
    }
} else {
    if($objeto->insertarEmpleado()){
        echo "<br>Empleado Guardado:";
        echo "<br>Nombre: ". escapar($_POST["txtNombre"] ?? '');
        echo "<br>Apellido: ". escapar($_POST["txtApellido"] ?? '');
    }else{
        echo "Error, verifique datos e intente nuevamente";
    }
}
?>
