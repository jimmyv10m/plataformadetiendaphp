<?php
class conexion{

    private $servidor="localhost";
    private $usuario="root";
    private $contrasenia="";
    private $conexion;

    public function __construct(){
        try {
            $this->conexion=new PDO("mysql:host=$this->servidor;dbname=aplicacion1php",$this->usuario,$this->contrasenia);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            return "falla de conexion".$e;
        }
    }

    public function ejecutar($sql){#insert/delete/actualizar
        $this->conexion->exec($sql);#ejecuta la consulta sql
        return $this->conexion->lastInsertId();#devueve el id insertado
    }

    public function consultar($sql){
        $sentencia=$this->conexion->prepare($sql);#se consulta los datos
        $sentencia->execute();
        return $sentencia->fetchAll();
    }
}
?>
