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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='administradorCategory.css'>
    <link rel="stylesheet" href='../editAdministrador/editModalAdministrador.css'>
    <script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <title>Pagina de administrador</title>


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
            <?php
            // Realiza la consulta para obtener los datos de la base de datos
            $sql = "SELECT t.idtipoproductoservicio, t.nombre, t.estado, COUNT(p.idproductoservicio) AS afiliaciones
        FROM tipoproductoservicio t
        LEFT JOIN productoservicio p ON t.idtipoproductoservicio = p.idtipoproductoservicio
        WHERE t.idtipoproductoservicio NOT LIKE '1'
        GROUP BY t.idtipoproductoservicio";
            $res = mysqli_query($conn, $sql);

            // Verifica si se obtuvieron resultados
            if (mysqli_num_rows($res) > 0) {
            ?>
                <div class="wrapper-products">
                    <div class="subwrapper-products">
                        <div class="header-products">
                            <h1 class="tittle-products">Lista de Categorias</h1>
                        </div>
                        <div class="wrapper-tableProducts">
                            <div class="header-table">
                                <button class="add-newCategory" id="open" onclick="openModalCreateCategory()">+ Nueva Categoría</button>
                            </div>
                            <div class="wrapper-onlyTable">
                                <div class="tittle-table">
                                    <div>
                                        <span class="tittle-textProduct">N°</span>
                                        <span class="tittle-textType">Nombre</span>
                                        <span class="tittle-textPrice">Afiliaciones</span>
                                        <span class="tittle-textDescription">Estado</span>
                                        <span class="tittle-textAction">Acción</span>
                                    </div>
                                    <hr class="linea">
                                </div>
                                <div class="wrapper-table">
                                    <?php
                                    $numero = 1; // Variable para el contador
                                    while ($f = mysqli_fetch_array($res)) {
                                        $idtipoproductoservicio = $f['idtipoproductoservicio']; // Obtén el ID del registro actual
                                        $toggleID = 'switch' . $idtipoproductoservicio; // ID del elemento del toggle
                                        $statusID = 'status' . $idtipoproductoservicio; // ID del elemento del texto de estado
                                    ?>
                                        <div class="dates-table">
                                            <span class="table-nameFood"><?php echo $numero; ?></span>
                                            <span class="table-type"><?php echo $f['nombre']; ?></span>
                                            <span class="table-price"><?php echo $f['afiliaciones']; ?> Productos</span>
                                            <div class="toogleStatus">
                                                <div class="toggle-switch">
                                                    <input type="checkbox" id="switch<?php echo $idtipoproductoservicio; ?>" class="toggle-switch-checkbox" onchange="updateStatus(<?php echo $idtipoproductoservicio; ?>, this.checked, '¿Desea cambiar el estado de la categoría?')" <?php if ($f['estado'] == '1') echo 'checked'; ?> data-original-state="<?php echo ($f['estado'] == '1') ? 'true' : 'false'; ?>" />
                                                    <label for="<?php echo $toggleID; ?>" class="toggle-switch-label"></label>
                                                    <span class="slider round"></span>
                                                    <span class="toggle-switch-text" id="<?php echo $statusID; ?>"><?php echo ($f['estado'] == '1') ? 'Activado' : 'Desactivado'; ?></span>
                                                </div>
                                            </div>
                                            <img class="image-delete" src="../../../imagenes/perfilAdmin/delete.png" width="45" height="40">
                                            <img  class="image-edit" src="../../../imagenes/perfilAdmin/editedit.png" width="45" height="40">
                                        </div>
                                        <hr class="linea">
                                    <?php
                                        $numero++; // Incrementar el contador en cada iteración
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>






            <?php
            } else {
                echo "No se encontraron resultados.";
            }
            ?>


            <?php
            include('../editAdministrador/editModalAdministrador.php');
            ?>
            <?php
            include('../components/footerAdministrador.php');
            ?>




        </div>




    </div>




    </section>

    <!-- Inicia el terrible modal de crear Categoria -->
    <section>
        <div id="modal_wrapper" class="modal-wrapper">

            <div class="modals">
                <div>
                    <div class="frame frame-1"></div>
                    <div class="wrapper-headerModals">
                        <div class="only-circle">
                            <div class="circle-rigth"></div>
                            <div class="circle-center"></div>
                            <div class="circle-left"></div>
                        </div>
                        <h1 class="title-newProduct">Nueva Categoria</h1>
                        <lord-icon class="close" id="close" src="https://cdn.lordicon.com/nhfyhmlt.json" trigger="hover" colors="primary:#121331" state="hover-2" style="width:40px;height:40px">
                        </lord-icon>
                    </div>
                    <div class="wrapper-bodyModals">
                        <!-- <div class="photos-Modals">
                            <div class="image-modals">
                                <img src="../../../imagenes/perfilAdmin/updatePhotoProducts.png">
                            </div>
                            <div class="update-photos">
                                <span class="text-updatePhoto">Subir Foto</span>
                                <lord-icon src="https://cdn.lordicon.com/wfadduyp.json" trigger="click" colors="primary:#ffffff" state="hover-1" style="width:39px;height:39px">
                                </lord-icon>
                            </div>




                        </div> -->

                        <form action="">
                            <div class="formu-modals">
                                <div class="first-group">
                                    <label class="label-reuse" for="">Nombre</label>
                                    <input class="text-nameProduct" type="text">
                                </div>
                                <div class="second-group">
                                    <!-- <div class="group-selects">
                                        <label class="label-reuse" for="">Tipo:</label>
                                        <select class="selectProdcuts" name="select" id="">
                                            <option value="Comida">Comida</option>
                                            <option value="Limpieza">Limpieza</option>
                                            <option value="General">General</option>
                                        </select>
                                    </div>
                                     -->
                                    <div class="group-text">
                                        <label class="label-reuse" for="">Afiliaciones</label>
                                        <input class="text-namePrice" type="text">
                                    </div>
                                </div>
                                <div class="thirds-group">
                                    <label class="toggle-switch">
                                        <input type="checkbox">
                                        <span class="toggle-slider round"></span>
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="footer-modals">
                        <button class="add-button">Agregar</button>
                        <div class="footer-circle">
                            <div class="footer-rigth"></div>
                            <div class="footer-center"></div>
                            <div class="footer-left"></div>
                        </div>
                    </div>
                    <div class="frame frame-2"></div>
                </div>
            </div>
        </div>
    </section>

    <script src="../../../js/cambiarEstado.js"></script>
    <script src="../../../js/previsualizarImagen.js"></script>
    <script src="../../../js/Interacciones.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="../../../js/administrador/modals-editService.js"></script>
    <script src="../../../js/administrador/toogleSwitchCategory.js"></script>
</body>

</html>