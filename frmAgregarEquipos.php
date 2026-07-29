<?php
    $esEdicion = isset($_GET['txtCodigo']);
    function valorEquipo($campo) {
        return htmlspecialchars($_GET[$campo] ?? '', ENT_QUOTES, 'UTF-8');
    }
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Equipos</title><link rel="stylesheet" href="css/bootstrap.min.css"><link rel="stylesheet" href="css/style.css"></head>
<body>
    <header><h1><?= $esEdicion ? 'Editar Equipo' : 'Agregar Equipo' ?></h1></header>
    <main class="container">
        <a class="button-link form-back" href="listaEquipos.php">← Regresar a equipos</a>
        <form action="objetos/agregarEquipos.php" method="post">
            <input type="hidden" name="accion" value="<?= $esEdicion ? 'actualizar' : 'insertar' ?>">
            <label for="txtCodigo">Código</label>
            <input type="number" name="txtCodigo" id="txtCodigo" value="<?= valorEquipo('txtCodigo') ?>" <?= $esEdicion ? 'readonly' : '' ?>>
            <label for="txtNoSerie">No. de serie</label>
            <input type="text" name="txtNoSerie" id="txtNoSerie" value="<?= valorEquipo('txtNoSerie') ?>" required>
            <label for="txtMarcaId">Marca ID</label>
            <input type="number" name="txtMarcaId" id="txtMarcaId" value="<?= valorEquipo('txtMarcaId') ?>" required>
            <label for="txtDescripcion">Descripción</label>
            <input type="text" name="txtDescripcion" id="txtDescripcion" value="<?= valorEquipo('txtDescripcion') ?>" required>
            <label for="txtFechaCompra">Fecha de compra</label>
            <input type="date" name="txtFechaCompra" id="txtFechaCompra" value="<?= valorEquipo('txtFechaCompra') ?>" required>
            <label for="numPrecio">Precio</label>
            <input type="number" name="numPrecio" id="numPrecio" value="<?= valorEquipo('numPrecio') ?>" step="0.01" min="0" required>
            <label for="txtTipoId">Tipo ID</label>
            <input type="number" name="txtTipoId" id="txtTipoId" value="<?= valorEquipo('txtTipoId') ?>" required>
            <label for="txtEmpleadoId">Empleado ID</label>
            <input type="number" name="txtEmpleadoId" id="txtEmpleadoId" value="<?= valorEquipo('txtEmpleadoId') ?>" required>
            <button type="submit">Guardar</button>
        </form>
    </main>
</body>
</html>
