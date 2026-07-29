<?php
    $esEdicion = isset($_GET['txtCodigo']);
    function valorUsuario($campo) {
        return htmlspecialchars($_GET[$campo] ?? '', ENT_QUOTES, 'UTF-8');
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header><h1><?= $esEdicion ? 'Editar Usuario' : 'Agregar Usuario' ?></h1></header>
    <main class="container">
        <a class="button-link form-back" href="listaUsuarios.php">← Regresar a usuarios</a>
        <form action="objetos/agregarUsuarios.php" method="post">
            <input type="hidden" name="accion" value="<?= $esEdicion ? 'actualizar' : 'insertar' ?>">
            <label for="txtCodigo">Código</label>
            <input type="number" name="txtCodigo" id="txtCodigo" value="<?= valorUsuario('txtCodigo') ?>" <?= $esEdicion ? 'readonly' : '' ?>>
            <label for="txtUsuario">Usuario</label>
            <input type="text" name="txtUsuario" id="txtUsuario" value="<?= valorUsuario('txtUsuario') ?>" required>
            <label for="txtEmail">Email</label>
            <input type="email" name="txtEmail" id="txtEmail" value="<?= valorUsuario('txtEmail') ?>" required>
            <label for="txtContrasenia">Contraseña</label>
            <input type="password" name="txtContrasenia" id="txtContrasenia" required>
            <label for="txtEstado">Estado</label>
            <input type="text" name="txtEstado" id="txtEstado" value="<?= valorUsuario('txtEstado') ?>" required>
            <label for="txtRolId">Rol ID</label>
            <input type="number" name="txtRolId" id="txtRolId" value="<?= valorUsuario('txtRolId') ?>" required>
            <button type="submit">Guardar</button>
        </form>
    </main>
</body>
</html>
