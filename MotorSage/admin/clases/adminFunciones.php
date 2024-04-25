<?php
function esNulo(array $parametos)
{
    foreach ($parametos as $parameto) {
        if (strlen(trim($parameto)) < 1) {
            return true;
        }
    }
    return false;
}

function login($usuario, $password, $conexion)
{
    $query="SELECT id, usuario,password,nombre FROM admin WHERE usuario LIKE '$usuario'
    AND activo = 1 LIMIT 1";
    $result=mysqli_query($conexion, $query);
    if (mysqli_num_rows($result)==1) {
            $usuario=mysqli_fetch_assoc($result);
            if ($password== $usuario['password']) {
                $_SESSION['user_id'] = $usuario['id'];
                $_SESSION['user_name'] = $usuario['nombre'];
                $_SESSION['user_type'] = 'admin';
                header('Location: inicio.php');
                exit;
            }
    }
    return 'El usuario y/o contraseña son incorrectos.';
}

function mostrarMensajes(array $errors)
{
    if (count($errors)> 0) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"><ul>';
        foreach ($errors as $error) {
            echo '<li>' . $error . '</li>';
        }
        echo '<ul>';
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert"
        aria-label="Close"></button></div>';
    }
}

?>