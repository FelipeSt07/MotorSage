<?php
// Inicia la sesión si no está iniciada
if (session_status() === PHP_SESSION_NONE) {
    @session_start();
}

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['username'])) {
    // Si no ha iniciado sesión, redirige a la página de inicio de sesión
    header("Location: login.php");
    exit; // Detiene la ejecución del script después de redirigir
}
// require ('config/config.php');
include ("config/conexion.php");
$conexion = conectar();

$query = "SELECT idproducto, nombre, precio FROM `producto` WHERE estado=1";
$result = mysqli_query($conexion, $query);


// Verificar si se ha enviado el formulario para eliminar la preferencia
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['preferencia_id'])) {
    // Obtener el ID de la preferencia a eliminar
    $preferencia_id = $_POST['preferencia_id'];

    // Aquí debes realizar el proceso para eliminar la preferencia de acuerdo a tu lógica de aplicación
    // Por ejemplo, podrías eliminar la preferencia de la sesión o de la base de datos si estás utilizando una

    // Redirigir nuevamente a la página de preferencias para que se actualice la vista
    header("Location: preferencias.php");
    exit;
}
?>
<?php

// Verificar si se recibieron los parámetros del producto desde la URL
if (isset($_GET['idproducto']) && isset($_GET['nombre']) && isset($_GET['precio']) && isset($_GET['imagen'])) {
    // Guardar la información del producto en variables de sesión
    $_SESSION['preferencia_idproducto'] = $_GET['idproducto'];
    $_SESSION['preferencia_nombre'] = $_GET['nombre'];
    $_SESSION['preferencia_precio'] = $_GET['precio'];
    $_SESSION['preferencia_imagen'] = $_GET['imagen'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="preferencias.css">
    <link rel="shortcut icon" href="imagenes/moto.png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>PREFERENCIAS | Motor SAGE</title>
</head>

<body>
    <div class="bodycolor">
        <header class="header">

            <div class="menu">

                <div class="left">
                    <div class="btn-departamentos" id="btn-departamentos">
                        <div class="boton">
                            <a id="oculto_b" href=""><i class="fa-solid fa-bars"></i></a>
                        </div>
                    </div>

                    <div class="logo">
                        <a href="index.php">
                            <img src="imagenes/logo7c.png" alt="">
                        </a>

                    </div>
                </div>


                <div class="nav_p" id="nav_p_oculto">
                    <div class="div barra">
                        <?php if (isset($_SESSION['username'])) { ?>

                            <div class="dropdown">
                                <button class="btn btn-sm " type="button" id="btn_session" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <a href="#" id="oculto"><i class="fa-regular fa-circle-user"></i>
                                        <?php echo $_SESSION['username']; ?>
                                    </a>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="btn_session">
                                    <li><a class="dropdown-item" href="logout.php">Cerrar sesión</a></li>
                                </ul>
                            </div>

                        <?php } else { ?>
                            <a href="login.php" id="oculto"><i class="fa-regular fa-circle-user"></i>Iniciar Sesion</a>
                        <?php } ?>
                    </div>
                    <div class="div barra">
                        <a href="productos.php" id="oculto"><i class="fa-solid fa-motorcycle"></i>Productos</a>
                    </div>
                    <div class="div barra">
                        <a href="pqr.php" id="oculto"><i class="fa-regular fa-comments"></i>PQRS</a>
                    </div>

                </div>
            </div>

            <div class="contenedor contenedor-grid">
                <div class="grid" id="grid">
                    <div class="categorias">
                        <a id="oculto_a" href="FormLogin.php">Iniciar Sesion</a>
                        <a id="oculto_a" href="productos.php">Productos</a>
                        <a id="oculto_a" href="servicios.php">Servicios</a>
                    </div>
                </div>
            </div>

        </header>


        <section class="text">
            <h1 id="">PREFERENCIAS</h1>
            <p>Descubre tu pasión por las motocicletas con nosotros. </p>
            <p>Aquí, nos dedicamos a entender tus preferencias</p>
            <p> hacer que tu experiencia sea única.</p>
            <p>Tu opinión es fundamental y nos esforzamos por ofrecerte lo mejor.</p>

        </section>

        <!--Contenido-->
        <main>
            <div class="content">
                <div class="container d-flex justify-content-center">
                    <div class="row">
                        <div class="col text-center">
                            <div class="card shadow-sm">
                                <img class="img-col" src="<?php echo $_SESSION['preferencia_imagen']; ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $_SESSION['preferencia_nombre']; ?></h5>
                                    <p class="card-text"><?php echo $_SESSION['preferencia_precio']; ?></p>
                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                        <!-- Agregar un campo oculto para enviar el ID de la preferencia -->
                                        <input type="hidden" name="preferencia_id"
                                            value="<?php echo $_SESSION['preferencia_id']; ?>">
                                        <button type="submit" class="btn btn-danger">Eliminar preferencia</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <br><br><br>

        </main>


        <footer>
            <div class="cont-footer">

                <div class="colum-footer">
                    <h3>Contactos</h3><br>
                    <p>Pasto, Nariño, Colombia</p>
                    <div class="foo">
                        <i class="fa-solid fa-phone"></i>
                        <p>+57 3224823651</p>
                    </div>
                    <div class="foo">
                        <i class="fa-solid fa-envelope"></i>
                        <p>jhquebendicion@gmail.com</p>
                    </div>

                </div>
                <div class="colum-footer">
                    <h3>Menu</h3><br>
                    <a href="#">Productos</a><br>
                    <a href="#">Servicios</a><br>
                    <a href="#">Iniciar Sesion</a>

                </div>
                <div id="none" class="colum-footer">
                    <br>
                    <br>
                    <a href="index.html">Ir al comienzo</a>
                    <i class="fa-solid fa-arrow-up"></i><br>
                    <p>&copy; Copyright 2024.</p>
                    <br>
                    <br>
                </div>


            </div>
        </footer>


        <script src="https://kit.fontawesome.com/7a4ffadb8c.js" crossorigin="anonymous"></script>
        <script src="js/main.js"></script>
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>

    </div>

</body>

</html>