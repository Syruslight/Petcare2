<?php
require('../../controlador/conexion.php');
$conn = conectar();
?>
<!--Perfil del cliente (deriva o esta incluido de su pagina principal)-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="mascotaEstilos.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    
    <title>Pagina del Cliente</title>
</head>
<body>
<div class="wrapper">
        <div class="profile">
            <div class="first-seccion">
                <div class="logo">
                    <img src="../../imagenes/perfilCliente/logo.png" alt="Logo" width="168" height="46">
                </div>
                <!--Codigo php para obtener la variable usuario-->
                <?php
                session_start();
                $email = $_SESSION['email'];
                foreach (listarCliente($email, $conn) as $key => $value) {
                    ?>
                    <img src="../../imagenes/fotosperfil/cliente/<?= $value[6] ?>" alt="profile" width="217" height="227">
                    <div class="profile-information">
                        <span class="user">
                            <?= $value[0] ?>
                            <?= $value[1] ?>
                        </span>
                        <img class="boton-modal" src="../../imagenes/perfilCliente/pencil.png" alt="pencil" width="32"
                            height="30">
                    </div>

                    <span class="id">DNI:
                        <?= $value[2] ?>
                    </span>
                </div>
                <div class="second-seccion">
                    <div class="categories">
                        <div class="icons">
                            <img src="https://img.icons8.com/ios/50/null/health-data.png" width="25" height="25" />
                            <span class="principal">Principal</span>
                        </div>
                        <div class="icons">
                            <img src="https://img.icons8.com/ios/50/null/conference-call--v1.png" width="25" height="25" />
                            <a href=""></a><span class="list">Mis mascotas</span>
                        </div>
                        <div class="icons">
                            <img src="https://img.icons8.com/ios/50/null/chat-message-sent.png" width="25" height="25" />
                            <span class="list">Productos</span>
                        </div>
                        <div class="icons">
                            <img src="https://img.icons8.com/ios/50/null/database--v1.png" width="25" height="25" />
                            <span class="list">servicios</span>
                        </div>
                        <div class="icons">
                            <img src="https://img.icons8.com/ios/50/null/appointment-reminders--v1.png" width="25"
                                height="25" />
                            <span class="list">PetiPuntos </span>
                        </div>
                        <div class="icons">
                            <img src="https://img.icons8.com/ios/50/null/settings--v1.png" width="25" height="25" />
                            <span class="list">Reserva una cita</span>
                        </div>
                        <div class="icons">
                            <img src="https://img.icons8.com/ios/50/null/help--v1.png" width="25" height="25" />
                            <span class="list">Ayuda</span>
                        </div>


                        <div class="sign-off">

                            <img src="https://img.icons8.com/ios/50/null/shutdown--v1.png" width="25" height="25" />
                            <form action="../../llamadas/proceso_cerrar_sesion.php" method="POST">
                                <button type="submit" class="list" name="">Cerrar sesión</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dash-information">
                <div class="dash-header">
                    <span class="tittle-header">
                        <?= $value[0] ?>
                        <?= $value[1] ?>
                    </span> <!--Se abre codigo php para invocar a la sesion del 'usuario'-->
                    <img src="../../imagenes/fotosperfil/cliente/<?= $value[6] ?>" alt="profile" width="38" height="39">
                </div>
                <?php
                }
                ?>


    <div class="container" id="row-tablaMascota">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Mis mascotas
                            <a href="" class="butModal btn float-end" style="background-color:#399731;">Agregar</a>
                            <a href="" class="btn float-end" style="background-color:#C01C1C">Eliminar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="six">
                            <span>Buscar: <input type="text" class="form-control" placeholder="Ingrese nombre mascota..."></span>
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
                                    <td class="toget"><img src="../../imagenes/perrito.jpg" alt="" class="dimg"></td>
                                    <td>Lola</td>
                                    <td>10/05/2021</td>
                                    <td>8</td>
                                    <td>9.5k</td>
                                    <td>Marron oscuro</td>
                                    <td class="th">Si</td>
                                    <td class="td">
                                        <a href="" class="butModalE btn btn-sm" style="background-color:#1BC5BD; color:#1D3534;">editar</a>
                                        <a href="" class="btn btn-sm" style="background-color:#1D3534; color:#1BC5BD;">Ver Carnet</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="toget"><img src="../../imagenes/perrito.jpg" alt="" class="dimg"></td>
                                    <td>Lola</td>
                                    <td>10/05/2021</td>
                                    <td>8</td>
                                    <td>9.5k</td>
                                    <td>Marron oscuro</td>
                                    <td class="th">Si</td>
                                    <td class="td">
                                        <a href="" class="butModalE btn btn-sm" style="background-color:#1BC5BD; color:#1D3534;">editar</a>
                                        <a href="" class="btn btn-sm" style="background-color:#1D3534; color:#1BC5BD;">Ver Carnet</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="toget"><img src="../../imagenes/perrito.jpg" alt="" class="dimg"></td>
                                    <td>Lola</td>
                                    <td>10/05/2021</td>
                                    <td>8</td>
                                    <td>9.5k</td>
                                    <td>Marron oscuro</td>
                                    <td class="th">Si</td>
                                    <td class="td">
                                        <a href="" class="butModalE btn btn-sm" style="background-color:#1BC5BD; color:#1D3534;">editar</a>
                                        <a href="" class="btn btn-sm" style="background-color:#1D3534; color:#1BC5BD;">Ver Carnet</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="toget"><img src="../../imagenes/perrito.jpg" alt="" class="dimg"></td>
                                    <td>Lola</td>
                                    <td>10/05/2021</td>
                                    <td>8</td>
                                    <td>9.5k</td>
                                    <td>Marron oscuro</td>
                                    <td class="th">Si</td>
                                    <td class="td">
                                        <a href="" class="butModalE btn btn-sm" style="background-color:#1BC5BD; color:#1D3534;">editar</a>
                                        <a href="" class="btn btn-sm" style="background-color:#1D3534; color:#1BC5BD;">Ver Carnet</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- Servicios -->
        <div class="row align-items-center" id="row-servicios">
            <div class="conte-servicio text-center">
                <!-- Items Servicio-->
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6 col-lg-3 card">
                        <img src="../../Imagenes/mujer-corta-perro-perro-sentado-sofa-raza-yorkshire-terrier.jpg" alt="Baño y Corte">
                        <h4 class="mt-1">Baño y Corte</h4>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 card">
                        <img src="../../Imagenes/cerca-veterinario-cuidando-perro.jpg" alt="Consultas">
                        <h4 class="mt-1">Consultas</h4>
                    </div>
                    <div class="col-12 col-md-6 col-lg-2 centxt animate__heartBeat">
                        <h4 class="mt-1"><span>Servicios 
                                        <br>Disponibles</span></h4>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 card">
                        <img src="../../Imagenes/lavar-perro-mascota-casa.jpg" alt="Enmotado">
                        <h4 class="mt-1">Baño Medicado</h4>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 card">
                        <img src="../../Imagenes/perro-negro-grande-obteniendo-procedimiento-salon-peluqueria-mujer-joven-camiseta-blanca-peinando-perro-perro-atado-mesa-azul.jpg" alt="Enmotado">
                        <h4 class="mt-1">Deslanado</h4>
                    </div>
                </div>
                <!-- Fin Items Servicio-->
            </div>
        </div>
                <div class="footer">
                    <span class="copyrigth">©</span>
                    <span> Vet&Care, todos los derechos reservados.</span>
                </div>
    
            </div>


<!-- MODAL REGISTRO -->
<section class="modalMascota">
    <div class="row" id="modal-Register" style="background-image: url(../../imagenes/perroCarrusel.jpg);"">
        <div class="container">
            <div class="row justify-content-end">
                <span class="btn btn-dark modal__close" style="width: 50px;">X</span>
            </div>

            <div class="row">
                <h3 class="mt-1 mb-4"><span>Registro Mascota</span></h3>
            </div>
            <div class="row data">
                <form action="" method="post">
                    <input type="text" id="nombre" class="form-control" name="nombre" placeholder="Nombre">
                    <input type="date" class="form-control">
                    <select name="expecie" id="especie" class="form-select" style="width: 189px;">
                        <option selected>Selecciona Especie</option>
                        <option value="si">Perro</option>
                        <option value="no">Gato</option>
                    </select>
                    <select name="raza" id="raza" class="form-select" style="width: 189px;">
                        <option selected>Selecciona Raza</option>
                        <option value="si">Pitbull</option>
                        <option value="no">Golden</option>
                    </select>
                    <input type="text" class="form-control" name="peso" placeholder="Peso">
                    <input type="text" class="form-control" name="color" placeholder="Color">
                    <div class="cont-radio">
                        <select name="etapa" id="etapa" class="form-select" style="width: 189px;">
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
<!-- MODAL EDITAR -->
<section class="modalMascotaEd">
    <div class="row" id="modal-Register" style="background-image: url(../../imagenes/perroCarrusel.jpg);"">
        <div class="container">
            <div class="row justify-content-end">
                <span class="btn btn-dark modal__closeE" style="width: 50px;">X</span>
            </div>

            <div class="row">
                <h3 class="mt-1 mb-4"><span>Editar Mascota</span></h3>
            </div>
            <div class="row data">
                <form action="" method="post">
                    <input type="text" id="nombre" class="form-control" name="nombre" placeholder="Nombre">
                    <input type="date" class="form-control">
                    <select name="expecie" id="especie" class="form-select" style="width: 189px;">
                        <option selected>Selecciona Especie</option>
                        <option value="si">Perro</option>
                        <option value="no">Gato</option>
                    </select>
                    <select name="raza" id="raza" class="form-select" style="width: 189px;">
                        <option selected>Selecciona Raza</option>
                        <option value="si">Pitbull</option>
                        <option value="no">Golden</option>
                    </select>
                    <input type="text" class="form-control" name="peso" placeholder="Peso">
                    <input type="text" class="form-control" name="color" placeholder="Color">

                    <div class="cont-radio">
                        <select name="etapa" id="etapa" class="form-select" style="width: 189px;">
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
<!-- Modal Editar Cliente -->
<section class="modal">
        <div class="modal__container">
            <div class="cuadro_modal">
                <div class="top-form">
                    <div id="close-modal">
                        &#10006
                    </div>
                </div>
                <div class="form-wrapper logeo">
                            <form action="llamadas/proceso_logeoportipo.php">
                            <div class="modal__profile">
                    <img src="../../imagenes/perfilCliente/profile.png" class="modal__img" width="95" height="89">
                    <img class="" src="../../imagenes/perfilCliente/pencil.png" width="32" height="30">
                </div>
                <span class="modal__user">
                    <?= $_SESSION['usuario'] ?>
                </span>
            </div>
            <div class="modal__data">
                <div class="moda__info">
                    <span>Nombre</span>
                    <input type="text" name="nombre" value="John Doe">
                </div>
                <div class="moda__info">
                    <span>Telefono</span>
                    <input type="text" name="nombre" value="John Doe">
                </div>
                <div class="moda__info">
                    <span>Direccion</span>
                    <input type="text" name="nombre" value="John Doe">
                </div>
            </div>
            <button class="modal__button">Actualizar Datos</button>
        </div>
    </section>
    </section>


    <script src="../../js/Modal.js"></script>
    <script src="/js/modalMascota.js"></script>
    <script src="../../../js/modalMascota.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b9a2b0c154.js" crossorigin="anonymous"></script>
</body>
</html>