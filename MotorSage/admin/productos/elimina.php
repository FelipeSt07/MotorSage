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

$id = $_POST['id'];

$sql = "UPDATE producto SET estado=0 WHERE idproducto='$id'";
$result = mysqli_query($conexion, $sql);

header('Location: index.php');
?>