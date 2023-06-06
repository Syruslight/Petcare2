<?php
require('../../controlador/conexion.php');
$conn = conectar();
?>
<?php
session_start();
$email = $_SESSION['email'];
foreach (listarCliente($email, $conn) as $key => $value) {
    // Obtener el ID del cliente
    $idCliente = $value[7];
} ?>
<!--Perfil del cliente (deriva o esta incluido de su pagina principal)-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="mascotaEstilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <title>Pagina del Cliente</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
            buscarMascota('');
            $('#busqueda').on('input', function() {
            var query = $(this).val();
            buscarMascota(query);
            });
        });

        function buscarMascota(query){
            var idCliente = <?php echo $idCliente; ?>; // Obtener el valor de $idCliente  
            $.ajax({
            url: '../../llamadas/proceso_busqueda_mascota.php',
            method: 'POST',
            data: { query: query, idCliente: idCliente},
            success: function(response) {
                $('#resultados').html(response);
            }
            });
        }
    </script>
<script>
    $(document).ready(function() {
        $('.butModal').on('click', function(e) {
            e.preventDefault();
            var idMascota = $(this).data('idmascota');
            // Realizar solicitud AJAX para obtener los datos de la mascota seleccionada
            $.ajax({
                url: '../../llamadas/proceso_obtener_mascota.php',
                method: 'POST',
                data: { idMascota: idMascota },
                success: function(response) {
                    // Actualizar los campos del formulario con los datos obtenidos
                    var mascota = JSON.parse(response);
                    $('#nombre').val(mascota.nombre);
                    $('#peso').val(mascota.peso);
                    $('#edad').val(mascota.edadAnos + ' años ' + mascota.edadMeses + ' meses');
                    $('#etapa').val(mascota.etapa);
                    $('input[name="esterilizado"][value="' + mascota.esterilizado + '"]').prop('checked', true);
                    // Resto del código para mostrar el modal de edición
                    // ...
                }
            });
        });
    });
</script>


</head>

<body>
    <div class="wrapper">
        <div class="profile">
            <?php
            include('components/navListMascota.php');
            ?>
        </div>
        <div class="dash-information">
            <div class="dash-header">
                <span class="tittle-header">
                    <?= $value[0] ?>
                    <?= $value[1] ?>
                </span> <!--Se abre codigo php para invocar a la sesion del 'usuario'-->
                <img src="../../imagenes/fotosperfil/cliente/<?= $value[6] ?>" alt="profile" width="38" height="39">
            </div>

            <!-- Servicios -->
            <div class="row align-items-center" id="row-servicios">
                <div class="conte-servicio text-center">
                    <!-- Items Servicio-->
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-6 col-lg-3 card">
                            <img src="../../Imagenes/mujer-corta-perro-perro-sentado-sofa-raza-yorkshire-terrier.jpg"
                                alt="Baño y Corte">
                            <h4 class="mt-2">Baño y Corte</h4>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 card">
                            <img src="../../Imagenes/cerca-veterinario-cuidando-perro.jpg" alt="Consultas">
                            <h4 class="mt-2">Consultas</h4>
                        </div>
                        <div class="col-12 col-md-6 col-lg-2 centxt animate__heartBeat">
                            <h4 class="mt-2"><span>Servicios
                                    <br>Disponibles</span></h4>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 card">
                            <img src="../../Imagenes/lavar-perro-mascota-casa.jpg" alt="Enmotado">
                            <h4 class="mt-2">Baño Medicado</h4>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 card">
                            <img src="../../Imagenes/perro-negro-grande-obteniendo-procedimiento-salon-peluqueria-mujer-joven-camiseta-blanca-peinando-perro-perro-atado-mesa-azul.jpg"
                                alt="Enmotado">
                            <h4 class="mt-2">Deslanado</h4>
                        </div>
                    </div>
                    <!-- Fin Items Servicio-->
                </div>
            </div>

            <div class="container" id="row-tablaMascota">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Mis mascotas
                                    <a href="" class="butModal btn float-end sa" data-modal=".modalMascotaAgre"
                                        style="background-color:#399731;">Agregar</a>
                                    <a href="" class="btn float-end sa" style="background-color:#C01C1C">Eliminar</a>
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="six">
                                    <span>Buscar: <input type="text" id="busqueda" class="form-control"
                                            placeholder="Ingrese nombre mascota..."></span>
                                </div>
                                <table id="resultados" class="table table-borderless table-striped table-responsive text-center">
                                <thead>
                                        <tr>
                                            <th class="toget">Imagen</th>
                                            <th>Nombre</th>
                                            <th>Fecha registro</th>
                                            <th>Edad</th>
                                            <th>Peso</th>
                                            <th>Color</th>
                                            <th class="th">Esterilizado</th>
                                            <th class="td">Acción</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer">
                <span class="copyrigth">©</span>
                <span> Vet&Care, todos los derechos reservados.</span>
            </div>

        </div>

    <?php 
        include 'components/modalMascota.php';
    ?>

    <!-- Modal Editar Cliente -->
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
                <form action="../../llamadas/proceso_actualizarDatosCliente.php" enctype="multipart/form-data"
                    method="POST">

                    <div class="editheader">
                        <aside class="contfoto">
                            <img class="fotous" src="../../imagenes/fotosperfil/cliente/<?= $value[6] ?>"
                                class="modal__img" width="95" height="89">
                            <input id="foto" type="file" name="foto">

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

                        <input hidden name="idcliente" value="<?= $value[7] ?> " required>
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


<script src="../../js/registroNewUs.js"></script>
    <script src="../../js/Modal.js"></script>
    <script src="../../js/modalMascota.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b9a2b0c154.js" crossorigin="anonymous"></script>
</body>

</html>