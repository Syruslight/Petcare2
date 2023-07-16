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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
     <link rel="stylesheet" href="../Cliente/editarCliente/estiloModalEditarCliente.css">
     <link rel="stylesheet" href="mascotaEstilos.css">
     <link rel="stylesheet" href="components/navListMascota.css">
   
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

        function buscarMascota(query) {
            var idCliente = <?php echo $idCliente; ?>; // Obtener el valor de $idCliente  
            $.ajax({
                url: '../../llamadas/proceso_busqueda_mascota.php',
                method: 'POST',
                data: {
                    query: query,
                    idCliente: idCliente
                },
                async: false, // Hacer la llamada AJAX de manera síncrona
                success: function(response) {
                    $('#resultados').html(response);
                    //idMascota = $('td[name="idmascota"]').text(); // Asignar el valor a idMascota,no
                    //$('#idMascotaInput').val(idMascota); //no
                    //  alert(idMascota);
                }
            });
        }
    </script>

</head>

<body>
    <!-- <input type="text" id="idMascotaInput" readonly> no-->
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
                            <img src="../../Imagenes/mujer-corta-perro-perro-sentado-sofa-raza-yorkshire-terrier.jpg" alt="Baño y Corte">
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
                            <img src="../../Imagenes/perro-negro-grande-obteniendo-procedimiento-salon-peluqueria-mujer-joven-camiseta-blanca-peinando-perro-perro-atado-mesa-azul.jpg" alt="Enmotado">
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
                                    <a href="" class="butModal btn float-end sa" data-modal=".modalMascotaAgre" style="background-color:#399731;margin-right: 12px;">Agregar</a>
                                </h4>
                            </div>
                            <div class="six">
                                    <span>Buscar: <input type="text" id="busqueda" class="form-control" placeholder="Ingrese nombre mascota..."></span>
                                </div> 
                            <div class="card-body">                             
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
       <!-- MODAL EDITAR -->
       <section class="moda modalMascota modalMascotaEdit">
            <div class="row" id="modal-Register">
                <div class=" container">
                    <div class="row header-ReMas justify-content-end">
                        <div class="row close-btn">
                            <span class="btn btn-dark modal__close" style="width: 50px;">✖</span>
                        </div>
                        <div class="row">
                            <h3 class="mb-3"><span>Editar Mascota</span></h3>
                        </div>
                    </div>
                    <div class="row data">
                        <form action="../../llamadas/proceso_actualizarDatosMascota.php" method="post" enctype="multipart/form-data">
                            <div class="data-col2">
                                <div class="form-edit">
                                    <input type="text" id="nombreEnvio" class="form-control" name="nombreMascota" placeholder="Nombre">
                                    <div class="row-short">
                                        <input type="text" class="form-control ip me-3" id="pesoEnvio" name="peso" placeholder="Peso">
                                        <select name="etapa" id="etapaEnvio" class="form-select" style="width: 110px; height:42px">
                                            <option selected disabled>Etapa</option>
                                            <option value="Cria">Cría</option>
                                            <option value="Juvenil">Juvenil</option>
                                            <option value="Adulto">Adulto</option>
                                        </select>
                                    </div>
                                    <div class="cont-radio">
                                        <div class="cont-este">
                                            <label class="form-check-label">Esterilizado:</label>
                                            <input type="radio" name="esterilizado" class="form-check-input" id="siEnvio" value="SI">
                                            <label class="form-check-label" for="siEnvio">Si</label>
                                            <input type="radio" name="esterilizado" class="form-check-input" id="noEnvio" value="NO">
                                            <label class="form-check-label" for="noEnvio">No</label>
                                        </div>
                                        <input type="hidden" id="fotodefecto" name="fotoDefecto">
                                        <input type="hidden" id="idmascotaEnvio" name="idMascota">
                                        <input type="hidden" value="1" name="envio">
                                    </div>
                                </div>
                                <div class="button">
                                    <input type="submit" name="editar" value="Editar" class="btn">
                                </div>
                            </div>                          
                            <div class="data-col1">
                                <div class="row">
                                    <div class="fotoPos">
                                        <div class="foto">
                                            <img name="fotoMascota" id="perfil-img" alt="profile">
                                        </div>
                                    </div>
                                    <input class="form-control form-control-sm" id="fotoM" type="file" name="subirFotoMascota" hidden>
                                    <label id="cambiar-foto" for="fotoM" onclick="previsualizarImagen('perfil-img','fotoM','../../../imagenes/huella.jpg')"><img  class="iconoRegisMascota" src="../../../imagenes/perfilCliente/pencil.png" alt="editMascota"></label>






                                    <input type="text" class="form-control edad-footer" style="width: 140px;margin-top: -3px;" id="edadEnvio" name="edad" placeholder="Edad" value="<?= $mascota['edadAnos'] ?> año(s) <?= $mascota['edadMeses'] ?> m" disabled>
                                </div>                               

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>   
        </section>
<?php
        include '../Cliente/editarCliente/modalEditarCliente.php';
        ?>

        <script src="../../js/previsualizarImagen.js"></script>
        <script src="../../js/Interacciones.js"></script>
        <script src="../../js/modalMascota.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/b9a2b0c154.js" crossorigin="anonymous"></script>
</body>

</html>