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
    <link rel="stylesheet" href='../veterinario.css'>
    <link rel="stylesheet" href='../ventas/ventas-estilo.css'>
    <link rel="stylesheet" href='../../Veterinario/editarVeterinario/estiloModalVeterinario.css'>
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




<section class="container-main">
    <div class="container-form">
        <h2>Registro de compra para el cliente</h2>
        <div class="data-form">
            <form action="">
                <div class="group-text">
                    <div class="col-1-form">
                        <label for="clienteDNI">Cliente DNI:</label>
                        <input type="text" id="clienteDNI">
                        <label for="precio">Precio:</label>
                        <input type="text" id="precio" disabled>
        
                        <label for="cantidad">Cantidad:</label>
                        <input type="number" id="cantidad">
                    </div>
                    <div class="col-2-form">
                        <label for="nombreCliente">Nombre del Cliente:</label>
                        <input type="text" id="nombreCliente" disabled>
        
                        <label for="productoTipo">Tipo de Producto:</label>
                        <select id="productoTipo">
                        <option value="opcion1">Opción 1</option>
                        <option value="opcion2">Opción 2</option>
                        <option value="opcion3">Opción 3</option>
                        </select>
        
                        <label for="categoria">Categoría de Producto:</label>
                        <select id="categoria">
                        <option value="opcion1">Opción 1</option>
                        <option value="opcion2">Opción 2</option>
                        <option value="opcion3">Opción 3</option>
                        </select>
                    </div>
                </div>
                <div class="col-2-form text">
                    <label for="productos">Nombre de Producto:</label>
                    <select id="productos">
                    <option value="opcion1">Opción 1</option>
                    <option value="opcion2">Opción 2</option>
                    <option value="opcion3">Opción 3</option>
                    </select>
                </div>
                <div class="btn-form">
                    <button type="submit" id="ventaButton">REGISTRAR</button>
                </div>
            </form>
        </div>
    </div>
    <div class="gato-background">
        <img src="../../../imagenes/perfilVeterinario/GatoNegro.svg" alt="GatoNegro">
    </div>
    <div class="perro-background">
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

</body>

</html>