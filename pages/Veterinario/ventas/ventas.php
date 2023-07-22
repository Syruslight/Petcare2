<?php
require('../../../controlador/conexion.php');
$conn = conectar();
?>

<?php
session_start();
$email = $_SESSION['email'];
foreach (listarVeterinario($email, $conn) as $key => $value) {
} ?>
<!--Perfil del veterinario (deriva o esta incluido de su pagina principal)-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href='../veterinario.css'>
    <link rel="stylesheet" href='../ventas/ventas-estilo.css'>
    <link rel="stylesheet" href='../components/navListVeterinario.css'>
    <link rel="stylesheet" href='../../Veterinario/editarVeterinario/estiloModalVeterinario.css'>
    <link rel="stylesheet" href='../cerrarSesionVet/closeSessionVet.css'>
    <title>Pagina de Veterinario</title>


</head>

<body>
    <div class="wrapper">
        <div class="profile">
            <?php
            include('../components/navListVeterinario.php');
            ?>
        </div>


        <div class="dash-information">
            <?php
            include('../components/headerVeterinario.php');
            ?>
            <?php
            include('../cerrarSesionVet/closeSessionVet.php');
            ?>


            <script>
                $(document).ready(function () {
                    $('#busqueda').keyup(function () {
                        var query = $(this).val();

                        if (query !== '') {
                            $.ajax({
                                url: 'proceso_busquedaClienteDni.php',
                                method: 'POST',
                                data: {
                                    query: query
                                },
                                success: function (response) {
                                    if (response !== 'No se encontraron resultados.') {
                                        // Separar la respuesta en ID y Nombre de mascota
                                        var result = response.split(';');
                                        var idMascotaRenian = result[0];
                                        var nombreMascotaRenian = result[1];

                                        // Actualizar los valores de los campos del formulario
                                        $('#idMascota').val(idMascotaRenian);
                                        $('#nombreMascota').val(nombreMascotaRenian);
                                    } else {
                                        // Limpiar los campos si no se encontraron resultados
                                        $('#idMascota').val('');
                                        $('#nombreMascota').val('');
                                    }
                                }
                            });
                        } else {
                            // Limpiar los campos si no hay entrada de búsqueda
                            $('#idMascota').val('');
                            $('#nombreMascota').val('');
                        }
                    });
                });
            </script>


            <section class="container-main">
                <div class="container-form">
                    <h2>Registro de compra para el cliente</h2>
                    <div class="data-form">
                        <form action="../../../llamadas/proceso_generarventa.php" method="post">                           
                            <div class="group-text">
                                <div class="col-1-form">
                                    <label for="clienteDNI">Cliente DNI:</label>
                                    <input type="text" name="busqueda" id="busqueda" required>

                                    <label for="cantidad">Cantidad:</label>
                                    <input type="number" name="cantidadP" id="cantidad" oninput="calcularTotal()">
                                    <label for="precio">Precio:</label>
                                    <input type="text" name="precioP" id="precio" readonly>
                                    <label for="total">Total:</label>
                                    <input type="text" name="totalP" id="total" readonly>


                                    <input type="text" name="idCliente" id="idMascota" placeholder="ID Cliente" hidden>
                                </div>
                                <div class="col-2-form">
                                    <label for="nombreCliente">Nombre del Cliente:</label>
                                    <input type="text" name="nombreMascota" id="nombreMascota" placeholder="Cliente Nombre" disabled>

                                    <label for="productoTipo">Especie : </label>

                                    <div class="select-RaEs">
                                    <select name="especie" id="especie" onchange="limpiarProductos();cargarCategoria()">
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
                                        <label for="categoria">Categoría del Producto:</label>
                                        <!-- Combo de categorias -->
                                        <select name="raza" id="categoria" onchange="limpiarProductos();cargarProductos()">
                                            <option selected>Selecciona categoria</option>
                                        </select>

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
                                            xhr.open('GET', '../../../llamadas/obtener_categoria.php?idespecie=' + especieSeleccionada);
                                            xhr.send();
                                        }

                                        function limpiarProductos() {
                                            var productoSelect = document.getElementById('producto');
                                            productoSelect.innerHTML = '<option selected>Selecciona producto</option>';
                                            document.getElementById('precio').value = "";

                                        }
                                    </script>
                                <label for="productos">Nombre de Producto:</label>
                                <select name="producto" id="producto" style="width: 100%; height: 40px; margin-right: 8px;" onchange="cargarPrecio()">
                                    <option selected>Selecciona Producto</option>
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
                                                    productoSelect.innerHTML = '<option selected>Selecciona producto </option>';

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

                                    function cargarPrecio() {
                                        var productoSeleccionado = document.getElementById('producto').value;

                                        // Verificar si se ha seleccionado un producto válido
                                        if (productoSeleccionado === "Selecciona producto") {
                                            document.getElementById('precio').value = "";
                                            return;
                                        }

                                        // Extraer el id del producto seleccionado
                                        var idProducto = productoSeleccionado.split("-")[0];

                                        // Crear una instancia de XMLHttpRequest
                                        var xhr = new XMLHttpRequest();
                                        xhr.onreadystatechange = function () {
                                            if (xhr.readyState === XMLHttpRequest.DONE) {
                                                if (xhr.status === 200) {
                                                    // Convertir la respuesta JSON en un objeto JavaScript
                                                    var producto = JSON.parse(xhr.responseText);

                                                    // Mostrar el precio en el input de texto "precio"
                                                    document.getElementById('precio').value = producto.precio;
                                                } else {
                                                    console.log('Error al cargar el precio del producto');
                                                }
                                            }
                                        };

                                        // Realizar la solicitud AJAX para obtener el precio del producto seleccionado
                                        xhr.open('GET', '../../../llamadas/obtener_precio_producto.php?idproducto=' + idProducto);
                                        xhr.send();
                                    }
                                </script>
                                <script>
                                    function calcularTotal() {
                
                                        var precio = parseFloat(document.getElementById("precio").value);
                                        var cantidad = parseFloat(document.getElementById("cantidad").value);

                                        if (!isNaN(precio) && !isNaN(cantidad)) {
                                            var total = precio * cantidad;

                                            document.getElementById("total").value = total.toFixed(2);
                                        } 
                                    }
                                </script>
                                </div>
                            </div>
                            <div class="btn-form">
                                <button type="submit" id="ventaButton">REGISTRAR</button>
                            </div>
                            <div class="gato-background">
                                <img src="../../../imagenes/perfilVeterinario/GatoNegro.svg" alt="GatoNegro">
                            </div>
                        </form>
                    </div>
                </div>  
            </div>                                <div class="perro-background">
                        <img src="../../../imagenes/perfilVeterinario/PerroDinero.svg" alt="GatoNegro">
                    </div>  
            </section>
            


            <?php
            include('../../Veterinario/editarVeterinario/modalEditarVeterinario.php');
            ?>


            <?php
            include('../components/footerVeterinario.php');
            ?>

            <script src="../../../js/Interacciones.js"></script>
            <script src="../../js/previsualizarImagen.js"></script>
            <script src="../../js/Interacciones.js"></script>
            <script src="../cerrarSesionVet/closeSessionVet.js"></script>

</body>

</html>