<?php
    include_once "conexion/conexion.php";
    include_once "clases/Puestos.php";
    include_once "helpers.php";
    $listaPuestos = Puestos::obtenerPuestos($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Puestos</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Puestos</h1>
    </header>
    <nav class="site-nav container" aria-label="Navegación principal">
        <button class="site-nav__toggle" type="button" aria-expanded="false" aria-controls="menu-principal">Menú de navegación</button>
        <div class="site-nav__links" id="menu-principal">
            <a href="index.php">Inicio</a><a href="listaMarcas.php">Marcas</a><a href="listaTipo_Equipo.php">Tipos</a><a href="listaRoles.php">Roles</a><a href="listaPuestos.php">Puestos</a><a href="listaEmpleados.php">Empleados</a><a href="listaUsuarios.php">Usuarios</a><a href="listaEquipos.php">Equipos</a>
        </div>
    </nav>
    <main class="container">
        <div class="page-actions"><a class="button-link" href="frmAgregarPuestos.php">Agregar puesto</a></div>
        <table>
            <thead>
                <tr>
                    <th>Código</th><th>Puesto</th><th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaPuestos as $datos){ $datos = array_map('escapar', $datos); ?>
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
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/app.js"></script>
</body>
</html>
