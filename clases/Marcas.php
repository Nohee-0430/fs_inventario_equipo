<?php 
class Marcas {
    private $marca_id;
    private $marca;
    private $conexion;
    
    public function setMarcaId($marca_id) { $this->marca_id = $marca_id; }
    public function setMarca($marca) { $this->marca = $marca; }
    public function setConexion($conexion) { $this->conexion = $conexion; }
    
    public function insertarMarca() {
        try {
            $sql = 'INSERT INTO marcas(marca) VALUES (:marca)';
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':marca', $this->marca);
            return $stmt->execute();
        } catch (Throwable $th) {
            return 0;
        }
    }

    public static function obtenerMarcas($bd) {
        try {
            $sql = "SELECT * FROM marcas";
            $stmt = $bd->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {            
            echo "Error en la obtención de marcas". $e->getMessage();
        }
    }

    public function actualizarMarca() {
        try {
            $sql = 'UPDATE marcas SET marca = :marca WHERE marca_id = :marca_id';
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':marca_id', $this->marca_id);
            $stmt->bindParam(':marca', $this->marca);
            return $stmt->execute();
        } catch (Throwable $th) {
            return 0;
        }
    }

    public function eliminarMarca($codigo) {
        try {
            $sql = 'DELETE FROM marcas WHERE marca_id = :codigo';
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':codigo', $codigo);
            return $stmt->execute();
        } catch (Throwable $th) {
            return 0;
        }
    }
}
?>
