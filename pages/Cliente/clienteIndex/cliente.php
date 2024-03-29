<?php
require('../../../controlador/conexion.php');
$conn = conectar();
?>
<?php
session_start();
$email = $_SESSION['email'];
$cliente = listarCliente($email, $conn);
$idCliente = $cliente[0]['idcliente'];
$detallePuntos = listarDetallePuntosCliente($idCliente, $conn);

$mascotas = listarDatosMascotaDasboardCliente($idCliente, $conn);
?>


<!--Perfil del cliente (deriva o esta incluido de su pagina principal)-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scasle=1.0">
    <link rel="stylesheet" href='cliente.css'>
    <link rel="stylesheet" href="../components/navListCliente.css">

    <link rel="stylesheet" href='../editarCliente/estiloModalEditarCliente.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Mascota/mascotaEstilos.css">
    <link rel="stylesheet" href="../cerrarSesionCliente/closeSessionClient.css">
    <title>Pagina del cliente</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body style="
    margin-top: 0px;
    margin-left: 0px;
    margin-bottom: 0px;
    margin-right: 0px;
    ">


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

            <div class="wrapper-petypuntos">
                <div class="petypuntos-top">
                    <span class="tittle-petypuntos"> Mis pety Puntos </span>
                </div>
                <div class="petypuntos-bot">
                    <div class="petyscore-img">
                        <img src="../../../imagenes/perfilCliente/CHANCHITO1.png" alt="Chanchito" width="212" height="184">
                    </div>
                    <div class="canjear-petypuntos">
                        <div class="petypuntos-uno">
                            <div class="petypuntos-acumulados">
                                <div class="acumulados">
                                    <img src="https://img.icons8.com/ios/50/null/checked-2--v1.png" width="14" height="15" />
                                    <p>Puntos acumulados</p>
                                </div>
                                <div class="petyscore">
                                    <span> <?= $value[8] ?> </span>
                                    <p>Pety puntos </p>
                                </div>
                            </div>
                            <div class="petypuntos-canjeados">
                                <div class="acumulados">
                                    <img src="https://img.icons8.com/ios/50/null/checked-2--v1.png" width="14" height="15" />
                                    <p>Puntos canjeados</p>
                                </div>
                                <div class="petyscore">
                                    <span><?= $value[9] ?> </span>
                                    <p>Pety puntos </p>
                                </div>
                            </div>

                        </div>

                        <button type="button">Canjear Puntos</button>
                    </div>
                    <div class="resumen-petypuntos">
                        <div class="wrapper-resumen">
                            <h1 class="subtittle-petypuntos">Resumen de Pety Puntos</h1>
                            <span class="info-petypuntos">Estimado usuario, recuerde que al canjear el cupón de puntos
                                en la adquisición de un producto o servicio, este tiene un limite de tiempo, se efectúa
                                una sola vez y no se aceptan devoluciones</span>
                        </div>
                        <button class="see-more" type="button">Ver mas...</button>
                    </div>
                </div>

            </div>
            <div class="wrapper-pets">
                <h1>Mis Mascotas</h1>
                <div class="my-pets">
                    <div class="subwrapper-pets">
                        <?php
                        if (empty($mascotas)) {
                            echo "<p>No hay mascotas registradas.</p>";
                        } else {
                            foreach ($mascotas as $mascota) {
                                $nombre = $mascota['nombre'];
                                $fotoPerfil = $mascota['fotoPerfil'];
                                $edad = $mascota['edad'];
                                $sexo = $mascota['sexo'];
                                $peso = $mascota['peso'];
                                $idmascota = $mascota['idmascota'];
                                $etapa = $mascota['etapa'];
                                $esterilizado = $mascota['esterilizado'];
                        ?>
                                <div class="ballot-pets">
                                    <div class="picture-pet">
                                        <img src="../../../imagenes/fotosperfil/mascota/<?php echo $fotoPerfil; ?>" alt="Logo" width="119" height="120">
                                        <span>Nombre:
                                            <?php echo $nombre; ?>
                                        </span>
                                    </div>

                                    <div class="info-pets">
                                        <div class="info-text">
                                            <span>Edad:
                                                <?php echo $edad; ?>
                                            </span>
                                            <span>Sexo:
                                                <?php echo $sexo; ?>
                                            </span>
                                            <span>Peso:
                                                <?php echo $peso; ?>
                                            </span>
                                        </div>
                                        <div>
                                            <img class="butModal edits-pets" data-modal=".modalMascotaEdit" data-nombre="<?php echo $nombre; ?>" data-edad="<?php echo $edad; ?>" data-peso="<?php echo $peso; ?>" data-fotoperfil="<?php echo $fotoPerfil; ?>" data-esterilizado="<?php echo $esterilizado; ?>" data-idmascota="<?php echo $idmascota; ?>" data-etapa="<?php echo $etapa; ?>" src="../../../imagenes/perfilCliente/edit-pencil.png" alt="Logo" width="35" height="34">
                                            <a href="../../Mascota/test.php?idmascota='<?php echo $idmascota;?>'" data-idmascota="<?php echo $idmascota;?>'" class=" btn btn-sm"  data-nombre2="<?php echo $nombre; ?>" data-fotoperfil2="<?php echo $fotoPerfil; ?>" style="background-color:#1D3534; color:#1BC5BD;">
                                            
                                                <img class="pdf-pets" src="../../../imagenes/perfilCliente/pdf.svg" alt="Logo" width="31" height="26">
                                            </a>   
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>


                    <div>
                        <lord-icon class="butModal add-pet" data-modal=".modalMascotaAgre" src="https://cdn.lordicon.com/xzksbhzh.json" trigger="hover" colors="primary:#000000,secondary:#94d2bd" alt="plus-2-math">
                        </lord-icon>
                    </div>
                </div>
            </div>

            <div class="header-activities">
                <span>Actividad Reciente:</span>
            </div>
            <div class="wrapper-activities">

                <div class="info-activities">
                    <?php
                    if (empty($detallePuntos)) {
                        echo "<p>No hay detalles de puntos disponibles.</p>";
                    } else {
                        // Mostrar encabezados de la tabla fuera del bucle
                    ?>
                        <div class="scheme">
                            <h1 class="tittle-activities">
                                Producto o servicio
                            </h1>
                        </div>
                        <div class="scheme">
                            <h1 class="tittle-activities">
                                Fecha-Hora
                            </h1>
                        </div>
                        <div class="scheme">
                            <h1 class="tittle-activities">
                                Precio
                            </h1>
                        </div>
                        <div class="scheme">
                            <h1 class="tittle-activities">
                                Cantidad
                            </h1>
                        </div>
                        <div class="scheme">
                            <h1 class="tittle-activities">
                                Puntos
                            </h1>
                        </div>
                        <div class="scheme">
                            <h1 class="tittle-activities">
                                Total
                            </h1>
                        </div>
                        <?php
                        foreach ($detallePuntos as $detalle) {
                            $nombreProducto = $detalle['nombre'];
                            $fecha = $detalle['fecha'];
                            $precio = $detalle['precio'];
                            $cantidad = $detalle['cantidad'];
                            $total = $detalle['importe'];
                            $puntos = $detalle['puntos'];
                        ?>
                            <div class="scheme">
                                <div class="text-stuffed">
                                    <span><?php echo $nombreProducto; ?></span>
                                </div>
                            </div>
                            <div class="scheme">
                                <div class="text-stuffed">
                                    <span><?php echo $fecha; ?></span>
                                </div>
                            </div>
                            <div class="scheme">
                                <div class="text-stuffed">
                                    <span>s./ <?php echo $precio; ?></span>
                                </div>
                            </div>
                            <div class="scheme">
                                <div class="text-stuffed">
                                    <span id="miTexto"><?php echo $cantidad; ?></span>
                                </div>
                            </div>
                            <div class="scheme">
                                <div class="text-stuffed">
                                    <span><?php echo $puntos; ?> pts</span>
                                </div>
                            </div>
                            <div class="scheme">
                                <div class="text-stuffed">
                                    <span><?php echo $total; ?> pts</span>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>


            <div class="footer">
                <span class="copyrigth">©</span>
                <span> Vet&Care, todos los derechos reservados.</span>
            </div>

            <!-- <div>

            <button type="button" onclick="window.location.href='../mascota/registro.php'">Registrar Mascota</button>
        </div> -->
        </div>

    </div>

    </section>



    <?php
    include '../../Mascota/components/modalMascota.php';
    ?>
    <?php
    include '../editarCliente/modalEditarCliente.php';
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
                    <form action="../../../llamadas/proceso_actualizarDatosMascota.php" method="post" enctype="multipart/form-data">
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
                                    <input type="hidden" value="2" name="envio">
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
                                        <img id="perfil-img" alt="profile">
                                    </div>
                                </div>
                                <input class="form-control form-control-sm" id="fotoM" type="file" name="subirFotoMascota" hidden>
                                <label id="cambiar-foto" for="fotoM" onclick="previsualizarImagen('perfil-img','fotoM','../../../imagenes/huella.jpg')"><img class="iconoRegisMascota" src="../../../imagenes/perfilCliente/pencil.png" alt="EditMascota"></label>
                                <input type="text" class="form-control edad-footer" style="width: 140px;margin-top: -3px;" id="edadEnvio" name="edad" placeholder="Edad" disabled>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
    </section>

    <script src="../../../js/modalMascota.js"></script>
    <script src="../../../js/Interacciones.js"></script>
    <script src="../../../js/previsualizarImagen.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
    <script src="../cerrarSesionCliente/closeSessionClient.js"></script>
</body>

</html>