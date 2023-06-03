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
            <div class="wrapper-drawer">
                <h1>Productos Populares del Mes</h1>


                <!-- Swiper -->
                
                <div class="swiper">
                    <div class="swiper-wrapper">

                        <!--Inicia contenedor de swiper-->
                        <div class="swiper-slide">
                        <div class="cardpet-sup">

                            <div class="cardpet">
                                <img src="" width="64.42" height="70">
                                <span  class="type-product">Comida</span>
                                <span  class="type-category">Juguete Masticable</span>
                            </div>    
                            <div class="semicrud-pet">
                                <span class="subtitle-price">Precioo</span>
                                <span class="price">s/60.00</span>
                           </div>

                        </div>

                        <div class="cardpet-inf">
                            <span class="subtitle-sales" >Ventas hechas del mes</span>
                            <span class="sales">35</span>
                        </div>
                       </div>   
                         <!--Finaliza contenedor de swiper-->

                    </div>

                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div> <!-- Finish Swiper -->

            </div>
            <div class="wrapper-myclients">
                <div class="subwrapper-myclients">
                    <div class="clients-search">
                        <h1>Mis Clientes</h1>
                        <button class="button-search">
                            Buscar
                        </button>
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


        </div>




    </div>

    </div>

    </div>




    <section class="modal">
        <div class="modal__container">
            <div class="cuadro_modal">
                <div class="top-form">
                    <div class="titulo-h2">
                        <h2 class="tituloform">Editar Datos</h2>
                    </div>
                    <div id="close-modal">
                        &#10006
                    </div>
                </div>
                <form action="../../../llamadas/proceso_actualizarDatosAdministrador.php" enctype="multipart/form-data"
                    method="POST">

                    <div class="editheader">
                        <aside class="contfoto">
                            <img id="img" src="../../../imagenes/fotosperfil/administrador/<?= $value[6] ?>"
                                class="modal__img" width="95" height="89">
                                <input id="foto" type="file" name="foto" hidden>
                            <label id="cambiar-foto" for="foto"><img class="image-profile"
                src="../../../imagenes/perfilAdmin/pencil.png" alt="pencil" width="32" height="30"></label>
                        </aside>
                        <section class="textonomap">
                            <div class="input-group">
                                <input class="estilo-separado" type="text" name="nombres" value="<?= $value[0] ?>"
                                    required>
                                <label for=""> Nombres</label>

                            </div>
                            <div class="input-group">
                                <input class="estilo-separado" type="text" name="apellidos" value="<?= $value[1] ?>"
                                    required>
                                <label for=""> Apellidos</label>
                            </div>

                        </section>
                    </div>
                    <div class="modalinf">
                        <div class="input-group1">
                            <input class="estilo-separado1" type="TEXT" name="telefono" value="<?= $value[3] ?>"
                                required>
                            <label for=""> Telefono</label>
                        </div>
                        <div class="input-group2">
                            <input class="estilo-separado1" type="TEXT" name="dni" value="<?= $value[2] ?> " required>
                            <label for=""> DNI</label>
                        </div>

                        <input hidden name="idadministrador" value="<?= $value[7] ?> " required>
                        <input hidden name="foto2" value="<?= $value[6] ?> " required>
                    </div>
                    <div class="modalFoot">
                        <div class="input-group3">
                            <input class="estilo-separado" type="text" name="direccion" value="<?= $value[4] ?>"
                                required>
                            <label for=""> Dirección</label>
                        </div>
                    </div>
                    <div class="contbtn">
                        <button class="btn-mod">ACTUALIZAR DATOS</button>
                    </div>

                </form>

            </div>
        </div>
    </section>
    </section>


<script src="../../../js/registroNewUs.js"></script>
    <script src="../../../js/Modal.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="../../../js/swiperAdmin.js"></script>

</body>

</html>