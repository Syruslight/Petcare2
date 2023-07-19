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
                                    <span class="tittle-textProductPeti">Producto</span>
                                    <span class="tittle-textPointPeti">Puntos</span>
                                    <span class="tittle-textPricePeti">Estado</span>
                                    <span class="tittle-textActionPeti">Accion</span>
                        </div>
                    </div>
                    <div class="wrapper-tablePeti">
                        <div class="wrapper-resultPeti">
                            <div class="result-itemtPeti">
                                <img class="image-petiProduct"src="../../../imagenes/perfilAdmin/dog1.png" alt="dog" with="60px" height="60px">
                                <div class="result-infoPeti">
                                    <span class="table-nameFoodPeti">Comida de Perro</span>
                                    <span class="table-pointsPeti">0 Pts.</span>
                                    <div class="toogleBtn-petiPuntos">
                                        <label class="toggle-btn">
                                            <input type="checkbox" id="toggle">
                                            <span class="slider"></span>
                                            </label>
                                            <span id="estado">Desactivado</span>
                                    </div>
                                </div>
                                <img onclick="openModalEdithPetiPunto()" id="open-edithPetiPunto" class="modal-imagenPeti" src="../../../imagenes/perfilAdmin/editedit.png" alt="edit">
                            </div>
                        </div>
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


 <!-- Inicia el terrible modal de editar  producto -->
 <section>
        <div id="modal-edithPetiPunto" class="modal-edithPetiPunto">
            <div class="modals">
                <div>
                    <div class="frame frame-1"></div>
                    <div class="wrapper-headerModals">
                        <div class="only-circle">
                            <div class="circle-rigth"></div>
                            <div class="circle-center"></div>
                            <div class="circle-left"></div>
                        </div>
                        <h1 class="title-newProduct">Editar Recompensa</h1>
                        <lord-icon class="close" id="close1" src="https://cdn.lordicon.com/nhfyhmlt.json" trigger="hover" colors="primary:#121331" state="hover-2" style="width:40px;height:40px">
                        </lord-icon>
                    </div>
                    <div>
    <form action="../../../llamadas/proceso_actualizarDatosProductos.php" method="post" enctype="multipart/form-data">
        <div class="wrapper-bodyModals">
            <div class="photos-Modals">
                <div class="image-modals">
                <input class="text-nameProduct" type="text" name="nombrefotoProducto_PE" id="nombrefotoProductoEnvio" hidden>
                    <img id="productoEnvio" class="producto-image"> <!--Aqui se obtiene la url del producto para mostrar el guardado-->
                    <input id="fotoProductoEd" type="file" name="fotoNuevaProducto" hidden >
                </div>
                <div class="update-photos">
                <!--En el evento previsualizarImagen, el primer parametro es el nombre del id obtenido anteriormente-->
                <label class="text-updatePhoto" for="fotoProductoEd" onclick="previsualizarImagen('productoEnvio', 'fotoProductoEd', '../../../imagenes/sinImagen.jpg')">Subir Foto
                                 <lord-icon
                                    src="https://cdn.lordicon.com/wfadduyp.json"
                                    trigger="click"
                                    colors="primary:#ffffff"
                                    state="hover-1"
                                    style="width:39px;height:39px">
                                </lord-icon></label>                            
                </div>
            </div>
            <div class="formu-modals">
                <div class="first-group">
                    <label class="label-reuse" for="">Nombre del producto:</label>
                    <input class="text-nameProduct" type="text" name="nombre_PE" id="nombreProductoEnvio" placeHolder="Desactivado" disabled>
                </div>
                <div class="thirds-group">
                    <label class="label-reuse" for="">Puntos:</label>
                    <input class="text-namePoints" type="text" name="nombre_PE" id="nombreProductoEnvio" placeHolder="Cantidad de puntos" >
                </div>

                <button class="add-button">Actualizar</button>
            </div>
        </div>
    </form>
    <div class="footer-modals">
       
        <div class="footer-circle">
            <div class="footer-rigth"></div>
            <div class="footer-center"></div>
            <div class="footer-left"></div>
        </div>
    </div>
    <div class="frame frame-2"></div>
</div>

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