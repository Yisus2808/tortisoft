<?php
// requerir la cónexion
require_once "core/conexion.php";
// clase principal de la verificación del código
class M_verificacion extends Conexion{
    // función para obtener el codigo
    static public function obtenerCodigo($email, $tabla)
    {
        // consulta a bd
        $consulta = Conexion::conectar()->prepare("SELECT codigo FROM $tabla, acceso
        WHERE correo = :ema AND $tabla.accesoid = acceso.accesoid ORDER BY (fecha_creacion, hora_creacion) DESC LIMIT 1");

        // bindparam de los datos de la consulta
        $consulta->bindParam(":ema", $email, PDO::PARAM_STR);
        
        //ejecutamos la consulta
        $consulta->execute();

        //retornamos los valores obtenidos
        return $consulta->fetch();
    }
}

?>