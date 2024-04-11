<?php 
session_start();

include("config/conexion.php");
$conexion = conectar();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //obtencion de datos
    $username = $_POST['usuario'];
    $password = md5($_POST['password']);

    //buscar el usuario en la base de datos
    $query = "SELECT * FROM `usuarioreg` WHERE `usuario`='$username' and `clave`='$password'";
    $result = mysqli_query($conexion, $query);

    if (mysqli_num_rows($result) == 1) {
        //verificar contraseña
        $usuario = mysqli_fetch_assoc($result);
        if ($password == $usuario['clave']) {
            //Iniciar sesion
            $_SESSION['username'] = $username;
            header("location: productos.php");
            exit;
        }
    }else {
        header("location: login.php");
    }
}

mysqli_close($conexion);

?>