<?php
    include_once "conexion/conexion.php";
    include_once "clases/Empleados.php";
    $listaEmpleados = Empleados::obtenerEmpleados($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Empleados</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Empleados</h1>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Código</th><th>Nombre</th><th>Apellido</th><th>Teléfono</th><th>Puesto ID</th><th>Nacimiento</th><th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaEmpleados as $datos){ ?>
                <tr>
                    <td> <?php echo($datos['empleado_id']);?> </td>
                    <td> <?php echo($datos['nombre']);?> </td>
                    <td> <?php echo($datos['apellido']);?> </td>
                    <td> <?php echo($datos['telefono']);?> </td>
                    <td> <?php echo($datos['puesto_id']);?> </td>
                    <td> <?php echo($datos['fecha_nacimiento']);?> </td>
                    <td style="display:flex; gap:5px;">
                        <form action="frmAgregarEmpleados.php" method="get">
                            <input type="hidden" name="txtCodigo" value="<?php echo($datos['empleado_id']);?>">
                            <input type="hidden" name="txtNombre" value="<?php echo($datos['nombre']);?>">
                            <input type="hidden" name="txtApellido" value="<?php echo($datos['apellido']);?>">
                            <input type="hidden" name="txtTelefono" value="<?php echo($datos['telefono']);?>">
                            <input type="hidden" name="txtPuestoId" value="<?php echo($datos['puesto_id']);?>">
                            <input type="hidden" name="txtFechaNacimiento" value="<?php echo($datos['fecha_nacimiento']);?>">
                            <button type="submit">Editar</button>
                        </form>
                        <form action="objetos/agregarEmpleados.php" method="post" onsubmit="return confirm('¿Está seguro de eliminar?');">
                            <input type="hidden" name="accion" value="eliminar">
                            <input type="hidden" name="txtCodigo" value="<?php echo($datos['empleado_id']);?>">
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