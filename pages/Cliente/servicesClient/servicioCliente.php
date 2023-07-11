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
    <link rel="stylesheet" href='servicioCliente.css'>
    <link rel="stylesheet" href='../editAdministrador/editModalAdministrador.css'>
    <script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <title>Pagina de administrador</title>


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
            <div class="title-service">
                <h1>Catalogo de servicio </h1>
            </div>

            <div class="wrapper-service">
                <div class="header-table">
                    <div class="search-service">
                        <img class="image-search" src="../../../imagenes/perfilCliente/search.svg" />
                        <input class="input-search" type="search" name="buscarServicio" placeholder="" id="busqueda">
                    </div>
                    <span class="spancitoo"> Especie:</span>
                    <div class="select-service">
                        <select name="select">
                            <option value="value1">Perros (48)</option>
                            <option value="value2" selected>Gatos (48)</option>
                            <option value="value3">Conejos (48)</option>
                        </select>
                    </div>
                </div>
                <div class="wrapper-cardService">
                    <div class="cards-service">
                        <div class="image-card">
                            <img class="card-imageService" src="../../../imagenes/perfilCliente/serviceDog.png" />
                        </div>
                        <div class="info-card">
                            <h1 class="title-cardService">Servicio de Baño</h1>
                            <div class="price-time">
                                <span class="price">Precio: <span class="duration">s/45.00</span></span>
                                <span class="price">Duracion: <span class="duration">45 min</span> </span>
                            </div>
                            <div class="after-text">
                                <span class="text-cardService">Este servicio se basa en el baño usando shampoo,
                                    acondiconardor, crema para un mejor cuidado del pelaje canino</span>
                            </div>
                            <button onclick="openModalReservarServicio()" class="reserve-service">Reservar</button>
                        </div>
                    </div>
                    <div class="cards-service">
                        <div class="image-card">
                            <img class="card-imageService" src="../../../imagenes/perfilCliente/serviceDog.png" />
                        </div>
                        <div class="info-card">
                            <h1 class="title-cardService">Servicio de Baño</h1>
                            <div class="price-time">
                                <span class="price">Precio: <span class="duration">s/45.00</span></span>
                                <span class="price">Duracion: <span class="duration">45 min</span> </span>
                            </div>
                            <div class="after-text">
                                <span class="text-cardService">Este servicio se basa en el baño usando shampoo,
                                    acondiconardor, crema para un mejor cuidado del pelaje canino</span>
                            </div>
                            <button onclick="openModalReservarServicio()" class="reserve-service">Reservar</button>
                        </div>
                    </div>
                    <div class="cards-service">
                        <div class="image-card">
                            <img class="card-imageService" src="../../../imagenes/perfilCliente/serviceDog.png" />
                        </div>
                        <div class="info-card">
                            <h1 class="title-cardService">Servicio de Baño</h1>
                            <div class="price-time">
                                <span class="price">Precio: <span class="duration">s/45.00</span></span>
                                <span class="price">Duracion: <span class="duration">45 min</span> </span>
                            </div>
                            <div class="after-text">
                                <span class="text-cardService">Este servicio se basa en el baño usando shampoo,
                                    acondiconardor, crema para un mejor cuidado del pelaje canino</span>
                            </div>
                            <button class="reserve-service">Reservar</button>
                        </div>
                    </div>
                    <div class="cards-service">
                        <div class="image-card">
                            <img class="card-imageService" src="../../../imagenes/perfilCliente/serviceDog.png" />
                        </div>
                        <div class="info-card">
                            <h1 class="title-cardService">Servicio de Baño</h1>
                            <div class="price-time">
                                <span class="price">Precio: <span class="duration">s/45.00</span></span>
                                <span class="price">Duracion: <span class="duration">45 min</span> </span>
                            </div>
                            <div class="after-text">
                                <span class="text-cardService">Este servicio se basa en el baño usando shampoo,
                                    acondiconardor, crema para un mejor cuidado del pelaje canino</span>
                            </div>
                            <button class="reserve-service">Reservar</button>
                        </div>
                    </div>
                    <div class="cards-service">
                        <div class="image-card">
                            <img class="card-imageService" src="../../../imagenes/perfilCliente/serviceDog.png" />
                        </div>
                        <div class="info-card">
                            <h1 class="title-cardService">Servicio de Baño</h1>
                            <div class="price-time">
                                <span class="price">Precio: <span class="duration">s/45.00</span></span>
                                <span class="price">Duracion: <span class="duration">45 min</span> </span>
                            </div>
                            <div class="after-text">
                                <span class="text-cardService">Este servicio se basa en el baño usando shampoo,
                                    acondiconardor, crema para un mejor cuidado del pelaje canino</span>
                            </div>
                            <button class="reserve-service">Reservar</button>
                        </div>
                    </div>
                    <div class="cards-service">
                        <div class="image-card">
                            <img class="card-imageService" src="../../../imagenes/perfilCliente/serviceDog.png" />
                        </div>
                        <div class="info-card">
                            <h1 class="title-cardService">Servicio de Baño</h1>
                            <div class="price-time">
                                <span class="price">Precio: <span class="duration">s/45.00</span></span>
                                <span class="price">Duracion: <span class="duration">45 min</span> </span>
                            </div>
                            <div class="after-text">
                                <span class="text-cardService">Este servicio se basa en el baño usando shampoo,
                                    acondiconardor, crema para un mejor cuidado del pelaje canino</span>
                            </div>
                            <button class="reserve-service">Reservar</button>
                        </div>
                    </div>
                    <div class="cards-service">
                        <div class="image-card">
                            <img class="card-imageService" src="../../../imagenes/perfilCliente/serviceDog.png" />
                        </div>
                        <div class="info-card">
                            <h1 class="title-cardService">Servicio de Baño</h1>
                            <div class="price-time">
                                <span class="price">Precio: <span class="duration">s/45.00</span></span>
                                <span class="price">Duracion: <span class="duration">45 min</span> </span>
                            </div>
                            <div class="after-text">
                                <span class="text-cardService">Este servicio se basa en el baño usando shampoo,
                                    acondiconardor, crema para un mejor cuidado del pelaje canino</span>
                            </div>
                            <button class="reserve-service">Reservar</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>









    <section class="modalReservar">
        <div class="modalReservar__container">
            <div class="cuadro_modalReservar">
                <div class="top-formReservar">
                    <div class="tituloReservar">
                        <h1>Reservar cita</h1>
                    </div>
                    <div id="CloseModalReservar">
                        &#10006
                    </div>
                </div>
                <div class="container">

                    <div class="progress-bar">
                        <div class="step">
                            <p>Paso 1</p>
                            <div class="bullet">
                                <span>1</span>
                            </div>
                            <div class="check fas fa-check"></div>
                        </div>
                        <div class="step">
                            <p>Paso 2</p>
                            <div class="bullet">
                                <span>2</span>
                            </div>
                            <div class="check fas fa-check"></div>
                        </div>
                        <div class="step">
                            <p>Paso 3</p>
                            <div class="bullet">
                                <span>3</span>
                            </div>
                            <div class="check fas fa-check"></div>
                        </div>

                    </div>
                    <div class="form-outer">
                        <!--Formulario para registrar usuario nuevo-->
                        <form method="post" enctype="multipart/form-data">
                            <!--Se realizan 4 divisiones-->
                            <div class="page slide-page">
                                <div class="wrapper-reservar">
                                    <div class="part-upReser">
                                        <div class="info-upReser">
                                            <h1 class="title-Reserva">Servicio de Baño medicado</h1>
                                            <div class="wrapper-textReser">
                                                <span class="text-infoRese">Precio: <span
                                                        class="result-rese">S/.45.00</span></span>
                                                <span class="text-infoRese">Duracion: <span
                                                        class="result-rese">60mims</span></span>
                                            </div>
                                            <span class="info-textRese">
                                                Este servicio se basa en el baño usando shampoo, acondiconardor, crema
                                                para un mejor cuidado del pelaje canino
                                            </span>
                                        </div>
                                        <div class="image-upReser">
                                            <img src="../../../imagenes/perfilCliente/reservaDog.png" alt="perritoDucha"
                                                width="143px" height="83px">
                                        </div>
                                    </div>
                                    <div class="part-downReser">
                                        <div class="wrapper-downReser1">
                                            <div class="wrapper-selectReser">
                                                <span class="subtitle-reser">Mascota</span>
                                                <select name="select" class="select-reser">
                                                    <option value="value1">xxxxxs</option>
                                                    <option value="value2" selected>Seleccionar</option>
                                                    <option value="value3">Conejos (48)</option>
                                                </select>
                                            </div>
                                            <div class="wrapper-selectReser">
                                                <span class="subtitle-reser">Dia de reserva</span>
                                                <select name="select" class="select-reser">
                                                    <option value="value1">xxxxxs</option>
                                                    <option value="value2" selected>Lunes- 29 de Julio 2023</option>
                                                    <option value="value3">Cxxxdzdsds</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="wrapper-downReser1">
                                            <div class="wrapper-selectReser">
                                                <span class="subtitle-reser">Veterinario</span>
                                                <select name="select" class="select-reser">
                                                    <option value="value1">xxxxxs</option>
                                                    <option value="value2" selected>Seleccionar</option>
                                                    <option value="value3">Conejos (48)</option>
                                                </select>
                                            </div>
                                            <div class="wrapper-selectReser">
                                                <span class="subtitle-reser">Tiempo de servicio</span>
                                                <select name="select" class="select-reser">
                                                    <option value="value1">xxxxxs</option>
                                                    <option value="value2" selected> </option>
                                                    <option value="value3">Cxxxdzdsds</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="field">
                                    <button class="firstNext next">Siguiente</button>
                                </div>
                            </div>
                            <div class="page">
                                <div class="wrapper-payment">
                                    <div class="method-payment">
                                        <div class="fisrt-methodPay">
                                            <button class="text-methodPay1">PAGA CON YAPE</button>
                                            <img src="../../../imagenes/perfilCliente/yape.png" alt="Yape" width="48px"
                                                height="48px">
                                        </div>
                                        <div class="second-methodPay">
                                            <button class="text-methodPay2">PAGA CON PLIN</button>
                                            <img src="../../../imagenes/perfilCliente/plin.png" alt="Plin" width="48px"
                                                height="48px">
                                        </div>
                                    </div>
                                    <div class="image-payment">
                                        <img id="payment-image" src="../../../imagenes/perfilCliente/methodPayment.png"
                                            alt="" width="400px" height="160px">
                                    </div>
                                </div>


                                <div class="field btns">
                                    <button class="prev-1 prev">Atrás</button>
                                    <button class="next-1 next">Siguiente</button>
                                </div>
                            </div>
                            <div class="page">
                                <div class="wrapper-confirmation">
                                    <span class="text-confirmation">Por favor subir el comprobante de pago</span>
                                    <div class="upload-confirmation">
                                        <img src="../../../imagenes/perfilCliente/sendConfirmation.png" alt=""
                                            width="400px" height="210px">
                                        <!-- <div class="upload-only">
                    <span class="text-upload">Subir foto</span>
                </div> -->
                                    </div>
                                </div>
                                <div class="field btns">
                                    <button class="prev-2 prev">Atrás</button>
                                    <button class="submit">Enviar</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>












    <script>
  const yapeButton = document.querySelector('.text-methodPay1');
  const plinButton = document.querySelector('.text-methodPay2');
  const paymentImage = document.getElementById('payment-image');

  yapeButton.addEventListener('click', function(event) {
    event.preventDefault(); // Evita el envío del formulario
    paymentImage.src = '../../../imagenes/perfilCliente/yape.png';
    paymentImage.alt = 'Yape';
  });

  plinButton.addEventListener('click', function(event) {
    event.preventDefault(); // Evita el envío del formulario
    paymentImage.src = '../../../imagenes/perfilCliente/plin.png';
    paymentImage.alt = 'Plin';
  });
</script>


    <script>
        function openModalReservarServicio() {
            const openModal = document.querySelector(".reserve-service");
            const modal = document.querySelector(".modalReservar");
            const closeModal = document.querySelector("#CloseModalReservar");
            openModal.addEventListener("click", (e) => {
                e.preventDefault();
                modal.classList.add("modalReservar--show");
            });
            closeModal.addEventListener("click", (e) => {
                e.preventDefault();
                modal.classList.remove("modalReservar--show");
            });
        }
    </script>

    <script src="../../../js/reservarCItaMulti.js"></script>
</body>

</html>