<?php
// requerimos la cónexion
require_once "core/conexion.php";
// clase principal
class M_actualizarPass extends Conexion {
    // función para actualizar
    static public function actualizarPass($email,$datosModelo, $tabla)
    {
        // consulta a realizar a la bd
        $consulta = Conexion::conectar()->prepare("UPDATE $tabla SET clave = :pass WHERE correo = :cor");

        // datos del bindparam del array
        $consulta->bindParam(":cor", $email, PDO::PARAM_STR);
        $consulta->bindParam(":pass", $datosModelo["Vcontrasenia"], PDO::PARAM_STR);
        
        // verificar la ejecución de la consulta
        if($consulta->execute() && $consulta->rowCount()>0){
            return 'ok';
        }
        else{
            return 'error';
        }
    }
}

?>