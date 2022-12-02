<?php
require_once 'Conexion.php';
class Usuario {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function guardar() {
        $sql = "INSERT INTO usuario (nombre, apellido, email, contrasena) VALUES ('{$this->nombre}', '{$this->apellido}', '{$this->email}', '{$this->contrasena}')";
        $this->conexion->consulta($sql);
    }

    public function actualizar() {
        $sql = "UPDATE usuario SET nombre = '{$this->nombre}', apellido = '{$this->apellido}', email = '{$this->email}', contrasena = '{$this->contrasena}' WHERE id = {$this->id}";
        $this->conexion->consulta($sql);
    }

    public function eliminar() {
        $sql = "DELETE FROM usuario WHERE id = {$this->id}";
        $this->conexion->consulta($sql);
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM usuario WHERE id = {$id}";
        $resultado = $this->conexion->consulta($sql);
        $fila = $resultado->fetch(PDO::FETCH_ASSOC);
        return $fila;
    }

    public function verUusarios() {
        $sql = "SELECT * FROM usuario";
        $resultado = $this->conexion->consulta($sql);
        $usuarios = $resultado->fetchAll(PDO::FETCH_ASSOC);
        return $usuarios;
    }

    public function modificarUsuario($id, $datos) {
        $sql = "UPDATE usuario SET nombre = '{$datos['nombre']}', apellido = '{$datos['apellido']}', email = '{$datos['email']}', contrasena = '{$datos['contrasena']}' WHERE id = {$id}";
        $this->conexion->consulta($sql);
    }
}

?>