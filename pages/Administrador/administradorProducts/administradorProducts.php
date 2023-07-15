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
    <link rel="stylesheet" href='administradorProducts.css'>
    <link rel="stylesheet" href='../components/navListAdministrador.css'>
    <link rel="stylesheet" href='../editAdministrador/editModalAdministrador.css'>
    <script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <title>Pagina de administrador</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Ejecutar la búsqueda al cargar la página
            buscarProducto('');

            $('#busqueda').on('input', function() {
                var query = $(this).val();
                buscarProducto(query);
            });
        });

        function buscarProducto(query) {
            $.ajax({
                url: '../../../llamadas/proceso_busqueda_productos.php',
                method: 'POST',
                data: {
                    query: query
                },
                success: function(response) {
                    $('#resultados').html(response);
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
            <?php
            include('../editAdministrador/editModalAdministrador.php');
            ?>

            <div class="wrapper-products">
                <div class="subwrapper-products">
                    <div class="header-products">
                        <h1 class="tittle-products">Lista de Producto</h1>
                        <button id="open" onclick="openModalCreateProduct()" class="add-newProduct">+ Nuevo producto</button>
                        <button class="add-newCategory">+ Nueva Categoria</button>
                    </div>
                    <div class="wrapper-tableProducts">
                        <div class="header-table">
                            <div class="search-product">
                                <span class="search">Buscar:</span>
                                <input class="input-search" type="search" name="busqueadaDNI" placeholder="" id="busqueda">
                            </div>
                            <div class="image-container">
                                <!--Comienza codigo para filtro -->
                                <img src="../../../imagenes/icono-filtro.png" width="35px" height="35px" alt="Imagen" onclick="togglePopup()" />
                                <div class="popup" id="popup">
                                    <?php foreach (obtenerTipoProd($conn) as $tipo) : ?>
                                        <div class="checkbox-overlay">
                                        <input type="checkbox" id="checkbox1" name="checkbox" onchange="updateCheckbox('checkbox1')" class="filter-checkbox" value="<?php echo $tipo['nombre'] ?>" data-tipo="<?php echo $tipo['idtipoproductoservicio'] ?>" />                                            
                                     <label for="checkbox1"><?php echo $tipo['nombre'] ?></label>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </div>

                            <span class="text-filter">Filtrar</span>
                        </div>
                        <div id="item-list" class="wrapper-onlyTable">
                            <div class="tittle-table">
                                <div class="row-table">

                                    <span class="tittle-textProduct">Producto</span>
                                    <span class="tittle-textType">Tipo</span>
                                    <span class="tittle-textPrice">Precio</span>
                                    <span class="tittle-textDescription">Descripción</span>
                                    <span class="tittle-textAction">Accion</span>
                                </div>
                                <hr class="linea">
                            </div>
                            <div id="resultados" class="wrapper-table">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            include('../components/footerAdministrador.php');
            ?>




        </div>




    </div>





    </section>

    <!-- Inicia el terrible modal de crear producto -->
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
                        <h1 class="title-newProduct">Nuevo producto</h1>
                        <lord-icon class="close" id="close" src="https://cdn.lordicon.com/nhfyhmlt.json" trigger="hover" colors="primary:#121331" state="hover-2" style="width:40px;height:40px">
                        </lord-icon>
                    </div>
                    <form action="../../../llamadas/proceso_registrar_producto.php" method="post" enctype="multipart/form-data">
                        <div class="wrapper-bodyModals">
                            <div class="photos-Modals">
                                <div class="image-modals">
                                    <img id="imgProducto" src="../../../imagenes/sinImagen.jpg">
                                </div>
                                <div class="update-photos">
                                    <input id="fotoProductoSRC" type="file" name="foto_P" hidden>
                                    <label class="text-updatePhoto" for="fotoProductoSRC" onclick="previsualizarImagen('imgProducto', 'fotoProductoSRC', '../../../imagenes/sinImagen.jpg')">Subir Foto
                                        <lord-icon src="https://cdn.lordicon.com/wfadduyp.json" trigger="click" colors="primary:#ffffff" state="hover-1" style="width:39px;height:39px">
                                        </lord-icon></label>
                                </div>




                            </div>


                            <div class="formu-modals">
                                <div class="first-group">
                                    <label class="label-reuse" for="">Nombre del producto:</label>
                                    <input class="text-nameProduct" type="text" name="nombre_P">
                                </div>
                                <div class="second-group">
                                    <div class="group-selects">
                                        <label class="label-reuse" for="">Tipo:</label>
                                        <select class="selectProdcuts" name="Categoria_P" id="Categoria_P">
                                            <option selected>Selecciona Tipo Producto</option>
                                            <?php
                                            // Query para obtener los tipos de productos
                                            $queryTipoProducto = "SELECT * FROM tipoproductoservicio where estado like 1 and tipocategoria not like 'Servicio' ORDER by nombre"; // Reemplaza "tabla_especie" con el nombre de tu tabla
                                            // Guardar resultados en array
                                            $resultTipoProducto = mysqli_query($conn, $queryTipoProducto);
                                            while ($rowProducto = mysqli_fetch_assoc($resultTipoProducto)) {
                                                $nombreTipoProducto = $rowProducto['nombre'];
                                                $idTipoProducto = $rowProducto['idtipoproductoservicio'];
                                                echo "<option value=\"$idTipoProducto\">$nombreTipoProducto</option>";
                                            }
                                            ?>
                                        </select>

                                    </div>
                                    <div class="group-text">
                                        <label class="label-reuse" for="">Precio</label>
                                        <input class="text-namePrice" type="text" name="precio_P">
                                    </div>
                                </div>
                                <div class="thirds-group">
                                    <label class="label-reuse" for="">Descripcion:</label>
                                    <textarea class="text-descriptionProduct" type="area" name="descripcion_P"></textarea>
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
                </div>
            </div>
        </div>
        </form>
    </section>

    <!-- Inicia el terrible modal de editar  producto -->
    <section>
        <div id="modal-edithProduct" class="modal-edithProduct">
            <div class="modals">
                <div>
                    <div class="frame frame-1"></div>
                    <div class="wrapper-headerModals">
                        <div class="only-circle">
                            <div class="circle-rigth"></div>
                            <div class="circle-center"></div>
                            <div class="circle-left"></div>
                        </div>
                        <h1 class="title-newProduct">Editar producto</h1>
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
                    <input class="text-nameProduct" type="text" name="nombre_PE" id="nombreProductoEnvio">
                </div>
                <div class="second-group">
                <div class="group-selects">
                                        <label class="label-reuse" for="">Tipo:</label>
                                        <select class="selectProdcuts" name="Categoria_P" id="Categoria_P">
                                            <option selected>Selecciona Tipo Producto</option>
                                            <?php
                                            // Query para obtener los tipos de productos
                                            $queryTipoProducto = "SELECT * FROM tipoproductoservicio where estado like 1 and tipocategoria not like 'Servicio' ORDER by nombre"; // Reemplaza "tabla_especie" con el nombre de tu tabla
                                            // Guardar resultados en array
                                            $resultTipoProducto = mysqli_query($conn, $queryTipoProducto);
                                            while ($rowProducto = mysqli_fetch_assoc($resultTipoProducto)) {
                                                $nombreTipoProducto = $rowProducto['nombre'];
                                                $idTipoProducto = $rowProducto['idtipoproductoservicio'];
                                                echo "<option value=\"$idTipoProducto\">$nombreTipoProducto</option>";
                                            }
                                            ?>
                                        </select>

                                    </div>
                    <div class="group-text">
                        <label class="label-reuse" for="">Precio</label>
                        <input class="text-namePrice" type="text" name="id_PE" id="idProductoEnvio" hidden>
                        <input class="text-namePrice" type="text" name="precio_PE" id="precioProductoEnvio">
                    </div>
                </div>
                <div class="thirds-group">
                    <label class="label-reuse" for="">Descripción:</label>
                    <textarea class="text-descriptionProduct" name="descripcion_PE" id="descripcionProductoEnvio"></textarea>
                </div>
            </div>
        </div>
        <div class="footer-modals">
            <button class="add-button">Actualizar</button>
            <div class="footer-circle">
                <div class="footer-rigth"></div>
                <div class="footer-center"></div>
                <div class="footer-left"></div>
            </div>
        </div>
        <div class="frame frame-2"></div>
    </form>
</div>

    </section>


    <script src="../../../js/previsualizarImagen.js"></script>
    <script src="../../../js/Interacciones.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="../../../js/swiperAdmin.js"></script>
    <!-- <script src="../../../js/administrador/modals-products.js"></script> -->
    <script src="../../../js/administrador/imagenPoup.js"></script>
    <script src="../../../js/administrador/filterCheckbox.js"></script>
    <script src="../../../js/administrador/modals-editService.js"></script>
</body>

</html>