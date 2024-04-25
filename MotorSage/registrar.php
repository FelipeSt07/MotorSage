<?php

    include("config/conexion.php");
    $conexion = conectar();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cedula = $_POST['identificacion'];
    $fecha = $_POST['fechanac'];
    $telefono = $_POST['telefono'];
    $usuario = $_POST['usuario'];
    $correo = $_POST['correo'];
    $confcorreo = $_POST['confcorreo'];
    $clave = md5($_POST['clave']);
    $confclave = md5($_POST['confclave']);

    }
    if($correo!=$confcorreo){
        
        $mensaje = "<div>
        <p>hola mundo</p>
        </div>";
        exit();
    }else{
        if($clave!=$confclave){
            echo'
            <script>
                alert("las contraseñas no coinciden"); 
            </script>';
            exit();
        }
    }


    $sql="INSERT INTO `usuarioreg`(cedula,nombre,apellido,fechanac,usuario,telefono,email,clave)
     VALUES('$cedula','$nombre','$apellido','$fecha','$usuario','$telefono','$correo','$clave')";
     //verificar qwue la identificacion no se encuentre en la base de datos
     $verificar_id = mysqli_query($conexion,"SELECT * FROM `usuarioreg` WHERE cedula='$cedula'");
     if(mysqli_num_rows($verificar_id)>0){
        echo'
        <script>
            window.location = "index.html";   
            alert("ya existe un usuario con esta identificacion, por favor intenta con otra identificación"); 
        </script>';
       exit();
     }
     $ejecutar = mysqli_query($conexion,$sql);

    if($ejecutar){
        header("location: index.php");
        
        
    }else{
        header("location: FormLogin.php");
    }
    mysqli_close($conexion);
?>