<?php
    function conectar() {
        $hostname = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'db_barberia';

        $conexion = mysqli_connect($hostname,$username,$password,$database);
        if($conexion->connect_error) {
            die("Error al conectar la base de datos de la pagina".$conexion->connect_error);
        }
        return $conexion;
    }

    
?>