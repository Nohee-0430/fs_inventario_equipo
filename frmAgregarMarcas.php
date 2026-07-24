<?php
    include_once "conexion/conexion.php";
    include_once "clases/Marcas.php";
    $listaMarcas = Marcas :: obtenerMarcas($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marcas</title>
</head>
<body>
    <header>
        <h1>Agregar Marca</h1>
    </header>
    <main>
        <form action="objetos/agregarMarcas.php" method="post">
            <input type="hidden" name="accion" value="<?=isset($_GET['txtCodigo']) ? 'actualizar' : 'insertar'?>">
            <label for="txtCodigo">Código</label>
            <input type="number" name="txtCodigo" id="txtCodigo" value="<?=isset($_GET['txtCodigo']) ? $_GET['txtCodigo'] : ''?>" <?=isset($_GET['txtCodigo']) ? 'readonly' : ''?>>
            <label for="txtNombre">Nombre de la Marca</label>
            <button type="submit">Guardar</button>
        </form>
    </main>
</body>
</html>