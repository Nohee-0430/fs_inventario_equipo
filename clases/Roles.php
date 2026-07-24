<?php 
class Roles {
    private $rol_id;
    private $nombre;
    private $descripcion;
    private $conexion;
    
    public function setRolId($rol_id) { $this->rol_id = $rol_id; }
    public function setNombre($nombre) { $this->nombre = $nombre; }
    public function setDescripcion($descripcion) { $this->descripcion = $descripcion; }
    public function setConexion($conexion) { $this->conexion = $conexion; }
    
    public function insertarRol() {
        try {
            $sql = 'INSERT INTO roles(nombre, descripcion) VALUES (:nombre, :descripcion)';
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':nombre', $this->nombre);
            $stmt->bindParam(':descripcion', $this->descripcion);
            return $stmt->execute();
        } catch (Throwable $th) {
            return 0;
        }
    }

    public static function obtenerRoles($bd) {
        try {
            $sql = "SELECT * FROM roles";
            $stmt = $bd->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {            
            echo "Error". $e->getMessage();
        }
    }

    public function actualizarRol() {
        try {
            $sql = 'UPDATE roles SET nombre = :nombre, descripcion = :descripcion WHERE rol_id = :rol_id';
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':rol_id', $this->rol_id);
            $stmt->bindParam(':nombre', $this->nombre);
            $stmt->bindParam(':descripcion', $this->descripcion);
            return $stmt->execute();
        } catch (Throwable $th) {
            return 0;
        }
    }

    public function eliminarRol($codigo) {
        try {
            $sql = 'DELETE FROM roles WHERE rol_id = :codigo';
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':codigo', $codigo);
            return $stmt->execute();
        } catch (Throwable $th) {
            return 0;
        }
    }
}
?>
