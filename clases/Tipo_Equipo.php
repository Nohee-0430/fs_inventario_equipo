<?php 
class Tipo_Equipo {
    private $tipo_id;
    private $nombre;
    private $conexion;
    
    public function setTipoId($tipo_id) { $this->tipo_id = $tipo_id; }
    public function setNombre($nombre) { $this->nombre = $nombre; }
    public function setConexion($conexion) { $this->conexion = $conexion; }
    
    public function insertarTipo_Equipo() {
        try {
            $sql = 'INSERT INTO tipo_equipo(nombre) VALUES (:nombre)';
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':nombre', $this->nombre);
            return $stmt->execute();
        } catch (Throwable $th) {
            return 0;
        }
    }

    public static function obtenerTipo_Equipo($bd) {
        try {
            $sql = "SELECT * FROM tipo_equipo";
            $stmt = $bd->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {            
            echo "Error". $e->getMessage();
        }
    }

    public function actualizarTipo_Equipo() {
        try {
            $sql = 'UPDATE tipo_equipo SET nombre = :nombre WHERE tipo_id = :tipo_id';
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':tipo_id', $this->tipo_id);
            $stmt->bindParam(':nombre', $this->nombre);
            return $stmt->execute();
        } catch (Throwable $th) {
            return 0;
        }
    }

    public function eliminarTipo_Equipo($codigo) {
        try {
            $sql = 'DELETE FROM tipo_equipo WHERE tipo_id = :codigo';
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':codigo', $codigo);
            return $stmt->execute();
        } catch (Throwable $th) {
            return 0;
        }
    }
}
?>
