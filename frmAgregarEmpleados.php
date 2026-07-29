<?php
    $esEdicion = isset($_GET['txtCodigo']);
    function valorEmpleado($campo) {
        return htmlspecialchars($_GET[$campo] ?? '', ENT_QUOTES, 'UTF-8');
    }
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Empleados</title><link rel="stylesheet" href="css/bootstrap.min.css"><link rel="stylesheet" href="css/style.css"></head>
<body>
    <header><h1><?= $esEdicion ? 'Editar Empleado' : 'Agregar Empleado' ?></h1></header>
    <main class="container">
        <a class="button-link form-back" href="listaEmpleados.php">← Regresar a empleados</a>
        <form action="objetos/agregarEmpleados.php" method="post">
            <input type="hidden" name="accion" value="<?= $esEdicion ? 'actualizar' : 'insertar' ?>">
            <label for="txtCodigo">Código</label>
            <input type="number" name="txtCodigo" id="txtCodigo" value="<?= valorEmpleado('txtCodigo') ?>" <?= $esEdicion ? 'readonly' : '' ?>>
            <label for="txtNombre">Nombre</label>
            <input type="text" name="txtNombre" id="txtNombre" value="<?= valorEmpleado('txtNombre') ?>" required>
            <label for="txtApellido">Apellido</label>
            <input type="text" name="txtApellido" id="txtApellido" value="<?= valorEmpleado('txtApellido') ?>" required>
            <label for="txtTelefono">Teléfono</label>
            <input type="tel" name="txtTelefono" id="txtTelefono" value="<?= valorEmpleado('txtTelefono') ?>" required>
            <label for="txtPuestoId">Puesto ID</label>
            <input type="number" name="txtPuestoId" id="txtPuestoId" value="<?= valorEmpleado('txtPuestoId') ?>" required>
            <label for="txtFechaNacimiento">Fecha de nacimiento</label>
            <input type="date" name="txtFechaNacimiento" id="txtFechaNacimiento" value="<?= valorEmpleado('txtFechaNacimiento') ?>" required>
            <button type="submit">Guardar</button>
        </form>
    </main>
</body>
</html>
