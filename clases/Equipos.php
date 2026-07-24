<?php 
class Equipos {
    private $equipo_id;
    private $no_serie;
    private $marca_id;
    private $descripcion;
    private $fecha_compra;
    private $precio;
    private $tipo_id;
    private $empleado_id;
    private $conexion;
    
    public function setEquipoId($equipo_id) { $this->equipo_id = $equipo_id; }
    public function setNoSerie($no_serie) { $this->no_serie = $no_serie; }
    public function setMarcaId($marca_id) { $this->marca_id = $marca_id; }
    public function setDescripcion($descripcion) { $this->descripcion = $descripcion; }
    public function setFechaCompra($fecha_compra) { $this->fecha_compra = $fecha_compra; }
    public function setPrecio($precio) { $this->precio = $precio; }
    public function setTipoId($tipo_id) { $this->tipo_id = $tipo_id; }
    public function setEmpleadoId($empleado_id) { $this->empleado_id = $empleado_id; }
    public function setConexion($conexion) { $this->conexion = $conexion; }
    
    public function insertarEquipo() {
        try {
            $sql = 'INSERT INTO equipos(no_serie, marca_id, descripcion, fecha_compra, precio, tipo_id, empleado_id) VALUES (:no_serie, :marca_id, :descripcion, :fecha_compra, :precio, :tipo_id, :empleado_id)';
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':no_serie', $this->no_serie);
            $stmt->bindParam(':marca_id', $this->marca_id);
            $stmt->bindParam(':descripcion', $this->descripcion);
            $stmt->bindParam(':fecha_compra', $this->fecha_compra);
            $stmt->bindParam(':precio', $this->precio);
            $stmt->bindParam(':tipo_id', $this->tipo_id);
            $stmt->bindParam(':empleado_id', $this->empleado_id);
            return $stmt->execute();
        } catch (Throwable $th) {
            return 0;
        }
    }

    public static function obtenerEquipos($bd) {
        try {
            $sql = "SELECT * FROM equipos";
            $stmt = $bd->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {            
            echo "Error". $e->getMessage();
        }
    }

    public function actualizarEquipo() {
        try {
            $sql = 'UPDATE equipos SET no_serie = :no_serie, marca_id = :marca_id, descripcion = :descripcion, fecha_compra = :fecha_compra, precio = :precio, tipo_id = :tipo_id, empleado_id = :empleado_id WHERE equipo_id = :equipo_id';
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':equipo_id', $this->equipo_id);
            $stmt->bindParam(':no_serie', $this->no_serie);
            $stmt->bindParam(':marca_id', $this->marca_id);
            $stmt->bindParam(':descripcion', $this->descripcion);
            $stmt->bindParam(':fecha_compra', $this->fecha_compra);
            $stmt->bindParam(':precio', $this->precio);
            $stmt->bindParam(':tipo_id', $this->tipo_id);
            $stmt->bindParam(':empleado_id', $this->empleado_id);
            return $stmt->execute();
        } catch (Throwable $th) {
            return 0;
        }
    }

    public function eliminarEquipo($codigo) {
        try {
            $sql = 'DELETE FROM equipos WHERE equipo_id = :codigo';
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':codigo', $codigo);
            return $stmt->execute();
        } catch (Throwable $th) {
            return 0;
        }
    }
}
?>
