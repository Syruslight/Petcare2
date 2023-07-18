<?php
require('../../../controlador/conexion.php');
$conn = conectar();
?>
<?php
session_start();
$email = $_SESSION['email'];
foreach (listarCliente($email, $conn) as $key => $value) {
?>
<?php
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='../editarCliente/estiloModalEditarCliente.css'>
    <link rel="stylesheet" href='../clienteIndex/cliente.css'>
    <link rel="stylesheet" href='petiPuntos.css'>
    <link rel="stylesheet" href='../components/navListCliente.css'>
    <script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <title>Pagina de administrador</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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

            <div class="wrapper-products">
                <div class="subwrapper-products">
                    <div class="header-products">
                        <h1 class="tittle-products">Recompensas</h1>
                    </div>
                    <div class="wrapper-tableProducts">
                        <div class="header-table">
                            <div class="search-product">
                                <span class="search">Buscar:</span>
                                <input class="input-search" type="search" name="busqueadaDNI" placeholder="" id="busqueda">
                            </div>
                        </div>
                        <div id="item-list" class="wrapper-onlyTable">
                            <div class="tittle-table">
                                <div class="row-table">

                                    <span class="tittle-textProduct">Producto</span>
                                    <span class="tittle-textDescription">Descripción</span>
                                    <span class="tittle-textType">Puntos</span>
                                    <span class="tittle-textAction">Accion</span>
                                </div>
                                <hr class="linea">
                            </div>
                            <div id="resultados" class="wrapper-table">
                                    <div class="result-item">
                                        <img class="image-product" src="../../../imagenes/productos_servicios/productos/20253612.webp" width="60" height="60">
                                        <div class="result-info">
                                        <span class="table-nameFood">Comida de Perro 15kg </span>
                                        <span class="table-description">XXXxxxxxxxxxxxxxxxxxxxxxxxxxxxxxXXXXXXX</span>
                                        <span class="item table-type">0 pts.</span>
                                        </div>
                                        <a class="button" href="#popup1">
                                        <button>CANJEAR</button>
                                    </a>
                                    </div>
                                    <hr class="linea">



                                <div class="result-item">
                                    <img class="image-product" src="../../../imagenes/productos_servicios/productos/20253612.webp" width="60" height="60">
                                    <div class="result-info">
                                    <span class="table-nameFood">Comida de Perro 15kg </span>
                                    <span class="table-description">XXXxxxxxxxxxxxxxxxxxxxxxxxxxxxxxXXXXXXX</span>
                                    <span class="item table-type">100 pts.</span>
                                    </div>
                                    <a class="button" href="#popup1">
                                        <button>CANJEAR</button>
                                    </a>
                                </div>
                                <hr class="linea">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

<!-- El POPUP para canjear -->
    <div id="popup1" class="overlay">
        <div class="popup">
            <h2>Código canjeado exitosamente.!</h2>
            <a class="close" href="#">✖</a>
            <div class="content">
            <input type="text" id="nombreCliente" disabled>
            <img src="../../../imagenes/perfilCliente/pulgares-hacia-arriba.gif" alt="GifPulgarArriba" width="90px" height="90">
            </div>
        </div>
    </div>

            <?php
            include('../components/footerCliente.php');
            ?>
        </div>




    </div>





    </section>





    <script src="../../../js/previsualizarImagen.js"></script>
    <script src="../../../js/Interacciones.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="../../../js/swiperAdmin.js"></script>
    <!-- <script src="../../../js/administrador/modals-products.js"></script> -->
    <script src="../../../js/administrador/imagenPoup.js"></script>
    <script src="../../../js/administrador/filterCheckbox.js"></script>
    <script src="../../../js/administrador/modals-editService.js"></script>
</body>

</html>