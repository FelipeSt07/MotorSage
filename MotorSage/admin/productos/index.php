<?php

include ("../config/conexion.php");
include ("../config/config.php");
require '../header.php';

if (!isset($_SESSION['user_type'])) {
    header('Location: ../index.php');
    exit;
}

if ($_SESSION['user_type'] != 'admin') {
    header('Location: ../../index.php');
    exit;
}
$conexion = conectar();

$sql = "SELECT idproducto,nombre,descripcion,precio,descuento FROM 
producto WHERE estado = 1";
$result = mysqli_query($conexion, $sql);

?>
<main>
    <div class="container-fluid px-4">
        <h2 class="mt-2">Productos</h2>

        <a class="btn btn-primary" href="nuevo.php">Agregar</a>

        <table class="table table-hover my-4">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($result as $producto) { ?>
                    <tr>
                        <td><?php echo $producto['nombre']; ?></td>
                        <td><?php echo $producto['precio']; ?></td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#eliminarModal" data-bs-id="<?php echo $producto['idproducto']; ?>">
                                <i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</main>

<div class="modal fade" id="eliminarModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Alerta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Desea eliminar este registro?
            </div>
            <div class="modal-footer">
                <form action="elimina.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $producto['idproducto']; ?>">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>

    </div>
</div>

<script>
    let eliminaModal = document.getElementById('eliminaModal')
    eliminaModal.addEventListener('show.bs.modal', function(event){

        let button = event.relatedTarget
        let id = button.getAttribute('data-bs-id')

        let modalInputId = eliminaModal.querySelector('.modal-footer input')
        modalInputId.value = id
    })
</script>


<?php require '../footer.php'; ?>