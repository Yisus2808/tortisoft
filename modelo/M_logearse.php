<?php
// Requerimos la conexion
require_once "core/conexion.php";  

// creamos nuestra clase principal, con la estancia de la conexion
class M_logearse extends Conexion{
    static public function logearse($datosModelo, $tabla)
    {
        // Creamos la variable consulata, para usar nuesta conexion
        $consulta = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE correo = :cor AND clave = :pass");

        // obtenemos los parametros del arreglo enviado
        $consulta->bindParam(":cor", $datosModelo["correo"], PDO::PARAM_STR);
        $consulta->bindParam(":pass", $datosModelo["contrasenia"], PDO::PARAM_STR);
        
        // Validamos la consulta
        if($consulta->execute() && $consulta->rowCount()>0){
            return 'ok';
        }
        else{
            return 'error';
        }
    }
}
?>