<?php 
require_once "core/conexion.php"; 
class M_registrarse extends Conexion{

    // Funcion par validar si el correo ya esta registrado
    static public function correoExistente($datosModelo, $tabla)
    {

        // Realizamos la consulta
        $consulta = Conexion::conectar()->prepare("SELECT correo FROM $tabla WHERE correo = :cor");
        // bindparam del dato a enviar en la consulta
        $consulta->bindParam(":cor", $datosModelo["correo"], PDO::PARAM_STR);
        // Conocer la respuesta de la consulta, si los datos son mayores a 0, hay un registro
        if($consulta->execute() && $consulta->rowCount()>0){
            return 'registrado';
        }
        else{
            return 'no_registrado';
        }
    }

    // Funcion para registrarse
    static public function registrarse($datosModelo, $tabla)
    {   
        // tenemos la hora de nuestra zona horaria
        date_default_timezone_set("America/Mazatlan");
        // Obtenemos la hora
        $hora = date("H:i:s");
        // Obtenemos la fecha
        $fecha = date("Y-m-d");

        // Creamos la consulta
        $consulta = Conexion::conectar()->prepare("INSERT INTO $tabla (correo, clave, hora_registro, fecha_registro) VALUES (:cor, :pass, :hor, :fec);");

        // bindparam de los datos a enviar
        $consulta->bindParam(":cor", $datosModelo["correo"], PDO::PARAM_STR);
        $consulta->bindParam(":pass", $datosModelo["contrasenia"], PDO::PARAM_STR);
        $consulta->bindParam(":hor", $hora, PDO::PARAM_STR);
        $consulta->bindParam(":fec", $fecha, PDO::PARAM_STR);
        
        // respuesta de la ejecución de la consulta
        if($consulta->execute()){
            return 'ok';
        }
        else{
            return 'error';
        }
    }
}

?>