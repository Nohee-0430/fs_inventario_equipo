<?php 
class Puestos {
    private $puesto_id;
    private $puesto;
    private $conexion;
    
    public function setPuestoId($puesto_id) { $this->puesto_id = $puesto_id; }
    public function setPuesto($puesto) { $this->puesto = $puesto; }
    public function setConexion($conexion) { $this->conexion = $conexion; }
    
    public function insertarPuesto() {
        try {
            $sql = 'INSERT INTO puestos(puesto) VALUES (:puesto)';
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':puesto', $this->puesto);
            return $stmt->execute();
        } catch (Throwable $th) {
            return 0;
        }
    }

    public static function obtenerPuestos($bd) {
        try {
            $sql = "SELECT * FROM puestos";
            $stmt = $bd->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {            
            echo "Error". $e->getMessage();
        }
    }

    public function actualizarPuesto() {
        try {
            $sql = 'UPDATE puestos SET puesto = :puesto WHERE puesto_id = :puesto_id';
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':puesto_id', $this->puesto_id);
            $stmt->bindParam(':puesto', $this->puesto);
            return $stmt->execute();
        } catch (Throwable $th) {
            return 0;
        }
    }

    public function eliminarPuesto($codigo) {
        try {
            $sql = 'DELETE FROM puestos WHERE puesto_id = :codigo';
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':codigo', $codigo);
            return $stmt->execute();
        } catch (Throwable $th) {
            return 0;
        }
    }
}
?>
