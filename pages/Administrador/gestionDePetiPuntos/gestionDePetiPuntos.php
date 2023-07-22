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
    <link rel="stylesheet" href='../editAdministrador/editModalAdministrador.css'>
    <link rel="stylesheet" href='../components/navListAdministrador.css'>
    <link rel="stylesheet" href='../cerrarSesionAdmin/cerrarSession.css'>
    <link rel="stylesheet" href='../components/headerAdministrador.css'>
    <link rel="stylesheet" href='../administradorIndex/administrador.css'>
    <link rel="stylesheet" href='gestionDePetiPuntos.css'>

    <title>Pagina de administrador</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
      $(document).ready(function () {
    // Ejecutar la búsqueda al cargar la página
    buscarRecompensas('');

    $('#busquedaRecompensas').on('input', function () {
        var query = $(this).val();
        buscarRecompensas(query);
    });
});

function buscarRecompensas(query) {
    $.ajax({
        url: '../../../llamadas/proceso_busqueda_recompensas.php',
        method: 'POST',
        data: {
            query: query
        },
        success: function (response) {
            $('#resultadosRecompensas').html(response);
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
<div class="wrapper-petiPuntos">
    <div class="subwreapper-petiPuntos">
        <div class="header-petiPuntos">
            <h1 class="tittle-petiPuntos">Recompensas</h1>
            <button id="open-createPetiPunto" onclick="openModalCreatePetiPunto()" class="new-Recompensa">Nueva Recompensa</button>
        </div>
        <div class="wrapper-tablePetiPuntos">
            <div class="header-tablePeti">
                <div class="search-petiPunto">
                    <span class="searching">Buscar:</span>
                    <input class="input-search" type="search" name="busquedaRecompensas" placeholder="" id="busquedaRecompensas">
                </div>
            </div>
            <div class="wrapper-onlyTablePeti">
                <div class="tittle-tablePeti">
                    <div class="row-tablePeti">
                        <span class="tittle-textProductPeti">Producto</span>
                        <span class="tittle-textPointPeti">Puntos</span>
                        <span class="tittle-textPricePeti">Estado</span>
                        <span class="tittle-textActionPeti">Acción</span>
                    </div>
                </div>
                <div id="resultadosRecompensas" class="wrapper-tablePeti">
                    <!-- Aquí se mostrarán los resultados de la búsqueda mediante Ajax -->
                </div>
            </div>
        </div>
    </div>
</div>



        <!-- <?php
            include('../components/footerAdministrador.php');
            ?> -->


        </div>

        <?php
            include('../editAdministrador/editModalAdministrador.php');
            ?>

        <?php
            include('../cerrarSesionAdmin/cerrarSessionAdm.php');
            ?>


    </div>

    </div>

    </div>

 <!-- Inicia el terrible modal de editar  Recompensa -->
 <section>
 <div id="modal-edithPetiPunto" class="modal-edithPetiPunto">  
            <div class="modals">
                <div>
                    <div class="frame frame-1"></div>
                    <div class="wrapper-headerModals">
                        <h1 class="title-newProduct">Editar Recompensa</h1>
                        <lord-icon class="close" id="close1" src="https://cdn.lordicon.com/nhfyhmlt.json" trigger="hover" colors="primary:#121331" state="hover-2" style="width:40px;height:40px">
                        </lord-icon>
                    </div>
                    <div>
                        
    <form action="../../../llamadas/proceso_actualizarRecompensas.php" method="post" enctype="multipart/form-data">
        <div class="wrapper-bodyModals">
            <div class="formu-modals">
                <div class="first-group">
                    <label class="label-reuse" for="">Nombre del producto:</label>
                    <input class="text-nameProduct" type="text" name="nombre_PE" id="nombreRecompensa"  placeHolder="Desactivado" disabled>
                </div>
                <div class="thirds-group">
    <label class="label-reuse" for="">Puntos:</label>
    <input class="text-namePoints" type="text" name="puntos_recompensa" id="puntosRecompensa" placeHolder="Cantidad de puntos">
    <input class="text-namePoints" type="text" name="id_recompensa" id="idRecompensa" placeHolder="ID de la recompensa" hidden>
</div>


                <button class="add-button">Actualizar</button>
            </div>
        </div>
    </form>
    <div class="footer-modals">
       
    </div>
    <div class="frame frame-2"></div>
</div>

    </section>


 <!-- Inicia el terrible modal de crear  Recompensa -->
 <section>
    <div id="modal-createPetiPunto" class="modal-createPetiPunto">
            <div class="modals">
                <div>
                    <div class="frame frame-1"></div>
                    <div class="wrapper-headerModals">
                        <h1 class="title-newProduct">Crear Recompensa</h1>
                        <lord-icon class="close" id="close" src="https://cdn.lordicon.com/nhfyhmlt.json" trigger="hover" colors="primary:#121331" state="hover-2" style="width:40px;height:40px">
                        </lord-icon>
                    </div>
                    <div>
    <form action="../../../llamadas/proceso_crearRecompensa.php" method="post" enctype="multipart/form-data">
        <div class="wrapper-bodyModals1">
            <div class="formu-modals1">
                <div class="first-group">
                    <label class="productoTipo label-reuse" for="">Especie : </label>
                    <div class="button-selectPetiType">
                        <select name="especie" id="especie" class="select-petiPuntos"  onchange="limpiarProductos();cargarCategoria()">
                        <option selected>Selecciona Especie</option>
                        <?php
                                            // Obtener los datos de la tabla de la base de datos
                                            $queryEspecies = "SELECT * FROM especie"; // Reemplaza "tabla_especie" con el nombre de tu tabla
                                            $resultEspecies = mysqli_query($conn, $queryEspecies);
                                            // Generar las opciones del select utilizando los datos obtenidos
                                            while ($rowEspecie = mysqli_fetch_assoc($resultEspecies)) {
                                                $nombreEspecie = $rowEspecie['nombre'];
                                                $valorEspecie = $rowEspecie['idespecie'];
                                                echo "<option value=\"$valorEspecie\">$nombreEspecie</option>";
                                            }
                                            ?>
                                        </select>
        
                <div class="second-group">
                <label class="label-reuse" for="categoria">Categoría de Producto:</label>
        
                <div class="button-selectPetiCategory">
                        <select name="raza" id="categoria" class="select-petiPuntos"  onchange="limpiarProductos();cargarProductos()">
                        <option selected>Selecciona categoria</option>
                        </select>
                                    </div>

                                    <!-- JavaScript -->
                                    <script>
                                        function cargarCategoria() {
                                            var especieSeleccionada = document.getElementById('especie').value;

                                            // Crear una instancia de XMLHttpRequest
                                            var xhr = new XMLHttpRequest();
                                            xhr.onreadystatechange = function () {
                                                if (xhr.readyState === XMLHttpRequest.DONE) {
                                                    if (xhr.status === 200) {
                                                        // Convertir la respuesta JSON en un objeto JavaScript
                                                        var razas = JSON.parse(xhr.responseText);

                                                        // Limpiar el combo de categorías
                                                        var razaSelect = document.getElementById('categoria');
                                                        razaSelect.innerHTML = '<option selected>Seleccionar tipo de producto </option>';

                                                        // Generar las opciones del combo de categorías utilizando los datos obtenidos
                                                        razas.forEach(function (raza) {
                                                            var option = document.createElement('option');
                                                            option.value = raza.idtipoproductoservicio; // Asignar directamente el idtipoproductoservicio como valor
                                                            option.text = raza.nombre;
                                                            razaSelect.appendChild(option);
                                                        });

                                                    } else {
                                                        console.log('Error al cargar las categorias');
                                                    }
                                                }
                                            };

                                            // Realizar la solicitud AJAX para obtener las categorías correspondientes a la especie seleccionada
                                            xhr.open('GET', '../../../llamadas/obtener_categoria2.php?idespecie=' + especieSeleccionada);
                                            
                                            xhr.send();
                                        }

                                        function limpiarProductos() {
                                            var productoSelect = document.getElementById('producto');
                                            productoSelect.innerHTML = '<option selected>Selecciona categoria de producto</option>';
                                       

                                        }
                                    </script>


                                </div>
                            </div>
                <div class="thirds-group">
                    <label class="label-reuse" for="productos">Nombre de Producto:</label>
                    <div class="button-selectPetiName">
                        <select select name="producto" id="producto" class="select-petiPuntos"  >
                        <option selected>Selecciona categoria</option>
                        </select>
                                <!-- JavaScript -->
                                <script>
                                    function cargarProductos() {
                                        var categoriaSeleccionada = document.getElementById('categoria').value;

                                        // Crear una instancia de XMLHttpRequest
                                        var xhr = new XMLHttpRequest();
                                        xhr.onreadystatechange = function () {
                                            if (xhr.readyState === XMLHttpRequest.DONE) {
                                                if (xhr.status === 200) {
                                                    // Convertir la respuesta JSON en un objeto JavaScript
                                                    var productos = JSON.parse(xhr.responseText);

                                                    // Limpiar el combo de productos
                                                    var productoSelect = document.getElementById('producto');
                                                    productoSelect.innerHTML = '<option selected>Seleccionar categoria de producto </option>';

                                                    // Generar las opciones del combo de productos utilizando los datos obtenidos
                                                    productos.forEach(function (producto) {
                                                        var option = document.createElement('option');
                                                        option.value = producto.idproductoservicio; // Asignar directamente el idproductoservicio como valor
                                                        option.text = producto.nombre;
                                                        productoSelect.appendChild(option);
                                                    });

                                                } else {
                                                    console.log('Error al cargar los productos');
                                                }
                                            }
                                        };

                                        // Realizar la solicitud AJAX para obtener los productos correspondientes a la categoría seleccionada
                                        xhr.open('GET', '../../../llamadas/obtener_productos.php?idcategoria=' + categoriaSeleccionada);
                                        xhr.send();
                                    }
                                    </script>
                    </div>


            </div>
        </div>
    <div class="footer-modals">
                <div class="four-group">
                    <label   label class="label-reuse" for="">Puntos:</label>
                    <input class="text-namePoints" type="text" name="puntosRecompensa" id="nombreProductoEnvio" placeHolder="Cantidad de puntos" >
                </div>
                <button class="add-button1">Agregar</button>
    </div>
    <div class="frame frame-2"></div>
</div>
    </form>

    </section>


<script>
const toggle = document.getElementById('toggle');
const estado = document.getElementById('estado');

toggle.addEventListener('change', function() {
  if (this.checked) {
    estado.textContent = 'Activado';
  } else {
    estado.textContent = 'Desactivado';
  }
});
</script>

    <script src="../../../js/previsualizarImagen.js"></script>
    <script src="../../../js/Interacciones.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="../../../js/swiperAdmin.js"></script>
    <script src="../cerrarSesionAdmin/cerrarSession.js"></script>
    <script src="../../../js/administrador/modals-editService.js"></script>
    <script src="https://cdn.lordicon.com/bhenfmcm.js"></script>

</body>

</html>