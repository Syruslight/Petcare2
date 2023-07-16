<?php
require('../../../controlador/conexion.php');
$conn = conectar();
?>
<?php
session_start();
$email = $_SESSION['email'];
foreach (listarAdministrador($email, $conn) as $key => $value) {
?>
<?php
} ?>
<!--Perfil del administrador (deriva o esta incluido de su pagina principal)-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='administrador.css'>
    <link rel="stylesheet" href='../components/navListAdministrador.css'>
    <link rel="stylesheet" href='../components/headerAdministrador.css'>
    <link rel="stylesheet" href='../editAdministrador/editModalAdministrador.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <title>Pagina de administrador</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            // Ejecutar la búsqueda al cargar la página
            buscarClientes('');

            $('#busqueda').on('input', function () {
                var query = $(this).val();
                buscarClientes(query);
            });
        });

        function buscarClientes(query) {
            $.ajax({
                url: '../../../llamadas/proceso_busqueda_cliente.php',
                method: 'POST',
                data: { query: query },
                success: function (response) {
                    $('#resultados').html(response);
                }
            });
        }
    </script>

</head>

<body>

    <div class="wrapper">
        <div class="profile">
            <?php
            include('../components/navListAdministrador.php');
            ?>
        </div>
        <div class="dash-information">
            <?php
            include('../components/headerAdministrador.php');
            ?>
             <h1 class="tituloProductos">Productos Populares del Mes</h1>
            <div class="wrapper-drawer">
             

                    
                    
                    
                    <!-- Swiper -->
                    
                    
                    <div class="swiper">
    <div class="swiper-wrapper">
        
        <!-- Inicia contenedor de swiper -->
        <?php
        $productos = listarProductos($conn);
        foreach ($productos as $producto) {
            echo '<div class="swiper-slide">';
            echo '<div class="cardpet-sup">';
            echo '<div class="cardpet">';
            echo '<img src="../../../imagenes/productos_servicios/productos/' . $producto['foto'] . '" width="64.42" height="70">';
            echo '<span class="type-product">' . $producto['nombre'] . '</span>';
            echo '<span class="type-category">' . $producto['tipo'] . '</span>';
            echo '</div>';
            echo '<div class="semicrud-pet">';
            echo '<span class="subtitle-price">Precio</span>';
            echo '<span class="price">s/.' . $producto['precio'] . '</span>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        ?>
        <!-- Finaliza contenedor de swiper -->

    </div>

    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div> <!-- Finish Swiper -->


            
        </div>
            <div class="wrapper-myclients">
                <div class="subwrapper-myclients">
                    <div class="clients-search">
                        <h1>Mis Clientes</h1>
                        
                    </div>
                    <div class="wrapper-search">
                        <span>Buscar: <input type="search" id="busqueda" name="searchuser"
                                placeholder="Dni, nombre, telefono..."></span>
                    </div>
                    <div id="resultados">

                    </div>
                </div>
               

            </div>



            <?php
            include('../components/footerAdministrador.php');
            ?>

<?php
            include('../editAdministrador/editModalAdministrador.php');
            ?>

        </div>




    </div>

    </div>

    </div>




    
    </section>


<script src="../../../js/previsualizarImagen.js"></script>
    <script src="../../../js/Interacciones.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="../../../js/swiperAdmin.js"></script>

</body>

</html>