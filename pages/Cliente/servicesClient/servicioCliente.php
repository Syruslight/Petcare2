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
    <link rel="stylesheet" href='../components/navListCliente.css'>
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
                    <?php
                    $servicios = listarServicios($conn); // Obtén los servicios de la base de datos
                    
                    foreach ($servicios as $servicio) {
                        $idproductoservicio = $servicio['idproductoservicio']; // Obtén el ID del servicio actual
                        $toggleID = 'switch' . $idproductoservicio; // ID del elemento del toggle
                        $statusID = 'status' . $idproductoservicio; // ID del elemento del texto de estado
                        ?>
                        <div class="cards-service">
                            <div class="image-card">
                                <img class="card-imageService"
                                    src="../../../imagenes/productos_servicios/servicios/<?php echo $servicio['foto']; ?>" />
                            </div>
                            <div class="info-card">
                                <h1 class="title-cardService"><?php echo $servicio['idproductoservicio']; ?></h1>
                                <h1 class="title-cardService"><?php echo $servicio['nombre']; ?></h1>
                                <div class="price-time">
                                    <span class="price">Precio: <span class="duration"><?php echo $servicio['precio']; ?></span></span>
                                    <span class="price">Duracion: <span class="duration">60 minutos</span> </span>
                                </div>
                                <div class="after-text">
                                    <span class="text-cardService"><?php echo $servicio['descripcion']; ?></span>
                                </div>
                                <button data-id="<?php echo $servicio['idproductoservicio']; ?>"
                                    data-nombre="<?php echo $servicio['nombre']; ?>"
                                    data-precio="<?php echo $servicio['precio']; ?>"
                                    data-descripcion="<?php echo $servicio['descripcion']; ?>"
                                    data-foto="<?php echo $servicio['foto']; ?>" onclick="openModal(this)"
                                    class="reserve-service">Reservar</button>


                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>

            <?php
            include('../components/footerCliente.php');
            ?>
        </div>







        <section id="modalReservar" class="modalReservar">
            <div class="modalReservar__container">
                <div class="cuadro_modalReservar">
                    <div class="top-formReservar">
                        <div class="tituloReservar">
                            <h1>Reservar cita</h1>
                        </div>
                        <div id="CloseModalReservar">
                            &#10006;
                        </div>
                    </div>
                    <div class="containerModalService">

                        <div class="progress-bar">
                            <div class="progress" id="myProgress">
                                <div class="progress-value" id="myBar"></div>
                            </div>
                        </div>


                        <form id="multipasos-form" method="post" enctype="multipart/form-data">
                            <div class="step active" id="step1">
                                <div class="wrapper-reservar">
                                    <div class="part-upReser">
                                        <div class="info-upReser">
                                            <h1 class="title-Reserva" id="resultadoNombre"></h1>
                                            <div class="wrapper-textReser">
                                                <span class="text-infoRese">Precio: <span class="result-rese"
                                                        id="resultadoPrecio"></span></span>
                                                <span class="text-infoRese">Duracion: <span class="result-rese">60
                                                        minutos</span></span>
                                            </div>
                                            <span class="info-textRese" id="resultadoDescripción"></span>
                                        </div>

                                        <div class="image-upReser">
                                            <img id="resultadoFoto" src="" alt="perritoDucha" width="143px"
                                                height="83px">
                                        </div>
                                    </div>
                                    <div class="part-downReser">
                                        <div class="wrapper-downReser1">
                                            <?php
                                            // Realizar la consulta a la base de datos para obtener las mascotas del cliente
                                            $idCliente = $value[7]; // Obtén el idcliente acumulado en el value[7]
                                            $query = "SELECT idmascota, nombre FROM mascota WHERE idcliente = $idCliente";
                                            $result = mysqli_query($conn, $query);

                                            // Verificar si se encontraron mascotas para el cliente
                                            if (mysqli_num_rows($result) > 0) {
                                                // Generar las opciones del select con los datos de las mascotas
                                                echo '<div class="wrapper-selectReser">
                                                <span class="subtitle-reser">Mascota</span>
                                                <select name="select" class="select-reser">';
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $idMascota = $row['idmascota'];
                                                    $nombreMascota = $row['nombre'];
                                                    echo "<option value='$idMascota'>$nombreMascota</option>";
                                                }
                                                echo '</select>
                                            </div>';
                                            } else {
                                                // Si no se encontraron mascotas para el cliente, mostrar un mensaje alternativo o una opción por defecto
                                                echo '<div class="wrapper-selectReser">
                                                    <span class="subtitle-reser">Mascota</span>
                                                    <select name="select" class="select-reser">
                                                    <option value="">No se encontraron mascotas</option>
                                                    </select>
                                                </div>';
                                            }
                                            ?>

<?php


$fechasQuery = "SELECT DISTINCT fecha FROM horario WHERE estado != 1 order by fecha desc";
$fechasResult = mysqli_query($conn, $fechasQuery);

// Verificar si se encontraron fechas
if (mysqli_num_rows($fechasResult) > 0) {
    echo '<div class="wrapper-selectReser">
            <span class="subtitle-reser">Dia de reserva</span>
            <select name="selectFecha" class="select-reser" onchange="mostrarFechaSeleccionada(this)">
              <option value="">Seleccionar fecha</option>'; // Opción por defecto
    while ($fechaRow = mysqli_fetch_assoc($fechasResult)) {
        $fecha = date('d/m/Y', strtotime($fechaRow['fecha']));
        echo "<option value='$fechaRow[fecha]'>$fecha</option>";

    }
    echo '</select>
          </div></div>';



          echo '<div class="wrapper-downReser1"><div class="wrapper-selectReser">
          <span class="subtitle-reser">Veterinario</span>
          <select name="selectVeterinario"  onchange ="mostrarVeterinarioSeleccionado(this)" id="selectVeterinario" class="select-reser">';
     
  echo '</select>
          </div>';
  
  echo '<div class="wrapper-selectReser">
          <span class="subtitle-reser">Tiempo de servicio</span>
          <select name="selectTiempoServicio" id="selectTiempoServicio" class="select-reser">';
     
  echo '</select>
          </div></div>';
  

   
}
?>



                                       

                                    </div>
                                </div>
                                <div class="button-container">
                                    <button type="button" onclick="nextStep(1)">Siguiente</button>
                                </div>
                            </div>
                            <div class="step" id="step2">
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

                                <div class="button-container">
                                    <button type="button" onclick="prevStep(2)">Anterior</button>
                                    <button type="button" onclick="nextStep(2)">Siguiente</button>
                                </div>
                            </div>
                            <div class="step" id="step3">
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
                                <div class="button-container">
                                    <button type="button" onclick="prevStep(3)">Anterior</button>
                                    <button type="submit">Enviar</button>
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

        yapeButton.addEventListener('click', function (event) {
            event.preventDefault(); // Evita el envío del formulario
            paymentImage.src = '../../../imagenes/yapeQrPet&Care.png';
            paymentImage.alt = 'Yape';
        });

        plinButton.addEventListener('click', function (event) {
            event.preventDefault(); // Evita el envío del formulario
            paymentImage.src = '../../../imagenes/plinQrPet&Care.jpg';
            paymentImage.alt = 'Plin';
        });
    </script>


    <script>
        function openModal(button) {
            // Obtener los atributos del botón
            var idproductoservicio = button.dataset.id;
            var nombre = button.dataset.nombre;
            var precio = button.dataset.precio;
            var descripcion = button.dataset.descripcion;
            var foto = button.dataset.foto;

            // Actualizar los elementos con los atributos del servicio
            document.getElementById('resultadoNombre').textContent = nombre;
            document.getElementById('resultadoPrecio').textContent = precio;
            document.getElementById('resultadoDescripción').textContent = descripcion;
            document.getElementById('resultadoFoto').src = "../../../imagenes/productos_servicios/servicios/" + foto;

            // Abrir el modal
            var modal = document.getElementById("modalReservar");
            modal.style.display = "block";
        }
        function closeModal() {
            var modal = document.getElementById("modalReservar");
            modal.style.display = "none";
        }

        var closeIcon = document.getElementById("CloseModalReservar");
        closeIcon.addEventListener("click", closeModal);

        window.addEventListener("click", function (event) {
            var modal = document.getElementById("modalReservar");
            if (event.target === modal) {
                closeModal();
            }
        });


    </script>


    <script>
        function setProgress(progress) {
            var progressBar = document.getElementById("myBar");
            progressBar.style.width = progress + "%";

            if (progress >= 100) {
                progressBar.parentElement.classList.add("complete");
            } else {
                progressBar.parentElement.classList.remove("complete");
            }
        }

        // Ejemplo de uso
        setProgress(50); // Establece el progreso al 50%

    </script>

<script>
    var fechaSeleccionada
function mostrarFechaSeleccionada(select) {
   fechaSeleccionada = select.value;
  alert("Fecha seleccionada: " + fechaSeleccionada);

  // Realiza una nueva solicitud AJAX para obtener los veterinarios disponibles en la fecha seleccionada
  fetch('obtener_veterinarios.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded'
    },
    body: 'fechaSeleccionada=' + fechaSeleccionada
  })
    .then(response => response.text())
    .then(data => {
      var selectVeterinario = document.getElementById('selectVeterinario');
      selectVeterinario.innerHTML = data;
    })
    .catch(error => {
      console.log('Error: ', error);
    });
}
function mostrarVeterinarioSeleccionado(select) {
  var veterinarioSeleccionado = select.value;
  alert("Veterinario seleccionado: " + veterinarioSeleccionado + "fecha :" + fechaSeleccionada);

  // Realiza una nueva solicitud AJAX para obtener los horarios disponibles del veterinario seleccionado
  fetch('obtener_horarios.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded'
    },
    body: 'veterinarioSeleccionado=' + veterinarioSeleccionado
  })
    .then(response => response.text())
    .then(data => {
      var selectTiempoServicio = document.getElementById('selectTiempoServicio');
      selectTiempoServicio.innerHTML = data;
    })
    .catch(error => {
      console.log('Error: ', error);
    });
}

</script>


    <script src="../../../js/reservarCItaMulti.js"></script>
</body>

</html>