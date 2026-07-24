<?php
require_once "../conexion/conexion.php";
require_once "../clases/Marcas.php";

$objeto = new Marcas();
$objeto->setMarcaId($_POST["txtCodigo"] ?? null);
$objeto->setMarca($_POST["txtMarca"] ?? null);
$objeto->setConexion($conexion);

$accion = isset($_POST['accion']) ? $_POST['accion'] : 'insertar';
if ($accion === 'eliminar') {
    if ($objeto->eliminarMarca($_POST["txtCodigo"])) {
        echo "Marca eliminada con éxito";
    } else {
        echo "Error al eliminar";
    }
} else if ($accion === 'actualizar') {
    if ($objeto->actualizarMarca()) {
        echo "Marca actualizada con éxito";
    } else {
        echo "Error al actualizar";
    }
} else {
    if($objeto->insertarMarca()){
        echo "<br>Marca Guardada:";
        echo "<br>Marca: ". $_POST["txtMarca"];
    }else{
        echo "Error, verifique datos e intente nuevamente";
    }
}
?>