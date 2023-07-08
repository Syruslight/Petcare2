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
    <div  class="dash-information">
    <?php
            include('../components/headerCliente.php');
            ?>
        <div class="title-service">
            <h1 >Catalogo  de servicio </h1>
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
                            <span class="text-cardService">Este servicio se basa en el baño usando shampoo, acondiconardor, crema para un mejor cuidado del pelaje canino</span>
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
                            <span class="text-cardService">Este servicio se basa en el baño usando shampoo, acondiconardor, crema para un mejor cuidado del pelaje canino</span>
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
                            <span class="text-cardService">Este servicio se basa en el baño usando shampoo, acondiconardor, crema para un mejor cuidado del pelaje canino</span>
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
                            <span class="text-cardService">Este servicio se basa en el baño usando shampoo, acondiconardor, crema para un mejor cuidado del pelaje canino</span>
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
                            <span class="text-cardService">Este servicio se basa en el baño usando shampoo, acondiconardor, crema para un mejor cuidado del pelaje canino</span>
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
                            <span class="text-cardService">Este servicio se basa en el baño usando shampoo, acondiconardor, crema para un mejor cuidado del pelaje canino</span>
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
                            <span class="text-cardService">Este servicio se basa en el baño usando shampoo, acondiconardor, crema para un mejor cuidado del pelaje canino</span>
                        </div>
                        <button class="reserve-service">Reservar</button>
                    </div>
                </div>
           
            </div>
        </div>
    </div>
</div>
  
</body>

</html>