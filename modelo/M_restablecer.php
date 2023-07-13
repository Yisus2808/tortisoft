<?php
// llamar a la conexión
require_once "core/conexion.php";
// Clase principal
class M_restablecer extends Conexion {
    // función para obtener los datos del usuario
    static public function obtenerDatos($datoCorreo, $tabla)
    {
        // consultar a la bd
        $consulta = Conexion::conectar()->prepare("SELECT accesoId, correo FROM $tabla WHERE correo = :cor");

        // bindparam de los datos
        $consulta->bindParam(":cor", $datoCorreo['correo'], PDO::PARAM_STR);
        
        //ejecutamos la consulta
        $consulta->execute();

        //retornamos los valores obtenidos
        return $consulta->fetch();
    }

    // Función para guardar el código
    static public function registrarCodigo($pk, $codigo, $tabla)
    {
        // obtengo mi zona horaria
        date_default_timezone_set("America/Mazatlan");
        // guardo la hora en una variable
        $hora = date("H:i:s");
        // guardo la fecha en una variable
        $fecha = date("Y-m-d");

        // hago la consulta
        $consulta = Conexion::conectar()->prepare("INSERT INTO $tabla (codigo, fecha_creacion, hora_creacion, accesoid) VALUES (:cod, :fe, :hor, :fk);");

        // hago un bindparam de los datos de la consulta
        $consulta->bindParam(":cod", $codigo, PDO::PARAM_STR);
        $consulta->bindParam(":fk", $pk, PDO::PARAM_STR);
        $consulta->bindParam(":hor", $hora, PDO::PARAM_STR);
        $consulta->bindParam(":fe", $fecha, PDO::PARAM_STR);
        
        if($consulta->execute()){
            return 'ok';
        }
        else{
            return 'error';
        }
    }
}
?>