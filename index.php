<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Sistema de Inventario de Equipo</h1>
    </header>
    <main class="container dashboard">
        <h2 class="text">Menú Principal</h2>
        <p class="dashboard-intro">Explora los módulos y selecciona el que deseas administrar.</p>
        <div class="dashboard-layout">
            <nav id="dashboard-nav" class="dashboard-nav" aria-label="Módulos del sistema">
                <a href="#marcas">Marcas</a>
                <a href="#tipos">Tipos de equipo</a>
                <a href="#roles">Roles</a>
                <a href="#puestos">Puestos</a>
                <a href="#empleados">Empleados</a>
                <a href="#usuarios">Usuarios</a>
                <a href="#equipos">Equipos</a>
            </nav>
            <div class="dashboard-content" data-bs-spy="scroll" data-bs-target="#dashboard-nav" data-bs-smooth-scroll="true" tabindex="0">
                <section id="marcas"><h3>Marcas</h3><p>Registra y consulta las marcas disponibles para los equipos.</p><a class="button-link" href="listaMarcas.php">Ir a marcas</a></section>
                <section id="tipos"><h3>Tipos de equipo</h3><p>Organiza las categorías de equipos que administra la empresa.</p><a class="button-link" href="listaTipo_Equipo.php">Ir a tipos</a></section>
                <section id="roles"><h3>Roles</h3><p>Define los roles y las responsabilidades de los usuarios.</p><a class="button-link" href="listaRoles.php">Ir a roles</a></section>
                <section id="puestos"><h3>Puestos</h3><p>Administra los puestos disponibles para los empleados.</p><a class="button-link" href="listaPuestos.php">Ir a puestos</a></section>
                <section id="empleados"><h3>Empleados</h3><p>Consulta y actualiza la información del personal.</p><a class="button-link" href="listaEmpleados.php">Ir a empleados</a></section>
                <section id="usuarios"><h3>Usuarios</h3><p>Gestiona las cuentas que tienen acceso al sistema.</p><a class="button-link" href="listaUsuarios.php">Ir a usuarios</a></section>
                <section id="equipos"><h3>Equipos</h3><p>Controla el inventario y la asignación de los equipos.</p><a class="button-link" href="listaEquipos.php">Ir a equipos</a></section>
            </div>
        </div>
    </main>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
