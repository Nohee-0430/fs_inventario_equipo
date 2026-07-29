<?php
    include_once "conexion/conexion.php";
    include_once "clases/Roles.php";
    include_once "helpers.php";
    $listaRoles = Roles :: obtenerRoles($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roles</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Agregar Rol</h1>
    </header>
    <main class="container">
        <a class="button-link form-back" href="listaRoles.php">← Regresar a roles</a>
        <form action="objetos/agregarRoles.php" method="post">
            <input type="hidden" name="accion" value="<?=isset($_GET['txtCodigo']) ? 'actualizar' : 'insertar'?>">
            <label for="txtCodigo">Código</label>
            <input type="number" name="txtCodigo" id="txtCodigo" value="<?= escapar($_GET['txtCodigo'] ?? '') ?>" <?=isset($_GET['txtCodigo']) ? 'readonly' : ''?>>
            <label for="txtNombre">Nombre</label>
            <input type="text" name="txtNombre" id="txtNombre" value="<?= escapar($_GET['txtNombre'] ?? '') ?>">
            <label for="txtDescripcion">Descripción</label>
            <input type="text" name="txtDescripcion" id="txtDescripcion" value="<?= escapar($_GET['txtDescripcion'] ?? '') ?>">
            <button type="submit">Guardar</button>
        </form>
    </main>
</body>
</html>
