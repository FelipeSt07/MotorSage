<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="shortcut icon" href="imagenes/moto.png">
    <title>Login | Motor SAGE</title>
</head>

<body>
    <header class="header">

        <div class="menu">holala

            <div class="left">
                <div class="btn-departamentos" id="btn-departamentos">
                    <div class="boton">
                        <a href=""><i class="fa-solid fa-bars"></i></a>
                    </div>
                </div>

                <div class="logo">
                    <a href="index.html">
                        <img src="imagenes/logo7c.png" alt="">
                    </a>
                </div>
            </div>


            <div class="nav" id="nav_oculto">
                <div class="div barra">
                    <a href="login.php" id="oculto"><i class="fa-regular fa-circle-user"></i>Iniciar Sesion</a>
                </div>
                <div class="div barra">
                    <a href="productos.php" id="oculto"><i class="fa-solid fa-motorcycle"></i>Productos</a>
                </div>
                <div class="div">
                    <a href="#" id="oculto"><i class="fa-regular fa-comments"></i>Comentarios</a>
                </div>

            </div>
        </div>

        <div class="contenedor contenedor-grid">
            <div class="grid" id="grid">
                <div class="categorias">
                    <a href="FormLogin.php">Iniciar Sesion</a>
                    <a href="Productos.php">Productos</a>
                    <a href="servicios.php">Servicios</a>
                </div>
            </div>
        </div>


    </header>

    <div class="container">

        <div class="form-box" id="contenedor">
            <div class="button-box">
                <div id="elegir"></div>
                <button type="button" class="toggle-btn" onclick="login()">Iniciar Sesion</button>
                <button type="button" class="toggle-btn" onclick="registrar()">Registrar</button>
            </div>
            <!-- <div class="redes-sociales">
                <img src="imagenes/facebook.png" alt="icono-Facebook">
                <img src="imagenes/twiter.png" alt="icono-Twiter">
                <img src="imagenes/google.png" alt="icono-Google">
            </div> -->
            <div class="redes-sociales">
                <div class="logo">
                    <img src="imagenes/logo1.png" alt="">
                </div>
            </div>

            <form action="sesion.php" method="post" id="login" class="input-group">
                <div>
                    <input name="usuario" type="text" class="input-field" placeholder="Usuario" required>
                </div>
                <div>
                    <input name="password" type="password" class="input-field" placeholder="Contraseña" required>
                </div>
                <div>
                    <input type="checkbox" class="check-box"><span>Recordar Contraseña</span>
                </div>
                <button name="aacceder" type="submit" class="submint-btn boton">Acceder</button>
            </form>
            <!-- Formulario de registro -->
            <form action="registrar.php" id="registrar" class="input-group registrar" method="post">
                <div class="group-registrar">
                    <div class="div-registrar">
                        <input name="nombre" type="text" class="input-field" placeholder="Nombre" required id="pnombre">
                    </div>
                    <div class="div-registrar">
                        <input name="apellido" type="text" class="input-field" placeholder="Apellido" required
                            id="snombre">
                    </div>
                    <div class="div-registrar">
                        <input name="identificacion" type="text" class="input-field" placeholder="Identificacion"
                            required id="papellido">
                    </div>
                    <div class="div-registrar">
                        <input name="fechanac" type="date" class="input-field" placeholder="Fecha de Nacimiento"
                            required id="sapelido">
                    </div>
                    <div class="div-registrar">
                        <input name="telefono" type="text" class="input-field" placeholder="Telefono" required
                            id="cedula">
                    </div>
                    <div class="div-registrar">
                        <input name="usuario" type="text" class="input-field" placeholder="Nombre de usuario" required
                            id="fechnac">
                    </div>
                    <div class="div-registrar">
                        <input name="correo" type="email" class="input-field" placeholder="Correo" required
                            id="Direccion">
                    </div>
                    <div class="div-registrar">
                        <input name="confcorreo" type="email" class="input-field" placeholder="Confirmacion Correo"
                            required id="ciudad">
                    </div>
                    <div class="div-registrar">
                        <input name="clave" type="password" class="input-field" placeholder="Contraseña" required
                            id="telefono">
                    </div>
                    <div class="div-registrar">
                        <input name="confclave" type="password" class="input-field"
                            placeholder="Confirmacion contraseña" required id="correo">
                    </div>
                </div>
                <input type="checkbox" class="check-box"><span>Acepto los terminos y condiciones</span>
                <button type="submit" class="submint-btn">Registrar</button>
            </form>
        </div>
    </div>

    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("registrar");
        var z = document.getElementById("elegir");
        var c = document.getElementById("contenedor");
        var l = document.getElementById("linea");

        function login() {
            x.style.left = "45px";
            y.style.left = "600px";
            z.style.left = "0px";
            c.style.height = "500px";
            c.style.transition = "0.8s";
            l.style.margin = "20px 45px";
        }

        function registrar() {
            x.style.left = "-600px";
            y.style.left = "45px";
            z.style.left = "120px";
            c.style.height = "580px";
            c.style.transition = "0.8s";
            l.style.margin = "0px 45px";
        }
    </script>


    <script src="https://kit.fontawesome.com/7a4ffadb8c.js" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>

</body>

</html>