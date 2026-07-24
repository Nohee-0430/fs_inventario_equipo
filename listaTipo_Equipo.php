<?php
    include_once "conexion/conexion.php";
    include_once "clases/Tipo_Equipo.php";
    $listaTipo_Equipo = Tipo_Equipo::obtenerTipo_Equipo($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tipos de Equipo</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Tipos de Equipo</h1>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Código</th><th>Nombre</th><th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaTipo_Equipo as $datos){ ?>
                <tr>
                    <td> <?php echo($datos['tipo_id']);?> </td>
                    <td> <?php echo($datos['nombre']);?> </td>
                    <td style="display:flex; gap:5px;">
                        <form action="frmAgregarTipo_Equipo.php" method="get">
                            <input type="hidden" name="txtCodigo" value="<?php echo($datos['tipo_id']);?>">
                            <input type="hidden" name="txtNombre" value="<?php echo($datos['nombre']);?>">
                            <button type="submit">Editar</button>
                        </form>
                        <form action="objetos/agregarTipo_Equipo.php" method="post" onsubmit="return confirm('¿Está seguro de eliminar?');">
                            <input type="hidden" name="accion" value="eliminar">
                            <input type="hidden" name="txtCodigo" value="<?php echo($datos['tipo_id']);?>">
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