<?php 
class Empleados {
    private $empleado_id;
    private $nombre;
    private $apellido;
    private $telefono;
    private $puesto_id;
    private $fecha_nacimiento;
    private $conexion;
    
    public function setEmpleadoId($empleado_id) { $this->empleado_id = $empleado_id; }
    public function setNombre($nombre) { $this->nombre = $nombre; }
    public function setApellido($apellido) { $this->apellido = $apellido; }
    public function setTelefono($telefono) { $this->telefono = $telefono; }
    public function setPuestoId($puesto_id) { $this->puesto_id = $puesto_id; }
    public function setFechaNacimiento($fecha_nacimiento) { $this->fecha_nacimiento = $fecha_nacimiento; }
    public function setConexion($conexion) { $this->conexion = $conexion; }
    
    public function insertarEmpleado() {
        try {
            $sql = 'INSERT INTO empleados(nombre, apellido, telefono, puesto_id, fecha_nacimiento) VALUES (:nombre, :apellido, :telefono, :puesto_id, :fecha_nacimiento)';
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':nombre', $this->nombre);
            $stmt->bindParam(':apellido', $this->apellido);
            $stmt->bindParam(':telefono', $this->telefono);
            $stmt->bindParam(':puesto_id', $this->puesto_id);
            $stmt->bindParam(':fecha_nacimiento', $this->fecha_nacimiento);
            return $stmt->execute();
        } catch (Throwable $th) {
            return 0;
        }
    }

    public static function obtenerEmpleados($bd) {
        try {
            $sql = "SELECT * FROM empleados";
            $stmt = $bd->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {            
            echo "Error". $e->getMessage();
        }
    }

    public function actualizarEmpleado() {
        try {
            $sql = 'UPDATE empleados SET nombre = :nombre, apellido = :apellido, telefono = :telefono, puesto_id = :puesto_id, fecha_nacimiento = :fecha_nacimiento WHERE empleado_id = :empleado_id';
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':empleado_id', $this->empleado_id);
            $stmt->bindParam(':nombre', $this->nombre);
            $stmt->bindParam(':apellido', $this->apellido);
            $stmt->bindParam(':telefono', $this->telefono);
            $stmt->bindParam(':puesto_id', $this->puesto_id);
            $stmt->bindParam(':fecha_nacimiento', $this->fecha_nacimiento);
            return $stmt->execute();
        } catch (Throwable $th) {
            return 0;
        }
    }

    public function eliminarEmpleado($codigo) {
        try {
            $sql = 'DELETE FROM empleados WHERE empleado_id = :codigo';
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':codigo', $codigo);
            return $stmt->execute();
        } catch (Throwable $th) {
            return 0;
        }
    }
}
?>
