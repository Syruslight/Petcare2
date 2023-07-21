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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href='../cerrarSesionVet/closeSessionVet.css'>
    <link rel="stylesheet" href='../components/navListVeterinario.css'>
    <link rel="stylesheet" href='petipuntoVet.css'>
    <link rel="stylesheet" href='../../Administrador/components/headerAdministrador.css'>
    <link rel="stylesheet" href='../../Administrador/administradorIndex/administrador.css'>
    <link rel="stylesheet" href='../../Veterinario/editarVeterinario/estiloModalVeterinario.css'>

    <title>LandingPage</title>
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
            <div class="wrapper-petiPuntos">
                    <div class="subwreapper-petiPuntos">
                    <div class="header-petiPuntos">
                        <h1 class="tittle-petiPuntos">Caje</h1>
                    </div>
                    <div class="wrapper-tablePetiPuntos">
                        <div class="header-tablePeti">
                            <div class="search-petiPunto">
                                <span class="searching">Buscar:</span>
                                <input class="input-searching" type="search" name="busqueadaDNI" placeholder="">
                            </div>
                        </div>
                        <div class="wrapper-onlyTablePeti">
                            <div class="tittle-tablePeti">
                                <div class="row-tablePeti">
                                            <span class="tittle-textProductPeti">Codigo</span>
                                            <span class="tittle-textPointPeti">Cliente</span>
                                            <span class="tittle-textPricePeti">Producto</span>
                                            <span class="tittle-textActionPeti">Estado</span>
                                </div>
                            </div>
                            <div class="wrapper-tablePeti">
                                <div class="wrapper-resultPeti">
                                    <div class="result-itemtPeti">
                                        <div class="result-infoPeti">
                                            <span class="table-nameFoodPeti">xxxxxxx</span>
                                            <span class="table-pointsPeti">Christian</span>
                                            <span class="table-pointsPeti">Nombre producto</span>
                                        </div>
                                        <div class="toogleBtn-petiPuntos">
                                            <label class="toggle-btn">
                                                <input type="checkbox" id="toggle">
                                                <span class="slider"></span>
                                                </label>
                                                <span id="estado">No canjeado</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
const toggle = document.getElementById('toggle');
const estado = document.getElementById('estado');

toggle.addEventListener('change', function() {
  if (this.checked) {
    estado.textContent = 'Canjeado';
  } else {
    estado.textContent = 'No canjeado';
  }
});
</script>


<script src="../../../js/interaccionFormularioHorario.js"></script>
            <script src="../../../js/Interacciones.js"></script>
            <script src="../../js/previsualizarImagen.js"></script>
            <script src="../../js/Interacciones.js"></script>
            <script src="../cerrarSesionVet/closeSessionVet.js"></script>
</body>

</html>