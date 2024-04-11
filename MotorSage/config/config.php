<?php
define("CLIENT_ID", "AXwAX9KM_ASPG63tcoUhewOiyuoF9r4vtJjVc7yz3MVQ4plE5jjk7wHpuCIqoiGvCsOikVr7qbvrw1ow");
define("CURRENCY", "COP");
define("KEY_TOKEN", "APR.wqc-354*");
define("MONEDA", "$");

session_start();

$num_cart = 0;
if (isset($_SESSION['carrito']['productos'])) {
    $num_cart = count($_SESSION['carrito']['productos']);
}
?>