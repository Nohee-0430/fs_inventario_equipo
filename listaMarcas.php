<?php
    include_once "conexion/conexion.php";
    include_once "clases/Marcas.php";
    $listaMarcas = Marcas::obtenerMarcas($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Marcas</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Marcas</h1>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Marca</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaMarcas as $datos){ ?>
                <tr>
                    <td>
                        <?php echo($datos['marca_id']);?> 
                    </td>
                    <td> 
                        <?php echo($datos['marca']);?> 
                    </td>
                    <td style="display:flex; gap:5px;">
                        <form action="frmAgregarMarcas.php" method="get">
                            <input type="hidden" name="txtCodigo" value="<?php echo($datos['marca_id']);?>">
                            <input type="hidden" name="txtMarca" value="<?php echo($datos['marca']);?>">
                            <button type="submit">Editar</button>
                        </form>
                        <form action="objetos/agregarMarcas.php" method="post" onsubmit="return confirm('¿Está seguro de eliminar?');">
                            <input type="hidden" name="accion" value="eliminar">
                            <input type="hidden" name="txtCodigo" value="<?php echo($datos['marca_id']);?>">
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