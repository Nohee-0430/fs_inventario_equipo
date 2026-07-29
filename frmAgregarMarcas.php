<?php
    $esEdicion = isset($_GET['txtCodigo']);
    function valorMarca($campo) {
        return htmlspecialchars($_GET[$campo] ?? '', ENT_QUOTES, 'UTF-8');
    }
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Marcas</title><link rel="stylesheet" href="css/bootstrap.min.css"><link rel="stylesheet" href="css/style.css"></head>
<body>
    <header><h1><?= $esEdicion ? 'Editar Marca' : 'Agregar Marca' ?></h1></header>
    <main class="container">
        <a class="button-link form-back" href="listaMarcas.php">← Regresar a marcas</a>
        <form action="objetos/agregarMarcas.php" method="post">
            <input type="hidden" name="accion" value="<?= $esEdicion ? 'actualizar' : 'insertar' ?>">
            <label for="txtCodigo">Código</label>
            <input type="number" name="txtCodigo" id="txtCodigo" value="<?= valorMarca('txtCodigo') ?>" <?= $esEdicion ? 'readonly' : '' ?>>
            <label for="txtMarca">Marca</label>
            <input type="text" name="txtMarca" id="txtMarca" value="<?= valorMarca('txtMarca') ?>" required>
            <button type="submit">Guardar</button>
        </form>
    </main>
</body>
</html>
