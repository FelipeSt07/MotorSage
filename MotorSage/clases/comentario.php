<?php

    require '../config/config.php';

    if(isset($_POST['id'])){

        $id = $_POST['id'];
        $comentario = isset($_POST['comentario']) ? $_POST['comentario'] :1;
        $token = $_POST['token'];

        $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);

    if ($token == $token_tmp && $comentario > 0 && is_numeric($comentario)) {

        if (isset($_SESSION['carrito']['productos'][$id])) {
            $_SESSION['carrito']['productos'][$id] += $comentario;
        } else {
            $_SESSION['carrito']['productos'][$id] = $comentario;
        }

        $datos['numero'] = count($_SESSION['carrito']['productos']);
        $datos['ok'] =true;

    } else {
        $datos['ok'] =false;
    }

    }else {
        $datos['ok'] = false;
    }

    echo json_encode($datos);

?>