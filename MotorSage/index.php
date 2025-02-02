<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <link rel="shortcut icon" href="imagenes/moto.png">
    <title>Motor SAGE</title>

</head>

<body>
    <header class="header">

        <div class="menu">

            <div class="left">
                <div class="btn-departamentos" id="btn-departamentos">
                    <div class="boton">
                        <a href=""><i class="fa-solid fa-bars"></i></a>
                    </div>
                </div>

                <div class="logo">
                    <img src="imagenes/logo7c.png" alt="">
                </div>
            </div>



            <div class="nav">
                <div class="div barra">
                    <a href="login.php"><i class="fa-regular fa-circle-user"></i>Iniciar Sesion</a>
                </div>
                <div class="div barra">
                    <a href="productos.php"><i class="fa-solid fa-motorcycle"></i>Productos</a>
                </div>
                <div class="div">
                    <a href="pqr.php"><i class="fa-regular fa-comments"></i>PQRS</a>
                </div>
            </div>
        </div>

        <div class="contenedor contenedor-grid">
            <div class="grid" id="grid">
                <div class="categorias">
                    <a href="login.html">Iniciar Sesion</a>
                    <a href="productos.html">Productos</a>
                    <a href="pqr.php">PQRS</a>
                </div>
            </div>
        </div>


    </header>

    <div class="slider">
        <ul>
            <li>
                <img src="imagenes/sliderm1.jpg">
            </li>
            <li>
                <img src="imagenes/sliderm2.jpg">
            </li>
            <li>
                <img src="imagenes/sliderm3.jpg">
            </li>
            <li>
                <img src="imagenes/sliderm4.jpg">
            </li>
        </ul>
    </div>

    <section class="text">
        <h1 class="pp">BIENVENIDOS</h1>
        <p>Nuestro compromiso y objetivo es brindarte una experiencia excepcional desde el momento en </p>
        <p>en que entras hasta que te vas de nuestra pagina de motocicletas. </p><br>
        <p>Nos esforzamos por ofrecerte un servicio de calidad y una amplia gama de opciones para que encuentres la </p>
        <p>moto perfecta que se ajuste a tu estilo y necesidades.</p>

    </section>

    <section class="mosaico">
        <div class="row">
            <div class="column">
                <a href="detalles.php?%20id=1&token=bf072c2eadbfadc7cd53cf14a205624f33357ac7">
                    <img src="imagenes/productos/1/principal.png"></a>
                <a href="detalles.php?%20id=2&token=a2aa4aa1565d6465b4b68acd39aa795b030e94bb">
                    <img src="imagenes/productos/2/principal.png"></a>
                <a href="detalles.php?%20id=3&token=b68ac8fa63b0224c48a1ec5033a77a19561758f8">
                    <img src="imagenes/productos/3/principal.png"></a>

            </div>
            <div class="column">
                <a href="detalles.php?%20id=4&token=a69b3bc443676fabed604bb2a25a089c74b7e66b">
                    <img src="imagenes/productos/4/principal.png"></a>
                <a href="detalles.php?%20id=5&token=5c971235dd2d7411ed7f57e44e21e71da2dd9b4a">
                    <img src="imagenes/productos/5/principal.png"></a>
                <a href="detalles.php?%20id=6&token=e8a60e261a239252a225ee4dbc3efa32a60e832d">
                    <img src="imagenes/productos/6/principal.png"></a>
            </div>
            <div class="column">
                <a href="detalles.php?%20id=7&token=d79e7f6d6498f16e50c8ffdc1e2b70c56aa6a08d">
                    <img src="imagenes/productos/7/principal.png"></a>
                <a href="detalles.php?%20id=8&token=5ffa8f9ea711055d1e3f0b00adc6329069239c80">
                    <img src="imagenes/productos/8/principal.png"></a>
                <a href="detalles.php?%20id=9&token=c7ed1afe30d0c1e5ef3eacd473f4640d7bcea890">
                    <img src="imagenes/productos/9/principal.png"></a>

            </div>
        </div>
    </section>

    <section class="testimonials">
        <h2 class="testimonials-title">COMENTARIOS</h2>
        <div class="container">

            <div class="slides">
                <div id="slide-1" class="slide-ctrl"></div>
                <div id="slide-2" class="slide-ctrl"></div>
                <div id="slide-3" class="slide-ctrl"></div>

                <figure class="slide">
                    <blockquote class="testimonial">
                        <p>“ Estaba buscando la moto perfecta para mis viajes diarios y encontré este sitio. Quedé
                            impresionado por la variedad de opciones y la facilidad para encontrar la moto ideal.
                            ¡El mejor servicio que he experimentado!.”</p>
                        <cite>John Doe</cite>
                    </blockquote>
                </figure>

                <figure class="slide">
                    <blockquote class="testimonial">
                        <p>“Como entusiasta de las motocicletas, siempre estoy buscando el modelo perfecto
                            que se ajuste a mis necesidades. Este sitio me ayudó a encontrar
                            exactamente lo que estaba buscando.”</p>
                        <cite>David Byrne</cite>
                    </blockquote>
                </figure>

                <figure class="slide">
                    <blockquote class="testimonial">
                        <p>“Necesitaba una moto para recorrer largas distancias y descubrir nuevos lugares. Gracias a
                            esta página
                            pude comparar diferentes modelos y encontrar la moto perfecta que se adaptaba a mis
                            aventuras. ¡Recomiendo este servicio a todos los amantes de las motos!”</p>
                        <cite>Mary Poppins</cite>
                    </blockquote>
                </figure>

                <div class="slides-ctrl">
                    <a href="#slide-1" class="slide-btn">John Doe</a>
                    <a href="#slide-2" class="slide-btn">David Byrne</a>
                    <a href="#slide-3" class="slide-btn">Mary Poppins</a>

                </div>
            </div>
        </div>
    </section>



    <section class="contactos">
        <div class="izquierda">
            <i class="fa-solid fa-address-book"></i>
            <h2>CONTACTOS</h2>
            <br>
            <p>Cl. 6b #7-42 a 7-52</p>
            <p>BARRIO MARIA ISABEL</p>
            <p>PASTO, NARIÑO</p>
            <i class="fa-regular fa-clock"></i>
            <h2>¡OFERTA ESPECIAL POR TIEMPO LIMITADO!</h2><br>
            <p>MOTO EN OFERTA: VICTORY BOMBER 125</p>
            <p>TERMINOS Y CONDICIONES: VÁLIDO HASTA EL 20/04/2024,</p>
            <p>SUJETO A DISPONIBILIDAD DE STOCK. </p>
            <i class="fa-solid fa-arrow-down"></i><br>
            <a href="detalles.php?%20id=1&token=bf072c2eadbfadc7cd53cf14a205624f33357ac7">
                <strong>MÁS INFORMACION Y DETALLES DE LA MOTO</strong></a>


        </div>
        <div class="derecha">
            <video width="600" height="400" controls>
                <source src="imagenes/video.mp4" type="video/mp4">
                Tu navegador no soporta la etiqueta de video.
            </video>
        </div>
    </section>

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
        <!-- <section>
            <a href="#titulo">Ir al comienzo</a>
        </section>
        <p>&copy; Copyright 2024. Todos los derechos reservados.</p> -->
    </footer>


    <script src="https://kit.fontawesome.com/7a4ffadb8c.js" crossorigin="anonymous"></script>
    <script src="main.js"></script>

</body>

</html>