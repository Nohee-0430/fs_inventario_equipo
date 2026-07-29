<?php
    $esEdicion = isset($_GET['txtCodigo']);
    function valorPuesto($campo) {
        return htmlspecialchars($_GET[$campo] ?? '', ENT_QUOTES, 'UTF-8');
    }
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Puestos</title><link rel="stylesheet" href="css/bootstrap.min.css"><link rel="stylesheet" href="css/style.css"></head>
<body>
    <header><h1><?= $esEdicion ? 'Editar Puesto' : 'Agregar Puesto' ?></h1></header>
    <main class="container">
        <a class="button-link form-back" href="listaPuestos.php">← Regresar a puestos</a>
        <form action="objetos/agregarPuestos.php" method="post">
            <input type="hidden" name="accion" value="<?= $esEdicion ? 'actualizar' : 'insertar' ?>">
            <label for="txtCodigo">Código</label>
            <input type="number" name="txtCodigo" id="txtCodigo" value="<?= valorPuesto('txtCodigo') ?>" <?= $esEdicion ? 'readonly' : '' ?>>
            <label for="txtPuesto">Puesto</label>
            <input type="text" name="txtPuesto" id="txtPuesto" value="<?= valorPuesto('txtPuesto') ?>" required>
            <button type="submit">Guardar</button>
        </form>
    </main>
</body>
</html>
