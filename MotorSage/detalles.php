<?php

include ('config/config.php');
include ('config/conexion.php');
$conexion = conectar();

$id = isset($_GET['id']) ? $_GET['id'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';

if ($id == '' || $token == '') {
    echo 'Error al procesar la petición';
    exit;
} else {
    $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);

    if ($token == $token_tmp) {

        $query = "SELECT count(idproducto) FROM `producto` WHERE idproducto='$id' AND estado=1";
        $result = mysqli_query($conexion, $query);
        if (mysqli_num_rows($result) > 0) {
            $query = "SELECT nombre, descripcion, precio, descuento FROM `producto` WHERE idproducto='$id' AND estado=1
            LIMIT 1";
            $result = mysqli_query($conexion, $query);
            $row = mysqli_fetch_assoc($result);
            $nombre = $row['nombre'];
            $descripcion = $row['descripcion'];
            $precio = $row['precio'];
            $descuento = $row['descuento'];
            $precio_desc = $precio - (($precio * $descuento) / 100);
            $dir_images = 'imagenes/productos/' . $id . '/';

            $rutaImg = $dir_images . 'principal.png';

            if (!file_exists($rutaImg)) {
                $rutaImg = 'imagenes/no-photo.jpg';
            }

            $images = array();
            if (file_exists($dir_images)) {
                $dir = dir($dir_images);

                while (($archivo = $dir->read()) != false) {
                    if ($archivo != 'principal.png' && (strpos($archivo, 'jpg')) || (strpos($archivo, 'png'))) {
                        $images[] = $dir_images . $archivo;
                    }
                }
                $dir->close();
            }
        } else {
            echo 'Error al procesar la petición';
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="detalles.css">
    <link rel="shortcut icon" href="imagenes/moto.png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Detalles | Motor SAGE</title>
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
                        <a id="oculto_a" href="login.php">Iniciar Sesion</a>
                        <a id="oculto_a" href="productos.php">Productos</a>
                        <a id="oculto_a" href="servicios.php">Servicios</a>
                    </div>
                </div>
            </div>

        </header>

        <section class="text">
            <h1 id="titulo">PRODUCTOS</h1>
            <!-- <p>Lograr que usted viva una experiencia desde su</p>
        <p>llegada hasta que se retira de nuestra Barbería,</p>
        <p>es nuestro compromiso y objetivo.</p> -->
        </section>

        <!--Contenido-->
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 order-md-1">

                        <div id="carouselImages" class="carousel slide">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img id="imagen_a" src="<?php echo $rutaImg ?>">
                                </div>

                                <?php foreach ($images as $imagen) { ?>
                                    <div class="carousel-item">
                                        <img id="imagen_a" src="<?php echo $imagen ?>">
                                    </div>
                                <?php } ?>

                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselImages"
                                data-bs-slide="prev">
                                <span id="control" class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span id="control" class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselImages"
                                data-bs-slide="next">
                                <span id="control" class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span id="control" class="visually-hidden">Next</span>
                            </button>
                        </div>


                    </div>
                    <div class="col-md-6 order-md-2">
                        <h2>
                            <?php echo $nombre; ?>
                        </h2>
                        <h2>
                            <?php echo MONEDA . number_format($precio, 2, '.', ','); ?><strong> Antes</strong>
                        </h2>
                        <h1>
                            <?php
                            // Definir el precio original
                            $precio = 5350000; // Puedes cambiar esto por el precio real
                            
                            // Calcular el descuento (25%)
                            $descuento = $precio * 0.25; // El descuento es el 25% del precio original
                            
                            // Restar el descuento al precio original
                            $precioConDescuento = $precio - $descuento;

                            echo MONEDA . number_format($precioConDescuento, 2, '.', ','); ?><strong> Ahora</strong>
                        </h1>
                        <p class="lead">
                            <?php echo $descripcion; ?>
                        </p>

                        <div class="col-10 my-3">
                            Comentario: <textarea class="form-control" id="comentario" name="comentario"
                                rows="2"></textarea><br>
                            <div class="mostrado">
                                <div id="contenidoMostrado" class="form-control">
                                </div>
                            </div>
                        </div>

                        <!-- <div class="col-3 my-3">
                            Cantidad: <input class="form-control" id="cantidad" name="cantidad" type="label" min="1"
                                max="100" value="">
                        </div> -->

                        <div class="d-grid gap-3 col-10">
                            <button id="primary_c" class="btn btn-primary" type="button"
                                onclick="addComentario()">Enviar comentario</button>
                            <button id="success_c" class="btn btn-outline-primary" type="button" onclick="addProducto(<?php echo $id; ?>,
                            cantidad.value, '<?php echo $token_tmp; ?>')">Agregar</button>
                        </div>

                    </div>
                </div>
            </div>
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


    <script>

        // Array para almacenar los comentarios
        var comentarios = [];

        function addComentario() {
            // Obtener el valor del textarea
            var comentarioNuevo = document.getElementById("comentario").value;

            // Obtener el nombre de usuario desde PHP
            var usuario = "<?php echo $_SESSION['username']; ?>";

            // Concatenar el nombre de usuario con el comentario
            var comentarioConUsuario = usuario + ": " + comentarioNuevo;

            // Agregar el nuevo comentario al array
            comentarios.push(comentarioConUsuario);

            // Mostrar los comentarios en el div
            var contenidoMostrado = document.getElementById("contenidoMostrado");
            contenidoMostrado.innerHTML = "";
            comentarios.forEach(function (comentario) {
                contenidoMostrado.innerHTML += comentario + "<br>";
            });

            // Limpiar el textarea después de agregar el comentario
            document.getElementById("comentario").value = "";
        }

    </script>


</body>

</html>