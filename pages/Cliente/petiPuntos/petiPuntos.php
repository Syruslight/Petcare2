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
    <link rel="stylesheet" href="../cerrarSesionCliente/closeSessionClient.css">
    <script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <title>Pagina de cliente</title>
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
                <?php
            include('../cerrarSesionCliente/closeSessionClient.php');
            ?>

            <div class="wrapper-products">
                <div class="subwrapper-products">
                    <div class="header-products">
                        <h1 class="tittle-products">Recompensas</h1>
                    </div>
            
                </div>
                <div class="header-petiPuntos">
                    <div class="first-petiPuntos"> 
                        <div class="wrapper-promoPeti">
                            <span class="text-petiPuntos">
                                LA COMIDA FAVORITA DE TU PERRO A SOLO A  UNOS PUNTOS DE DISTANCIA
                            </span>
                            <img class="image-petiPuntitos"src="/imagenes/perfilCliente/Promoootion.png" alt="promocion">
                            <button class="button-petiPuntoss">Ver mas...</button>
                        </div>
                        <img class="image-promoPetii" src="/imagenes/perfilCliente/promoImage.png" alt="Promo">
                    </div>
                    <div class="second-petiPuntos">
                        <div class="tittle-seconPeti">
                            <h1 class="tittle-myPuntos">MIS PUNTOS</h1>
                        </div>
                        <div class="wrapper-myPetiPuntos">
                            <img class="image-forPetiPig" src="/imagenes/perfilCliente/CHANCHITO1.png" alt="">
                            <div class="puntos-usados">
                                <span class="text-puntosUsados">Pts. Usados</span>
                                <span class="puntaje-usadosPeti">85</span>
                            </div>
                            <div class="puntos-acumulados">
                                <span class="text-acumulados">Pts. Acumulados</span>
                                <span class="puntaje-acumuladosPeti">145</span>
                            </div>
                            <div class="puntos-generados">
                                <span class="text-generados">Cupones Generados</span>
                                <span class="puntaje-generadosPeti">03</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="title-productPeti">
                        <h1 class="tittle-Productoss">
                            Productos
                        </h1>
                </div>
                <div class="wrapper-drawer">
                    <!-- Inicia el terrible swiper  -->

                    <div class="swiper">
    <div class="swiper-wrapper">

    <?php
            $productos = obtenerProductosRecompensa($conn);
            foreach ($productos as $producto) {
                echo '<div class="swiper-slide">';
                echo '<div class="cardpet-sup">';
                echo '<div class="cardpet">';
                echo '<div class="wrapper-imgButt">';
                echo '<img class="image-swiper" src="../../../imagenes/productos_servicios/productservices/' . $producto['fotoProductoServicio'] . '" >';
                echo '<a class="button" href="#" onclick="canjearProducto(' . $producto['idproductoservicio'] . ')">'; // Agregar el evento onclick aquí
                echo '<div class="buton-canjear">';
                echo '<span class="canjear-peti">Canjear</span>';
                echo '</div>';
                echo '</a>';
                echo '</div>';
                echo '<span class="text-canjePeti">' . $producto['nombre_producto'] . '</span>';
                echo '<span class="text-canjePeti">' . $producto['puntos'] . ' pts</span>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>

    </div>

    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>

                </div>
                <div class="title-productPeti">
                        <h1 class="tittle-Productoss">
                            Servicios
                        </h1>
                </div>
                <div class="wrapper-drawer">
                    <!-- Inicia el terrible swiper  -->

                    <div class="swiper">
    <div class="swiper-wrapper">

        <?php
      
        $productos = obtenerServicioRecompensa($conn); 
        
        foreach ($productos as $producto) {
            echo '<div class="swiper-slide">';
            echo '<div class="cardpet-sup">';
            echo '<div class="cardpet">';
            echo '<div class="wrapper-imgButt">';
            echo '<img class="image-swiper" src="../../../imagenes/productos_servicios/productservices/' . $producto['fotoProductoServicio'] . '" >';
            echo '<a class="button" href="#popup1">';
            echo '<div class="buton-canjear">';
            echo '<span class="canjear-peti">Canjear</span>';
            echo '</div>';
            echo '</a>';
            echo '</div>';
            echo '<span class="text-canjePeti">' . $producto['nombre_producto'] . '</span>';
            echo '<span class="text-canjePeti">' . $producto['puntos'] . ' pts</span>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        ?>

    </div>

    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>

                </div>

                
            </div>
<!-- ... Tu código HTML ... -->

<script>
   function canjearProducto(idProducto) {
    // Realizar una solicitud AJAX para guardar el canje
    $.ajax({
        url: 'guardarCanje.php',
        method: 'POST',
        data: {
            idProducto: idProducto
        },
        dataType: 'json', // Especificar que esperamos recibir un JSON como respuesta
        success: function (response) {
            // Verificar si la respuesta contiene el código generado
            if (response.hasOwnProperty('codigoCanje')) {
                // Si la solicitud AJAX fue exitosa, mostrar el popup con el código generado
                document.getElementById('nombreCliente').value = response.codigoCanje; // Aquí se mostrará el código generado
                document.getElementById('popup1').style.display = 'block'; // Mostrar el popup
            } else {
                alert('Error al guardar el canje');
            }
        },
        error: function () {
            alert('Error al guardar el canje');
        }
    });
}

</script>

<!-- El POPUP para canjear -->
<div id="popup1" class="overlay">
    <div class="popup">
        <h2>Código canjeado exitosamente.</h2>
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
    <script src="../cerrarSesionCliente/closeSessionClient.js"></script>
</body>

</html>