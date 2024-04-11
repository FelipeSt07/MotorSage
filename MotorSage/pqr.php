<?php
require ('config/config.php');
include ("config/conexion.php");
$conexion = conectar();

$query = "SELECT idproducto, nombre, precio FROM `producto` WHERE estado=1";
$result = mysqli_query($conexion, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pqr.css">
    <link rel="shortcut icon" href="imagenes/moto.png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>PQR | Motor SAGE</title>
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
                        <a href="pqr.php" id="oculto"><i class="fa-regular fa-comments"></i>PQR</a>
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
            <h1 id="titulo">PQR (Peticiones, Quejas y Reclamos)</h1>
            <p>Nos dedicamos a escuchar tus necesidades,resolver </p>
            <p>tus inquietudes y asegurarnos de que recibas el mejor</p>
            <p>servicio posible. Ven y únete a nuestra comunidad de</p>
            <p>entusiastas de las motocicletas, donde tu opinión</p>
            <p>cuenta y nos esforzamos por brindarte una experiencia</p>
            <p>excepcional en cada interacción. ¡Déjanos ser tu aliado</p>
            <p>en el apasionante mundo de las motos!</p>



        </section>

        <!--Contenido-->
        <main>
            <!-- <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="imagenes/pexels1.jpg">
                            <div id="h5" class="card-body">
                                <h5 class="card-title">Peluqueria</h5>
                                <p class="card-text">Corte realizado por maestros en barbería, capacitados en cortes
                                    clásicos y modernos, el servicio incluye: asesoramiento de imagen y lavado.</p>

                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="imagenes/pexels3.jpg">
                            <div id="h5" class="card-body">
                                <h5 class="card-title">Ritual de barba</h5>
                                <p class="card-title">Ritual con toalla caliente y fría, afeitado tradicional con
                                    barbera y
                                    uso de productos previos y posteriores al afeitado para el cuidado de la barba.</p>

                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="imagenes/pexels2.jpg">
                            <div id="h5" class="card-body">
                                <h5 class="card-title">Spa facial</h5>
                                <p class="card-text">Spa facial completo; Servicio premium de exfoliación, mascarilla
                                    dorada, fototerapia, colágeno, hidratación facial y puede incluir depilación con
                                    cera.
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <div id="pago-ser" class="col-md-5- d-grid gap-2">
                <br>
                <a href="https://walink.co/ed4ea0" target="_blank" id="primary_c"
                    class="btn btn-primary btn-lg">ENVIAR MENSAJE</a>
                <br>
                <br>
                <br>
                <br>
                <br>

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

</body>

</html>