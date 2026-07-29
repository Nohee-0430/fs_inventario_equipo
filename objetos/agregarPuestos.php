<?php
require_once "../conexion/conexion.php";
require_once "../clases/Puestos.php";
require_once "../helpers.php";

$objeto = new Puestos();
$objeto->setPuestoId($_POST["txtCodigo"] ?? null);
$objeto->setPuesto($_POST["txtPuesto"] ?? null);
$objeto->setConexion($conexion);

$accion = isset($_POST['accion']) ? $_POST['accion'] : 'insertar';
if ($accion === 'eliminar') {
    if ($objeto->eliminarPuesto($_POST["txtCodigo"] ?? null)) {
        echo "Puesto eliminado con éxito";
    } else {
        echo "Error al eliminar";
    }
} else if ($accion === 'actualizar') {
    if ($objeto->actualizarPuesto()) {
        echo "Puesto actualizado con éxito";
    } else {
        echo "Error al actualizar";
    }
} else {
    if($objeto->insertarPuesto()){
        echo "<br>Puesto Guardado:";
        echo "<br>Puesto: ". escapar($_POST["txtPuesto"] ?? '');
    }else{
        echo "Error, verifique datos e intente nuevamente";
    }
}
?>
