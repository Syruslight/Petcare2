<?php
require('../../controlador/conexion.php');
$conn = conectar();
?>
<?php
session_start();
$email = $_SESSION['email'];
foreach (listarCliente($email, $conn) as $key => $value) {
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
                                    <span>Buscar: <input type="text" class="form-control"
                                            placeholder="Ingrese nombre mascota..."></span>
                                </div>
                                <table class="table table-borderless table-striped table-responsive text-center">
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
                                    <tbody>
                                        <tr>
                                            <td class="toget"><img src="../../imagenes/perrito.jpg" alt="" class="dimg">
                                            </td>
                                            <td>Lola</td>
                                            <td>10/05/2021</td>
                                            <td>8</td>
                                            <td>9.5k</td>
                                            <td>Marron oscuro</td>
                                            <td class="th">Si</td>
                                            <td class="td">
                                                <a href="" class="butModal btn btn-sm" data-modal=".modalMascotaEdit"
                                                    style="background-color:#1BC5BD; color:#1D3534;">editar</a>
                                                <a href="" class="butModal btn btn-sm" data-modal=".modalMascotaCarne"
                                                    style="background-color:#1D3534; color:#1BC5BD;">Ver Carnet</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="toget"><img src="../../imagenes/perrito.jpg" alt="" class="dimg">
                                            </td>
                                            <td>Lola</td>
                                            <td>10/05/2021</td>
                                            <td>8</td>
                                            <td>9.5k</td>
                                            <td>Marron oscuro</td>
                                            <td class="th">Si</td>
                                            <td class="td">
                                                <a href="" class="butModalE btn btn-sm" data-modal=".modalMascotaEdit"
                                                    style="background-color:#1BC5BD; color:#1D3534;">editar</a>
                                                <a href="" class="btn btn-sm"
                                                    style="background-color:#1D3534; color:#1BC5BD;">Ver Carnet</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="toget"><img src="../../imagenes/perrito.jpg" alt="" class="dimg">
                                            </td>
                                            <td>Lola</td>
                                            <td>10/05/2021</td>
                                            <td>8</td>
                                            <td>9.5k</td>
                                            <td>Marron oscuro</td>
                                            <td class="th">Si</td>
                                            <td class="td">
                                                <a href="" class="butModalE btn btn-sm" data-modal=".modalMascotaEdit"
                                                    style="background-color:#1BC5BD; color:#1D3534;">editar</a>
                                                <a href="" class="btn btn-sm"
                                                    style="background-color:#1D3534; color:#1BC5BD;">Ver Carnet</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="toget"><img src="../../imagenes/perrito.jpg" alt="" class="dimg">
                                            </td>
                                            <td>Lola</td>
                                            <td>10/05/2021</td>
                                            <td>8</td>
                                            <td>9.5k</td>
                                            <td>Marron oscuro</td>
                                            <td class="th">Si</td>
                                            <td class="td">
                                                <a href="" class="butModalE btn btn-sm" data-modal=".modalMascotaEdit"
                                                    style="background-color:#1BC5BD; color:#1D3534;">editar</a>
                                                <a href="" class="btn btn-sm"
                                                    style="background-color:#1D3534; color:#1BC5BD;">Ver Carnet</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="toget"><img src="../../imagenes/perrito.jpg" alt="" class="dimg">
                                            </td>
                                            <td>Lola</td>
                                            <td>10/05/2021</td>
                                            <td>8</td>
                                            <td>9.5k</td>
                                            <td>Marron oscuro</td>
                                            <td class="th">Si</td>
                                            <td class="td">
                                                <a href="" class="butModalE btn btn-sm" data-modal=".modalMascotaEdit"
                                                    style="background-color:#1BC5BD; color:#1D3534;">editar</a>
                                                <a href="" class="btn btn-sm"
                                                    style="background-color:#1D3534; color:#1BC5BD;">Ver Carnet</a>
                                            </td>
                                        </tr>
                                    </tbody>
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


        <!-- MODAL REGISTRO -->
        <section class="moda modalMascota modalMascotaAgre">
            <div class="row" id="modal-Register" style="background-image: linear-gradient(0deg, rgba(0,0,0,0.2), rgba(0,0,0,0.2)),url(../../imagenes/perroCarrusel.jpg);"">
            <div class=" container">
                <div class="row justify-content-end">
                    <span class="btn btn-dark modal__close" style="width: 50px;">X</span>
                </div>

                <div class="row">
                    <h3 class="mt-1 mb-4"><span>Registro Mascota</span></h3>
                </div>
                <div class="row data">
                    <form action="../../llamadas/proceso_registromascota.php" method="post"
                        enctype="multipart/form-data">
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
                        <input type="text" class="form-control ip" name="peso" placeholder="Peso">
                        <input type="text" class="form-control ip" name="color" placeholder="Color">
                        </div>
                        <input type="text" class="form-control" id="renian" name="renian" placeholder="Renian">
                        

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
                    </form>
                </div>

            </div>
            </div>
        </section>
    <!-- MODAL EDITAR -->
    <section class="moda modalMascotaEd modalMascotaEdit">
        <div class="row" id="modal-Register" style="background-image: linear-gradient(0deg, rgba(0,0,0,0.2), rgba(0,0,0,0.2)),url(../../imagenes/perroCarrusel.jpg);"">
        <div class=" container">
            <div class="row justify-content-end">
                <span class="btn btn-dark modal__close" style="width: 50px;">X</span>
            </div>

            <div class="row">
                <h3 class="mt-1 mb-4"><span>Editar Mascota</span></h3>
            </div>
            <div class="row data">
                <form action="" method="post">
                    <input type="text" id="nombre" class="form-control" name="nombre" placeholder="Nombre">
                    <input type="date" class="form-control">
                    <select name="expecie" id="especie" class="form-select" style="width: 193px;">
                        <option selected>Selecciona Especie</option>
                        <option value="si">Perro</option>
                        <option value="no">Gato</option>
                    </select>
                    <select name="raza" id="raza" class="form-select" style="width: 193px;">
                        <option selected>Selecciona Raza</option>
                        <option value="si">Pitbull</option>
                        <option value="no">Golden</option>
                    </select>
                    <input type="text" class="form-control" name="peso" placeholder="Peso">
                    <input type="text" class="form-control" name="color" placeholder="Color">

                    <div class="cont-radio">
                        <select name="etapa" id="etapa" class="form-select" style="width: 193px;">
                            <option selected>Selecciona Etapa</option>
                            <option value="si">Cría</option>
                            <option value="si">Juvenil</option>
                            <option value="no">Adulto</option>
                        </select>
                        <div class="cont-este">
                            <label class="form-check-label">Esterilizado:</label>
                            <input type="radio" name="esteri" class="form-check-input" id="si">
                            <label class="form-check-label" for="si">Si</label>
                            <input type="radio" name="esteri" class="form-check-input" id="no">
                            <label class="form-check-label" for="no">No</label>
                        </div>

                    </div>
                    <div class="row">
                        <input class="form-control form-control-sm" id="foto" type="file" name="foto">

                    </div>

                </form>
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
        </div>
    </section>

    <!-- Modal Masacota Carnet -->
    <section class="moda modalMascota modalMascotaCarne">
        <div class="row modal-SaludMascota" id="modal-Carnet">
            <div class="container">
                <div class="row justify-content-end">
                    <span class="modal__close btn btn-dark " style="width: 50px;">X</span>
                </div>
                <div class="row" style="width:100%; height: 88%">
                    <div class="card-mascota">
                        <div class="card">
                                <h5 class="card-title">
                                    Colita
                                </h5>
                            <div class="img-card">
                                <img src="../../imagenes/perrito.jpg" alt="" class="card-img-bottom img">
                            </div>
                            <div class="card-body">
                                <span class="card-text">
                                    <ul class="list-unstyled"> 
                                        <li>Edad: <span>2año(s)</span></li>
                                        <li>Sexo: <span>Hembra</span></li>
                                        <li>Peso: <span>12(kg)</span></li>
                                        <li>Raza: <span>Pastor Aleman</span></li>
                                        <li>Esterilizado: <span>Si</span></li>
                                    </ul>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="card-carnet">                       
                        <div class="row carnet-tit">
                            <h1>CARNET DE SALUD</h1>
                        </div>
                    <div class="container-carnet">
                        <div class="card carnet-data">
                            <div class="row header-tabla">
                                <img src="../../imagenes/PHlogo.png" alt="logo" class="col">
                                <span class="col" style="color: #ffffff;">Mis vacunas</span>
                                <img src="../../imagenes/PHlogo.png" alt="logo" class="col">
                            </div>
                            <div class="row carnet-tabla">
                                <div class="row table-data">
                                    <table class="table table-borderless table-striped table-responsive text-center">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Fecha</th>
                                                    <th scope="col">Lote</th>
                                                    <th scope="col">Tipo</th>
                                                    <th scope="col">Proxima</th>
                                                    <th scope="col" class="th">Observación</th>
                                                    <th scope="col" class="th">Restricción</th>
                                                </tr>
                                            </thead>
                                        <tbody>
                                            <tr>
                                                <td>10/05/2021</td>
                                                <td>COVId</td>
                                                <td>10/05/2021</td>
                                                <td>15/05/2021</td>
                                                <td>Lleva una receta para comida</td>
                                                <td class="th">No pasear por lodo</td>
                                            </tr>
                                            <tr>
                                                <td>10/05/2021</td>
                                                <td>COVId</td>
                                                <td>10/05/2021</td>
                                                <td>15/05/2021</td>
                                                <td>Lleva una receta para comida</td>
                                                <td class="th">No pasear por lodo</td>
                                            </tr>
                                            <tr>
                                                <td>10/05/2021</td>
                                                <td>COVId</td>
                                                <td>10/05/2021</td>
                                                <td>15/05/2021</td>
                                                <td>Lleva una receta para comida</td>
                                                <td class="th">No pasear por lodo</td>
                                            </tr>
                                            <tr>
                                                <td>10/05/2021</td>
                                                <td>COVId</td>
                                                <td>10/05/2021</td>
                                                <td>15/05/2021</td>
                                                <td>Lleva una receta para comida</td>
                                                <td class="th">No pasear por lodo</td>
                                            </tr>
                                            <tr>
                                                <td>10/05/2021</td>
                                                <td>COVId</td>
                                                <td>10/05/2021</td>
                                                <td>15/05/2021</td>
                                                <td>Lleva una receta para comida</td>
                                                <td class="th">No pasear por lodo</td>
                                            </tr>
                                            <tr>
                                                <td>10/05/2021</td>
                                                <td>COVId</td>
                                                <td>10/05/2021</td>
                                                <td>15/05/2021</td>
                                                <td>Lleva una receta para comida</td>
                                                <td class="th">No pasear por lodo</td>
                                            </tr>
                                            <tr>
                                                <td>10/05/2021</td>
                                                <td>COVId</td>
                                                <td>10/05/2021</td>
                                                <td>15/05/2021</td>
                                                <td>Lleva una receta para comida</td>
                                                <td class="th">No pasear por lodo</td>
                                            </tr>
                                            <tr>
                                                <td>10/05/2021</td>
                                                <td>COVId</td>
                                                <td>10/05/2021</td>
                                                <td>15/05/2021</td>
                                                <td>Lleva una receta para comida</td>
                                                <td class="th">No pasear por lodo</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>   
                </div>                
                </div> 
            </div>
        </div>
</section>




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



    <script src="../../js/Modal.js"></script>
    <script src="../../js/modalMascota.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b9a2b0c154.js" crossorigin="anonymous"></script>
</body>

</html>