<?php
    include_once "conexion/conexion.php";
    include_once "clases/Roles.php";
    $listaRoles = Roles :: obtenerRoles($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roles</title>
</head>
<body>
    <header>
        <h1>Agregar Rol</h1>
    </header>
    <main>
        <form action="objetos/agregarRoles.php" method="post">
            <input type="hidden" name="accion" value="<?=isset($_GET['txtCodigo']) ? 'actualizar' : 'insertar'?>">
            <label for="txtCodigo">Código</label>
            <input type="number" name="txtCodigo" id="txtCodigo" value="<?=isset($_GET['txtCodigo']) ? $_GET['txtCodigo'] : ''?>" <?=isset($_GET['txtCodigo']) ? 'readonly' : ''?>>
            <label for="txtNombre">Nombre</label>
            <input type="text" name="txtNombre" id="txtNombre" value="<?=isset($_GET['txtNombre']) ? $_GET['txtNombre'] : ''?>">
            <label for="txtDescripcion">Descripción</label>
            <input type="text" name="txtDescripcion" id="txtDescripcion" value="<?=isset($_GET['txtDescripcion']) ? $_GET['txtDescripcion'] : ''?>">
            <button type="submit">Guardar</button>
        </form>
    </main>
</body>
</html>