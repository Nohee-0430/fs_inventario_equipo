<?php
    include_once "conexion/conexion.php";
    include_once "clases/Empleados.php";
    $listaEmpledos = Empleados :: obtenerEmpleados($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados</title>
</head>
<body>
    <header>
        <h1>Agregar Empleado</h1>
    </header>
    <main>
        <form action="objetos/agregarEmpleados.php" method="post">
            <input type="hidden" name="accion" value="<?=isset($_GET['num_codigo']) ? 'actualizar' : 'insertar'?>">
            <label for="num_codigo">Código</label>
            <input type="number" name="num_codigo" id="num_codigo" value="<?=isset($_GET['num_codigo']) ? $_GET['num_codigo'] : ''?>" <?=isset($_GET['num_codigo']) ? 'readonly' : ''?>>
            <label for="txt_nombre">Nombre</label>
            <input type="text" name="txt_nombre" id="txt_nombre" value="<?=isset($_GET['txt_nombre']) ? $_GET['txt_nombre'] : ''?>">
            <label for="">Regiones</label>
            <select name="lst_region" id="lst_region">
                <?php
                    foreach ($listaRegiones as $region):
                ?>
                    <option value=" <?= $region['cod_region' ]; ?>"> <?= $region['nombre'] ;?></option>
                <?php
                    endforeach;
                ?>
            </select>
            <button type="submit">Guardar</button>
        </form>
    </main>
</body>
</html>