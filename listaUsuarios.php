<?php
    include_once "conexion/conexion.php";
    include_once "clases/Usuarios.php";
    $listaUsuarios = Usuarios::obtenerUsuarios($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Usuarios</h1>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Código</th><th>Usuario</th><th>Email</th><th>Estado</th><th>Rol ID</th><th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaUsuarios as $datos){ ?>
                <tr>
                    <td> <?php echo($datos['usuario_id']);?> </td>
                    <td> <?php echo($datos['usuario']);?> </td>
                    <td> <?php echo($datos['email']);?> </td>
                    <td> <?php echo($datos['estado']);?> </td>
                    <td> <?php echo($datos['rol_id']);?> </td>
                    <td style="display:flex; gap:5px;">
                        <form action="frmAgregarUsuarios.php" method="get">
                            <input type="hidden" name="txtCodigo" value="<?php echo($datos['usuario_id']);?>">
                            <input type="hidden" name="txtUsuario" value="<?php echo($datos['usuario']);?>">
                            <input type="hidden" name="txtEmail" value="<?php echo($datos['email']);?>">
                            <input type="hidden" name="txtEstado" value="<?php echo($datos['estado']);?>">
                            <input type="hidden" name="txtRolId" value="<?php echo($datos['rol_id']);?>">
                            <button type="submit">Editar</button>
                        </form>
                        <form action="objetos/agregarUsuarios.php" method="post" onsubmit="return confirm('¿Está seguro de eliminar?');">
                            <input type="hidden" name="accion" value="eliminar">
                            <input type="hidden" name="txtCodigo" value="<?php echo($datos['usuario_id']);?>">
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