<?php
    include_once "conexion/conexion.php";
    include_once "clases/Roles.php";
    $listaRoles = Roles::obtenerRoles($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Roles</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Roles</h1>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Código</th><th>Nombre</th><th>Descripción</th><th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaRoles as $datos){ ?>
                <tr>
                    <td> <?php echo($datos['rol_id']);?> </td>
                    <td> <?php echo($datos['nombre']);?> </td>
                    <td> <?php echo($datos['descripcion']);?> </td>
                    <td style="display:flex; gap:5px;">
                        <form action="frmAgregarRoles.php" method="get">
                            <input type="hidden" name="txtCodigo" value="<?php echo($datos['rol_id']);?>">
                            <input type="hidden" name="txtNombre" value="<?php echo($datos['nombre']);?>">
                            <input type="hidden" name="txtDescripcion" value="<?php echo($datos['descripcion']);?>">
                            <button type="submit">Editar</button>
                        </form>
                        <form action="objetos/agregarRoles.php" method="post" onsubmit="return confirm('¿Está seguro de eliminar?');">
                            <input type="hidden" name="accion" value="eliminar">
                            <input type="hidden" name="txtCodigo" value="<?php echo($datos['rol_id']);?>">
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