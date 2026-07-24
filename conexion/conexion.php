<?php
    /*datos del servidor de bases de datos*/
    $host="localhost";
    $base_datos="fs_inventario_equipo";
    $usuario="root";
    $password="";//no tiene contraseña ya que no lo hemos configurado
    try {
        $conexion = new PDO("mysql:host={$host};dbname={$base_datos};charset=utf8",$usuario,$password);
        //$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $th) {
        die("Error en conexión". $th->getMessage());
    }

?>