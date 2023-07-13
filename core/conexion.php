<?php
// clase de conexión
    class Conexion
    {   
        // funcion conectar
        static public function conectar()
        {
            $contrasenia = "yisus";
            $usuario = "postgres";
            $nombreBaseDatos = "tortisoft";
            # Puede ser 127.0.0.1 o el nombre de tu equipo; o la IP de un servidor remoto
            $rutaServidor = "127.0.0.1";
            $puerto = "5432";

            try{
                // hacemos una conexion pdo a postgres
                $base_de_datos = new PDO("pgsql:host=$rutaServidor;port=$puerto;dbname=$nombreBaseDatos", $usuario, $contrasenia);
                $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $base_de_datos;
            }catch(PDOExection $e) {
                echo "Error...".$e->getMessage();
            }

        }
    }
?>