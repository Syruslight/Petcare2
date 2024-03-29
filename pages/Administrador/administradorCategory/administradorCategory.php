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
    <link rel="stylesheet" href='../components/navListAdministrador.css'>
    <link rel="stylesheet" href='../components/headerAdministrador.css'>
    <link rel="stylesheet" href='../editAdministrador/editModalAdministrador.css'>
    <link rel="stylesheet" href='../cerrarSesionAdmin/cerrarSession.css'>
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
            $sql = "SELECT t.idtipoproductoservicio, t.nombre, t.tipocategoria AS tipoC,t.estado, COUNT(p.idproductoservicio) AS afiliaciones
        FROM tipoproductoservicio t
        LEFT JOIN productoservicio p ON t.idtipoproductoservicio = p.idtipoproductoservicio
        WHERE t.estado NOT LIKE '3'
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
                                            <span class="table-price"><?php echo $f['afiliaciones']; ?> <?php echo $f['tipoC']; ?></span>
                                            <div class="toogleStatus">
                                                <div class="toggle-switch">
                                                    <input type="checkbox" id="switch<?php echo $idtipoproductoservicio; ?>" class="toggle-switch-checkbox" onchange="updateStatus(<?php echo $idtipoproductoservicio; ?>, 
                                                    this.checked, '¿Desea cambiar el estado de la categoría?')" <?php if ($f['estado'] == '1') echo 'checked'; ?> data-original-state="<?php echo ($f['estado'] == '1')
                                                                                                                                                                                            ? 'true' : 'false'; ?>" />
                                                    <label for="<?php echo $toggleID; ?>" class="toggle-switch-label"></label>
                                                    <span class="slider round"></span>
                                                    <span class="toggle-switch-text" id="<?php echo $statusID; ?>"><?php echo ($f['estado'] == '1') ? 'Activado' : 'Desactivado'; ?></span>
                                                </div>
                                            </div>
                                            <!-- <img class="image-delete" src="../../../imagenes/perfilAdmin/delete.png" width="45" height="40"> -->
                                            <img id="open-edithCategory" data-idtipoproductoservicio="<?php echo $idtipoproductoservicio; ?>" data-nombrecategoria="<?php echo $f['nombre']; ?>" onclick="openModalEdithCategory()" class="image-edit" src="../../../imagenes/perfilAdmin/editedit.png" width="45" height="40">
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

<?php
            include('../cerrarSesionAdmin/cerrarSessionAdm.php');
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


                    <form action="../../../llamadas/proceso_registrar_categoria.php" method="post" enctype="multipart/form-data" >
                            <div class="formu-modals">
                                <div class="first-group">
                                    <label class="label-reuse" for="">Categoria</label>
                                    <input class="text-nameProduct" type="text" name = "nombreCategoria">
                                </div>
                                <div class="second-group">
                                    <div class="group-selects">
                                        <label class="label-reuse" for="">Categoria:</label>
                                        <select class="selectProdcuts" name="tCategoria">
                                            <option selected>Selecciona tipo de categoria</option>
                                            <option value="Producto">Producto</option>
                                            <option value="Servicio">Servicio</option>
                                        </select>

                                    </div>
                                    <div class="group-selects">
                                        <label class="label-reuse" for="">Especie</label>
                                        <select class="selectProdcuts" name="idEspecie">
                                            <option selected>Selecciona Tipo Servicio</option>
                                            <?php
                                            // Query para obtener los tipos de productos
                                            $queryTipoProducto = "SELECT * FROM especie where estado like 1 ORDER by nombre";                                             // Guardar resultados en array
                                            $resultTipoProducto = mysqli_query($conn, $queryTipoProducto);
                                            while ($rowProducto = mysqli_fetch_assoc($resultTipoProducto)) {
                                                $nombreTipoProducto = $rowProducto['nombre'];
                                                $idTipoProducto = $rowProducto['idespecie'];
                                                echo "<option value=\"$idTipoProducto\">$nombreTipoProducto</option>";
                                            }
                                            ?>
                                        </select>

                                    </div>
                                </div>

                            </div>
                        
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
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Inicia el terrible modal de editar Categoria -->

    <section>
        <div id="modal-edithCategory" class="modal-edithCategory">

            <div class="modals">
                <div>
                    <div class="frame frame-1"></div>
                    <div class="wrapper-headerModals">
                        <div class="only-circle">
                            <div class="circle-rigth"></div>
                            <div class="circle-center"></div>
                            <div class="circle-left"></div>
                        </div>
                        <h1 class="title-newProduct">Editar Categoria</h1>
                        <lord-icon class="close" id="close1" src="https://cdn.lordicon.com/nhfyhmlt.json" trigger="hover" colors="primary:#121331" state="hover-2" style="width:40px;height:40px">
                        </lord-icon>
                    </div>
                    <form action="../../../llamadas/proceso_actualizarCategoria.php" method="post">

                    <div class="wrapper-bodyModals1">

                            <div class="formu-modals">
                                <div class="first-group">
                                    <label class="label-reuse" for="">Nombre de categoria</label>
                                    <input class="text-nameProduct" type="text" name="idCategoriaEnvio" id="idCategoria" hidden>
                                    <input class="text-nameProduct" type="text" name="idNombreCategoriaEnvio" id="nombreCategoria" >
                                </div>
                            </div>
                        
                    </div>
                    <div class="footer-modals1">
                        <button class="add-button">Editar</button>
                        <div class="footer-circle">
                            <div class="footer-rigth"></div>
                            <div class="footer-center"></div>
                            <div class="footer-left"></div>
                        </div>
                    </div>
                    </form>
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

    <script src="../cerrarSesionAdmin/cerrarSession.js"></script>
</body>

</html>