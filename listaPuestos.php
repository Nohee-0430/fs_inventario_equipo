<?php
    include_once "conexion/conexion.php";
    include_once "clases/Puestos.php";
    $listaPuestos = Puestos::obtenerPuestos($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Puestos</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Puestos</h1>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Código</th><th>Puesto</th><th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaPuestos as $datos){ ?>
                <tr>
                    <td> <?php echo($datos['puesto_id']);?> </td>
                    <td> <?php echo($datos['puesto']);?> </td>
                    <td style="display:flex; gap:5px;">
                        <form action="frmAgregarPuestos.php" method="get">
                            <input type="hidden" name="txtCodigo" value="<?php echo($datos['puesto_id']);?>">
                            <input type="hidden" name="txtPuesto" value="<?php echo($datos['puesto']);?>">
                            <button type="submit">Editar</button>
                        </form>
                        <form action="objetos/agregarPuestos.php" method="post" onsubmit="return confirm('¿Está seguro de eliminar?');">
                            <input type="hidden" name="accion" value="eliminar">
                            <input type="hidden" name="txtCodigo" value="<?php echo($datos['puesto_id']);?>">
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