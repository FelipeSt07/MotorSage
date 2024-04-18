<?php
require ('config/config.php');
include ("config/conexion.php");
$conexion = conectar();

//$query = "SELECT idproducto, nombre, precio FROM `producto` WHERE estado=1";
//$result = mysqli_query($conexion, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="productos.css">
  <link rel="shortcut icon" href="imagenes/moto.png">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Productos | Motor SAGE</title>
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
                <ul class="dropdown-menu" aria-labelledby="btn_session" style="">
                  <li><a class="dropdown-item" href="logout.php">Cerrar sesión</a></li>
                  <li><a class="dropdown-item" href="preferencias.php">Preferencias</a></li>
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
            <a id="oculto_a" href="servicios.php">Comentarios</a>
          </div>
        </div>
      </div>

    </header>

    <div class="navbar-form">
        <form class="d-flex" action="" method="post">
            <input class="form-control me-2" type="number" name="precio" placeholder="Precio Máximo" aria-label="Precio" value="<?php if(isset($_POST["precio"])){ echo $_POST["precio"];}?>">
            <input class="form-control me-2" type="text" name="nombre" placeholder="Nombre" aria-label="Nombre" value="<?php if(isset($_POST["nombre"])){ echo $_POST["nombre"];}?>">
            <button id="primary_c" class="btn btn-primary" type="submit">Buscar</button>
        </form>
    </div>


    <section class="text">
      <h1 id="titulo">PRODUCTOS</h1>
      <p>Descubre la moto perfecta para ti. En nuestro sitio,</p>
      <p>encontrarás toda la información que necesitas para tomar la mejor decisión.</p>
      <p>¡Explora y encuentra tu próxima aventura sobre ruedas!</p>
    </section>

    <!--Contenido-->
    <main>
      <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          <?php
          if (isset($_POST["precio"]) == '' && isset($_POST["nombre"]) == '') {
            $query = "SELECT idproducto, nombre, precio FROM `producto` WHERE estado=1";
          } else {
            $query = "SELECT idproducto, nombre, precio FROM `producto` WHERE estado=1";
            if ($_POST["precio"] != '') {
              $precio = $_POST["precio"];

              $query .= " AND precio <= $precio";
            }
            if ($_POST["nombre"] != '') {
              $nombre = $_POST["nombre"];
              $query .= " AND UPPER(nombre) like UPPER('%$nombre%')";
            }
          }
          $result = mysqli_query($conexion, $query);
          if (mysqli_num_rows($result) > 0) {
            foreach ($result as $row) { ?>
              <div class="col">
                <div id="card7" class="card shadow-sm">
                  <?php
                  $id = $row['idproducto'];
                  $imagen = "imagenes/productos/" . $id . "/principal.png";

                  if (!file_exists($imagen)) {
                    $imagen = "imagenes/no_photo.jpg";
                  }
                  ?>
                  <img id="imagen_a" src="<?php echo $imagen; ?>">
                  <div class="card-body">
                    <h5 id="card" class="card-title">
                      <?php echo $row['nombre']; ?>
                    </h5>
                    <p id="card" class="card-text">
                      <?php echo number_format($row['precio'], 2, '.', ','); ?>
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div>
                        <a href="detalles.php? id=<?php echo $row['idproducto']; ?>&token=<?php echo
                             hash_hmac('sha1', $row['idproducto'], KEY_TOKEN); ?>" class="btn btn-group"
                          id="primary_c">Detalles</a>
                      </div>
                      <!-- Dentro del bucle foreach donde se muestran los productos -->
                      <a href="preferencias.php?idproducto=<?php echo $row['idproducto']; ?>&nombre=<?php echo urlencode($row['nombre']); ?>&precio=<?php echo $row['precio']; ?>&imagen=<?php echo urlencode($imagen); ?>"
                        id="success_c" class="btn btn-success">Guardar</a>

                    </div>
                  </div>
                </div>
              </div>
            <?php }
          } ?>
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
    function addPreferencia(id, nombre, precio) {
      // Aquí puedes enviar la información del producto al servidor
      // Puedes usar fetch() o AJAX para enviar los datos al servidor
      // Por ahora, simplemente mostraremos un mensaje de alerta con la información del producto
      alert("Producto guardado:\nID: " + id + "\nNombre: " + nombre + "\nPrecio: " + precio);
    }

  </script>


</body>

</html>