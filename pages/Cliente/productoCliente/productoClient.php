<?php
require('../../../controlador/conexion.php');
$conn = conectar();
?>

<?php
session_start();
$email = $_SESSION['email'];
foreach (listarCliente($email, $conn) as $key => $value) {
} ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scasle=1.0">
        <link rel="stylesheet" href='productoClient.css'>
        <link rel="stylesheet" href='../editarCliente/estiloModalEditarCliente.css'>
        <link rel="stylesheet" href='../clienteIndex/cliente.css'>
        <link rel="stylesheet" href='../components/navListCliente.css'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <title>Pagina del cliente</title>
    </head>
<body>


<div class="wrapper">
        <div class="profile">
            <?php
            include('../components/navListCliente.php');
            ?>
        </div>
        <div class="dash-information">
            <?php
            include('../components/headerCliente.php');
            ?>
            
    <section class="container-main">
        <div>
            <h2 class="mb-3">Catalogo de productos</h2>
        </div>
        <div class="row wrapped-main">
            <div class="busqueda">
                <h4>Categorias</h4>
                <div class="six">
                    <span>Buscar: <input type="text" id="busqueda" class="form-control" placeholder="Ingrese nombre producto..."></span>
                </div> 
            </div>
            <div class="main-data">
            <aside class="categorias-row">
        <div class="categoria-list">
            <?php
            $especies = array("Perro", "Gato", "Conejo");

            foreach ($especies as $especie) {
                $query = "SELECT e.nombre AS nombre_especie, COUNT(DISTINCT ps.idproductoservicio) AS cantidad_productos
                            FROM especie e
                            LEFT JOIN tipoproductoservicio tp ON e.idespecie = tp.idespecie
                            LEFT JOIN productoservicio ps ON tp.idtipoproductoservicio = ps.idtipoproductoservicio
                            WHERE tp.idtipoproductoservicio IS NOT NULL AND e.nombre = '$especie'
                            GROUP BY e.nombre";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $nombre_especie = $row['nombre_especie'];
                        $cantidad_productos = $row['cantidad_productos'];
            ?>
            <div class="card">
                <div class="card-header-categoria">
                    <button class="title btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $nombre_especie; ?>" aria-expanded="false" aria-controls="collapse<?php echo $nombre_especie; ?>">
                        <span><?php echo $nombre_especie . " (" . $cantidad_productos . ")"; ?></span>
                        <i class="fa-solid fa-chevron-down" style="color: #00423f; right: 26px"></i>
                    </button>
                </div>

                <div class="card-body-categoria collapse" id="collapse<?php echo $nombre_especie; ?>">
                    <ul class="values">
                        <?php
                        $query_servicios = "SELECT tp.nombre AS nombre_categoria, COUNT(ps.idproductoservicio) AS cantidad_servicios
                                            FROM tipoproductoservicio tp
                                            LEFT JOIN productoservicio ps ON tp.idtipoproductoservicio = ps.idtipoproductoservicio
                                            WHERE tp.idespecie = (SELECT idespecie FROM especie WHERE nombre = '$nombre_especie')
                                            AND tp.idtipoproductoservicio NOT IN (3, 8, 13)
                                            GROUP BY tp.nombre";
                        $result_servicios = mysqli_query($conn, $query_servicios);

                        if (mysqli_num_rows($result_servicios) > 0) {
                            while ($row_servicios = mysqli_fetch_assoc($result_servicios)) {
                                $nombre_categoria = $row_servicios['nombre_categoria'];
                                $cantidad_servicios = $row_servicios['cantidad_servicios'];
                        ?>
                        <li>
                            <button class="btn" onclick="remplazarCheckIcon(this)">
                                <i class="fa fa-square-o fa-xl" style="color: #00423f;"></i>
                                <span><?php echo $nombre_categoria . " (" . $cantidad_servicios . ")"; ?></span>
                            </button>
                        </li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <?php
                    }
                }
            }
            ?>
        </div>
    </aside>

                <div class="list-product">
        <?php
        $productos = listarProductos($conn); // Reemplaza "obtenerProductos" con el nombre de tu función que realiza la consulta y obtiene los registros

        foreach ($productos as $producto) {
        ?>
            <div class="card-product">
                <div class="card-head-product">
                    <span><?php echo $producto['nombre']; ?></span>
                </div>
                <div class="card-img-product">
                    <img src="../../../imagenes/productos_servicios/productos/<?php echo $producto['foto']; ?>" alt="foto-producto">
                </div>
                <div class="card-footer-product">
                    <span>Precio: s/. <?php echo $producto['precio']; ?></span>
                </div>
            </div>
        <?php
        }
        ?>
    </div>

    </section>
    <?php
                include('../components/footerCliente.php');
                ?>
    </div>


</div>

<?php
                include('../../Cliente/editarCliente/modalEditarCliente.php');
                ?>


           



































































<script src="../../js/previsualizarImagen.js"></script>
                <script src="../../../js/Interacciones.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/b9a2b0c154.js" crossorigin="anonymous"></script>
    <script src="../../../js/cliente/filtroProducto.js"></script>
</body>
</html>