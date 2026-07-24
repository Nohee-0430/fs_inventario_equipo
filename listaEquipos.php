<?php
    include_once "conexion/conexion.php";
    include_once "clases/Equipos.php";
    $listaEquipos = Equipos::obtenerEquipos($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Equipos</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Equipos</h1>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Código</th><th>No. Serie</th><th>Marca ID</th><th>Descripción</th><th>Compra</th><th>Precio</th><th>Tipo ID</th><th>Empleado ID</th><th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaEquipos as $datos){ ?>
                <tr>
                    <td> <?php echo($datos['equipo_id']);?> </td>
                    <td> <?php echo($datos['no_serie']);?> </td>
                    <td> <?php echo($datos['marca_id']);?> </td>
                    <td> <?php echo($datos['descripcion']);?> </td>
                    <td> <?php echo($datos['fecha_compra']);?> </td>
                    <td> <?php echo($datos['precio']);?> </td>
                    <td> <?php echo($datos['tipo_id']);?> </td>
                    <td> <?php echo($datos['empleado_id']);?> </td>
                    <td style="display:flex; gap:5px;">
                        <form action="frmAgregarEquipos.php" method="get">
                            <input type="hidden" name="txtCodigo" value="<?php echo($datos['equipo_id']);?>">
                            <input type="hidden" name="txtNoSerie" value="<?php echo($datos['no_serie']);?>">
                            <input type="hidden" name="txtMarcaId" value="<?php echo($datos['marca_id']);?>">
                            <input type="hidden" name="txtDescripcion" value="<?php echo($datos['descripcion']);?>">
                            <input type="hidden" name="txtFechaCompra" value="<?php echo($datos['fecha_compra']);?>">
                            <input type="hidden" name="numPrecio" value="<?php echo($datos['precio']);?>">
                            <input type="hidden" name="txtTipoId" value="<?php echo($datos['tipo_id']);?>">
                            <input type="hidden" name="txtEmpleadoId" value="<?php echo($datos['empleado_id']);?>">
                            <button type="submit">Editar</button>
                        </form>
                        <form action="objetos/agregarEquipos.php" method="post" onsubmit="return confirm('¿Está seguro de eliminar?');">
                            <input type="hidden" name="accion" value="eliminar">
                            <input type="hidden" name="txtCodigo" value="<?php echo($datos['equipo_id']);?>">
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
</body>
</html>