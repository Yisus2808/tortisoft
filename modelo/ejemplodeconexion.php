<?php
// requerir la conexion
    require_once "core/conexion.php";
    class LogModelo extends Conexion {
        // creamos la función que recoge el arreglo enviado
        public function guardar_log_modelo($logArray) {

            // echo '<script>alert("'.$logArray['tipo'].'")</script>';

            // instanciamos la clase de la conexion y hacemos la consulta
            $pdo = new Conexion;
            $consulta = $pdo -> conectar()->prepare("INSERT INTO logs (tipo_error, mensaje, fecha_error, hora_error, lugar, usuario) values (:ti, :ms, :fe, :ho, :lu, :us)");
            
            // Rescatamos los datos del arreglo enviado
            $consulta->bindParam(":ti", $logArray['tipo'], PDO::PARAM_STR);
            $consulta->bindParam(":ms", $logArray['mensaje'], PDO::PARAM_STR);
            $consulta->bindParam(":fe", $logArray['fecha'], PDO::PARAM_STR);
            $consulta->bindParam(":ho", $logArray['hora'], PDO::PARAM_STR);
            $consulta->bindParam(":lu", $logArray['lugar'], PDO::PARAM_STR);
            $consulta->bindParam(":us", $logArray['usuario'], PDO::PARAM_STR);

            // echo '<script>alert("'.$consulta->execute().'")</script>';

            // verificamos que la consulta se haya hecho correctamente
            if($consulta->execute() == 1) {
                error_log("Se guardo el log del modelo!", 3, "log_del_log.txt");
                return 'ok';
            } else {
                error_log("¡Error en el log modelo!", 3, "log_del_log.txt");
                return 'error';
            }
        }
    }

?>