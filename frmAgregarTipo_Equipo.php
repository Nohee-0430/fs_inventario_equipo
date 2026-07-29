<?php
    include_once "conexion/conexion.php";
    include_once "clases/Tipo_Equipo.php";
    include_once "helpers.php";
    $listasTipo_Equipo = Tipo_Equipo :: obtenerTipo_Equipo($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipos de Equipo</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Agregar Tipo de Equipo</h1>
    </header>
    <main class="container">
        <a class="button-link form-back" href="listaTipo_Equipo.php">← Regresar a tipos de equipo</a>
        <form action="objetos/agregarTipo_Equipo.php" method="post">
            <input type="hidden" name="accion" value="<?=isset($_GET['txtCodigo']) ? 'actualizar' : 'insertar'?>">
            <label for="txtCodigo">Código</label>
            <input type="number" name="txtCodigo" id="txtCodigo" value="<?= escapar($_GET['txtCodigo'] ?? '') ?>" <?=isset($_GET['txtCodigo']) ? 'readonly' : ''?>>
            <label for="txtNombre">Tipo de Equipo</label>
            <input type="text" name="txtNombre" id="txtNombre" value="<?= escapar($_GET['txtNombre'] ?? '') ?>">
            <button type="submit">Guardar</button>
        </form>
    </main>
</body>
</html>
