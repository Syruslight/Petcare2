<?php
require('../../controlador/conexion.php');
$conn = conectar();
?>
<?php
session_start();
$email = $_SESSION['email'];
$cliente = listarCliente($email, $conn);
$idCliente = $cliente[0]['idcliente'];

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../Mascota/mascotaEstilos.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script> -->
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
            include('components/navListCliente.php');
            ?>
        </div>
        <div class="dash-information">
            <?php
            include('components/headerCliente.php');
            ?>

            <div class="wrapper-petypuntos">
                <div class="petypuntos-top">
                    <span class="tittle-petypuntos"> Mis pety Puntos </span>
                </div>
                <div class="petypuntos-bot">
                    <div class="petyscore-img">
                        <img src="../../imagenes/perfilCliente/CHANCHITO1.png" alt="Chanchito" width="212" height="184">
                    </div>
                    <div class="canjear-petypuntos">
                        <div class="petypuntos-uno">
                            <div class="petypuntos-acumulados">
                                <div class="acumulados">
                                    <img src="https://img.icons8.com/ios/50/null/checked-2--v1.png" width="14"
                                        height="15" />
                                    <p>Puntos acumulados</p>
                                </div>
                                <div class="petyscore">
                                    <span>580 </span>
                                    <p>Pety puntos </p>
                                </div>
                            </div>
                            <div class="petypuntos-canjeados">
                                <div class="acumulados">
                                    <img src="https://img.icons8.com/ios/50/null/checked-2--v1.png" width="14"
                                        height="15" />
                                    <p>Puntos canjeados</p>
                                </div>
                                <div class="petyscore">
                                    <span>580 </span>
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
                                ?>
                                <div class="ballot-pets">
                                    <div class="picture-pet">
                                        <img src="../../imagenes/fotosperfil/mascota/<?php echo $fotoPerfil; ?>" alt="Logo"
                                            width="119" height="120">
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
                                            <img class="butModal edits-pets" data-modal=".modalMascotaEdit" src="../../imagenes/perfilCliente/edit-pencil.png"
                                                alt="Logo" width="35" height="34">
                                            <img class="pdf-pets" src="../../imagenes/perfilCliente/pdf.png" alt="Logo"
                                                width="46" height="42">
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>


                    <div>
                        <img class="butModal add-pet" data-modal=".modalMascotaAgre" src="https://img.icons8.com/ios/50/plus-2-math.png" alt="plus-2-math" />
                    </div>
                </div>
            </div>

            <div class="header-activities">
                <span>Actividad Reciente:</span>
            </div>
            <div class="wrapper-activities">
                <div class="colors">
                    <div class="color-yellow">

                    </div>
                    <div class="color-turquese">

                    </div>
                    <div class="color-skyblue">

                    </div>
                </div>
                <div class="info-activities">
                    <div class="scheme">
                        <h1 class="tittle-activities">
                            Producto
                        </h1>
                        <span>Baño Medico</span>
                        <span>Peluqueria</span>
                        <span>Paquete 4 (baño+corte)</span>
                    </div>
                    <div class="scheme">
                        <h1 class="tittle-activities">
                            Fecha-Hora
                        </h1>
                        <span>24/02/2023 - 14:00</span>
                        <span>26/02/2023 - 18:00</span>
                        <span>01/03/2023 - 20:00</span>
                    </div>
                    <div class="scheme">
                        <h1 class="tittle-activities">
                            Precio
                        </h1>
                        <span>s./ 90.00</span>
                        <span>s./ 40.00</span>
                        <span>s./ 110.00</span>
                    </div>
                    <div class="scheme">
                        <h1 class="tittle-activities">
                            Estado
                        </h1>
                        <span id="miTexto"> Activo</span>
                        <span id="miTexto"> Inactivo</span>
                        <span id="miTexto"> Activo </span>
                    </div>
                    <div class="scheme">
                        <h1 class="tittle-activities">
                            Puntos
                        </h1>
                        <span>9 pts</span>
                        <span>4 pts</span>
                        <span>11pts </span>
                    </div>
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
                            <img id="img" src="../../imagenes/fotosperfil/cliente/<?= $value[6] ?>"
                                id=img width="95" height="89">
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






<!-- MODAL REGISTRO -->
<section class="moda  modalMascota modalMascotaAgre">
            <div class="row" id="modal-Register" style="background-image: linear-gradient(0deg, rgba(0,0,0,0.2), rgba(0,0,0,0.2)),url(../../imagenes/perroCarrusel.jpg);">
            <div class=" container">
                <div class="row header-ReMas justify-content-end">
                    <div class="row close-btn">
                        <span class="btn btn-dark modal__close" style="width: 50px;">X</span>
                    </div>
    
                    <div class="row">
                        <h3 class="mb-4"><span>Registro Mascota</span></h3>
                    </div>
                </div>
                <div class="row data">
                    <form action="../../llamadas/proceso_registromascota.php" method="post"
                        enctype="multipart/form-data">
                        <div class="data-col2">
                            <input type="text" id="nombre" class="form-control" name="nombreMascota" placeholder="Nombre">
                            <input type="date" name="fechaNac" class="form-control">
                            <input hidden value="<?= $value[7] ?>" name="idCliente">
    
                            <!-- Combo de especies -->
                            <div class="select-RaEs">
                            <select name="especie" id="especie" class="form-select" style="width: 193px;"
                                onchange="cargarRazas()">
                                <option selected>Selecciona Especie</option>
                                <?php
                                // Obtener los datos de la tabla de la base de datos
                                $queryEspecies = "SELECT * FROM especie"; // Reemplaza "tabla_especie" con el nombre de tu tabla
                                $resultEspecies = mysqli_query($conn, $queryEspecies);
    
                                // Generar las opciones del select utilizando los datos obtenidos
                                while ($rowEspecie = mysqli_fetch_assoc($resultEspecies)) {
                                    $nombreEspecie = $rowEspecie['nombre']; // Reemplaza "nombre_especie" con el nombre de columna correspondiente
                                    $valorEspecie = $rowEspecie['idespecie']; // Reemplaza "valor_especie" con el nombre de columna correspondiente
                                
                                    echo "<option value=\"$valorEspecie\">$nombreEspecie</option>";
                                }
                                ?>
                            </select>
    
                            <!-- Combo de razas -->
                            <select name="raza" id="raza" class="form-select" style="width: 193px;">
                                <option selected>Selecciona Raza</option>
                            </select>
                            </div>
    
                            <!-- JavaScript -->
                            <script>
                                function cargarRazas() {
                                    var especieSeleccionada = document.getElementById('especie').value;
    
                                    // Crear una instancia de XMLHttpRequest
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function () {
                                        if (xhr.readyState === XMLHttpRequest.DONE) {
                                            if (xhr.status === 200) {
                                                // Convertir la respuesta JSON en un objeto JavaScript
                                                var razas = JSON.parse(xhr.responseText);
    
                                                // Limpiar el combo de razas
                                                var razaSelect = document.getElementById('raza');
                                                razaSelect.innerHTML = '<option selected>Selecciona Raza</option>';
    
                                                // Generar las opciones del combo de razas utilizando los datos obtenidos
                                                // Generar las opciones del combo de razas utilizando los datos obtenidos
                                                razas.forEach(function (raza) {
                                                    var option = document.createElement('option');
                                                    option.value = raza.idraza + '-' + raza.nombre; // Concatena el id y el nombre con un guion
                                                    option.text = raza.nombre;
                                                    razaSelect.appendChild(option);
                                                });
    
                                            } else {
                                                console.log('Error al cargar las razas');
                                            }
                                        }
                                    };
    
                                    // Realizar la solicitud AJAX para obtener las razas correspondientes a la especie seleccionada
                                    xhr.open('GET', 'obtener_razas.php?idespecie=' + especieSeleccionada);
                                    xhr.send();
                                }
                            </script>
    
    
                            <div class="row-short">
                                <div class="cont-radio ip">
                                    <select name="sexo" id="sexo" value="sexo" class="form-select" style="width: 109px;">
                                        <option selected>Sexo</option>
                                        <option value="H">Hembra</option>
                                        <option value="M">Macho</option>
                                    </select>
                                </div>
                            <input type="text" class="form-control ip" name="color" placeholder="Color">
                            </div>
                            <div class="row-short">
                                <input type="text" class="form-control ip" name="peso" placeholder="Peso">
                                <input type="text" class="form-control" style="width: 109px;" id="renian" name="renian" placeholder="Renian">

                            </div>

                            
    
                            <div class="cont-radio">
                                <select name="etapa" id="etapa" value="etapa" class="form-select" style="width: 193px;">
                                    <option selected>Selecciona Etapa</option>
                                    <option value="Cria">Cría</option>
                                    <option value="Juvenil">Juvenil</option>
                                    <option value="Adulto">Adulto</option>
                                </select>
                                <div class="cont-este">
                                    <label class="form-check-label">Esterilizado:</label>
                                    <input type="radio" name="esterilizado" class="form-check-input" id="si" value="SI">
                                    <label class="form-check-label" for="si">Si</label>
                                    <input type="radio" name="esterilizado" class="form-check-input" id="no" value="NO">
                                    <label class="form-check-label" for="no">No</label>
                                </div>
                            </div>
                        </div>


                        <div class="data-col1">
                            <div class="row">
                                <input class="form-control form-control-sm" id="foto" type="file" name="foto">
                            </div>
                            <div class="row">
                                <div class="fotoPos">
                                    <div class="foto"></div>
                                </div>
                                <div class="button">
                                    <input type="submit" name="registrar" value="Registrar" class="btn">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            </div>
        </section>






<!-- MODAL EDITAR -->
<section class="moda modalMascota modalMascotaEdit">
            <div class="row" id="modal-Register" style="background-image: linear-gradient(0deg, rgba(0,0,0,0.2), rgba(0,0,0,0.2)),url(../../imagenes/perroCarrusel.jpg);">
            <div class=" container">
                <div class="row header-ReMas justify-content-end">
                    <div class="row close-btn">
                        <span class="btn btn-dark modal__close" style="width: 50px;">X</span>
                    </div>
    
                    <div class="row">
                        <h3 class="mb-4"><span>Editar Mascota</span></h3>
                    </div>
                </div>
                <div class="row data">
                    <form action="../../llamadas/proceso_registromascota.php" method="post"
                        enctype="multipart/form-data">
                        <div class="data-col2">
                            <input type="text" id="nombre" class="form-control" name="nombreMascota" placeholder="Nombre">    
                            <div class="row-short">
                                <input type="text" class="form-control ip" name="peso" placeholder="Peso">
                                <input type="text" class="form-control" style="width: 109px;" id="edad" name="edad" placeholder="Edad" disabled>
                            </div>                   
                            <div class="cont-radio">
                                <select name="etapa" id="etapa" value="etapa" class="form-select" style="width: 193px;">
                                    <option selected>Selecciona Etapa</option>
                                    <option value="Cria">Cría</option>
                                    <option value="Juvenil">Juvenil</option>
                                    <option value="Adulto">Adulto</option>
                                </select>
                                <div class="cont-este">
                                    <label class="form-check-label">Esterilizado:</label>
                                    <input type="radio" name="esterilizado" class="form-check-input" id="si" value="SI">
                                    <label class="form-check-label" for="si">Si</label>
                                    <input type="radio" name="esterilizado" class="form-check-input" id="no" value="NO">
                                    <label class="form-check-label" for="no">No</label>
                                </div>
                            </div>
                            <div class="button">
                                    <input type="submit" name="editar" value="Editar" class="btn">
                                </div>
                        </div>


                        <div class="data-col1">
                            <div class="row">
                                <input class="form-control form-control-sm" id="foto" type="file" name="foto">
                            </div>
                            <div class="row">
                                <div class="fotoPos">
                                    <div class="foto"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            </div>
        </section>
    <script src="../../js/modalMascota.js"></script>
    <script src="../../js/Modal.js"></script>
    <script src="../../js/registroNewUs.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>