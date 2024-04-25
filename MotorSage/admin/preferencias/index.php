<?php 
    include ("../config/conexion.php");
    include ("../config/config.php");
    require "../header.php";

    $conexion = conectar();

    $query = "SELECT idproducto, nombre FROM `producto` WHERE estado=1";

    $result1 = mysqli_query($conexion, $query);
?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Preferencias</h1>
        <div class="card mb-4">
    <div class="card-header">
        <svg class="svg-inline--fa fa-table me-1" aria-hidden="true" focusable="false" data-prefix="fas"
            data-icon="table" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
            <path fill="currentColor"
                d="M64 256V160H224v96H64zm0 64H224v96H64V320zm224 96V320H448v96H288zM448 256H288V160H448v96zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64z">
            </path>
        </svg><!-- <i class="fas fa-table me-1"></i> Font Awesome fontawesome.com -->
        Tabla de Preferencias Por Moto
    </div>
    <div class="card-body">
        <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
            <div class="datatable-container">
                <table id="datatablesSimple" class="datatable-table">
                    <thead>
                        <tr>
                            <th data-sortable="true" style="width: 20%;"><a href="#"
                                    class="datatable-sorter">Id</a></th>
                            <th data-sortable="true" style="width: 60%;"><a href="#"
                                    class="datatable-sorter">Nombre</a></th>
                            <th data-sortable="true" style="width: 20%;"><a href="#"
                                    class="datatable-sorter">Preferencias</a></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (mysqli_num_rows($result1) > 0) {
                        foreach ($result1 as $row) {
                        $id = $row["idproducto"];
                        $sql = "SELECT count(*) FROM `preferencia` WHERE producto = $id";
                        $result = mysqli_query($conexion, $sql);
                        $count=mysqli_fetch_assoc($result);
                    ?>
                        <tr data-index="0">
                            <td><?php echo $row['idproducto']?></td>
                            <td><?php echo $row['nombre']?></td>
                            <td><?php echo $count['count(*)']?></td>
                        </tr>
                    <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    </div>
</main>
<?php 
    require "../footer.php";
?>