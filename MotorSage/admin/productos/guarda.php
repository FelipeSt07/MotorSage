<?php

include ("../config/conexion.php");
include ("../config/config.php");


if (!isset($_SESSION['user_type'])) {
    header('Location: ../index.php');
    exit;
}

if ($_SESSION['user_type'] != 'admin') {
    header('Location: ../../index.php');
    exit;
}
$conexion = conectar();

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$descuento = $_POST['descuento'];

$sql = "INSERT INTO producto (nombre, descripcion, precio, descuento)
VALUES('$nombre','$descripcion',$precio,$descuento)";
$result=mysqli_query($conexion, $sql);

if ($result) {
    $query = "SELECT idproducto FROM producto WHERE nombre LIKE '$nombre'
    AND precio=$precio";
    $result2 = mysqli_query($conexion, $query);
    $id= mysqli_fetch_assoc($result2);

    if ($_FILES['imagen_principal']['error']== UPLOAD_ERR_OK) {
        $dir = '../../imagenes/productos/' . $id['idproducto'] . '/';
        $permitidos = ['jpeg','jpg','png'];

        $arregloImagen = explode('.', $_FILES['imagen_principal']['name']); 
        $extension = strtolower(end($arregloImagen));
        
        if (in_array($extension, $permitidos)) {
            if(!file_exists($dir)){
                mkdir($dir, 0777, true);
            }
            $ruta_img = $dir . 'principal.' . $extension;
            if (move_uploaded_file($_FILES['imagen_principal']['tmp_name'],$ruta_img)) {
                echo "El archivo se cargó correctamente.";
            } else {
                echo "Error al cargar el archivo.";
            }
        }else {
            echo "Archivo no permitido";
        }
    }else {
        echo "No enviaste archivo";
    }

}

//header('Location: index.php');
?>