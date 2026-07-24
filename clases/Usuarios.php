<?php 
class Usuarios {
    private $usuario_id;
    private $usuario;
    private $email;
    private $contrasenia;
    private $estado;
    private $rol_id;
    private $conexion;
    
    public function setUsuarioId($usuario_id) { $this->usuario_id = $usuario_id; }
    public function setUsuario($usuario) { $this->usuario = $usuario; }
    public function setEmail($email) { $this->email = $email; }
    public function setContrasenia($contrasenia) { $this->contrasenia = $contrasenia; }
    public function setEstado($estado) { $this->estado = $estado; }
    public function setRolId($rol_id) { $this->rol_id = $rol_id; }
    public function setConexion($conexion) { $this->conexion = $conexion; }
    
    public function insertarUsuario() {
        try {
            $sql = 'INSERT INTO usuarios(usuario, email, contrasenia, estado, rol_id) VALUES (:usuario, :email, :contrasenia, :estado, :rol_id)';
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':usuario', $this->usuario);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':contrasenia', $this->contrasenia);
            $stmt->bindParam(':estado', $this->estado);
            $stmt->bindParam(':rol_id', $this->rol_id);
            return $stmt->execute();
        } catch (Throwable $th) {
            return 0;
        }
    }

    public static function obtenerUsuarios($bd) {
        try {
            $sql = "SELECT * FROM usuarios";
            $stmt = $bd->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {            
            echo "Error". $e->getMessage();
        }
    }

    public function actualizarUsuario() {
        try {
            $sql = 'UPDATE usuarios SET usuario = :usuario, email = :email, contrasenia = :contrasenia, estado = :estado, rol_id = :rol_id WHERE usuario_id = :usuario_id';
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':usuario_id', $this->usuario_id);
            $stmt->bindParam(':usuario', $this->usuario);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':contrasenia', $this->contrasenia);
            $stmt->bindParam(':estado', $this->estado);
            $stmt->bindParam(':rol_id', $this->rol_id);
            return $stmt->execute();
        } catch (Throwable $th) {
            return 0;
        }
    }

    public function eliminarUsuario($codigo) {
        try {
            $sql = 'DELETE FROM usuarios WHERE usuario_id = :codigo';
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':codigo', $codigo);
            return $stmt->execute();
        } catch (Throwable $th) {
            return 0;
        }
    }
}
?>
