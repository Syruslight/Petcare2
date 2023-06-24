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
    <link rel="stylesheet" href='../editAdministrador/editModalAdministrador.css'>
    <script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <title>Pagina de administrador</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            // Ejecutar la búsqueda al cargar la página
            buscarProducto('');

            $('#busqueda').on('input', function () {
                var query = $(this).val();
                buscarProducto(query);
            });
        });

        function buscarProducto(query) {
            $.ajax({
                url: '../../../llamadas/proceso_busqueda_productos.php',
                method: 'POST',
                data: { query: query },
                success: function (response) {
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
                    <button id="open" class="add-newProduct">+ Nuevo producto</button>
                    <button class="add-newCategory">+ Nueva Categoria</button>
                </div>
                <div class="wrapper-tableProducts">
                   <div class="header-table">
                        <div class="search-product">
                            <span class="search">Buscar:</span>
                            <input class="input-search" type="search" name="busqueadaDNI" placeholder="" id="busqueda">
                        </div>
                        <div class="image-container">

                                    <img
                                        src="../../../imagenes/icono-filtro.png" width="35px" height="35px"
                                        alt="Imagen"
                                        onclick="togglePopup()"
                                    />
                                    <div class="popup" id="popup">
                                        <?php foreach(obtenerTipoProd($conn) as $tipo): ?>
                                                <div class="checkbox-overlay">
                                                <input
                                                    type="checkbox"
                                                    id="checkbox1"
                                                    name="checkbox"
                                                    onchange="updateCheckbox('checkbox1')"
                                                    class="filter-checkbox"
                                                    value="<?php echo $tipo['nombre']?>"
                                                />
                                                <label for="checkbox1"><?php echo $tipo['nombre']?></label>
                                                </div>
                                        <?php endforeach ?>
                                        <div class="checkbox-overlay">
                                        <input
                                            type="checkbox"
                                            id="checkbox1"
                                            name="checkbox"
                                            onchange="updateCheckbox('checkbox1')"
                                            class="filter-checkbox"
                                            value="Comida"
                                        />
                                        <label for="checkbox1">Comida</label>
                                        </div>
                                        <div class="checkbox-overlay">
                                        <input
                                            type="checkbox"
                                            id="checkbox2"
                                            name="checkbox"
                                            onchange="updateCheckbox('checkbox2')"
                                            class="filter-checkbox"
                                            value="Limpieza"
                                        />
                                        <label for="checkbox2">Limpieza</label>
                                        </div>
                                        <div class="checkbox-overlay">
                                        <input
                                            type="checkbox"
                                            id="checkbox3"
                                            name="checkbox"
                                            onchange="updateCheckbox('checkbox3')"
                                            class="filter-checkbox"
                                            value="General"
                                        />
                                        <label for="checkbox3">General</label>
                                        </div>
                                    </div>
                                    </div>                                
                        
                        <span class="text-filter">Filtrar</span>
                    </div>
                <div id="item-list" class="wrapper-onlyTable">
                    <div class="tittle-table">
                        <div>

                            <span class="tittle-textProduct">Producto</span>
                            <span class="tittle-textType">Tipo</span>
                            <span class="tittle-textPrice">Precio</span>
                            <span class="tittle-textDescription">Descripcion</span>
                            <span class="tittle-textAction">Accion</span>
                        </div>
                        <hr class="linea">
                    </div>
                    <div id="resultados" class="wrapper-table">
                        <div  class="dates-table"> <!--Inicia el primer producto-->
                            <img class="image-product"src="../../../imagenes/perfilAdmin/foodPet.png" width=60 height=60>
                            <span class="table-nameFood">Comida de Perro</span>
                            <span class="item table-type">Comida</span>
                            <span class="table-price">s./40.00</span>
                            <span class="table-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor expedita aperiam commodi impedit eum illum, totam voluptas facere! Ducimus delectus laboriosam corrupti atque earum ut, totam recusandae nulla molestiae cupiditate.</span>
                            <img class="image-delete" src="../../../imagenes/perfilAdmin/delete.png" width=45 height=40>
                            <img  class="image-edit" src="../../../imagenes/perfilAdmin/editedit.png" width=45 height=40>
                        </div>
                        <hr class="linea">

                        <div  class="dates-table"> <!--Inicia el segundo producto-->
                            <img class="image-product"src="../../../imagenes/perfilAdmin/foodPet.png" width=60 height=60>
                            <span class="table-nameFood">Comida de Perro</span>
                            <span class="item table-type">Limpieza</span>
                            <span class="table-price">s./40.00</span>
                            <span class="table-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor expedita aperiam commodi impedit eum illum, totam voluptas facere! Ducimus delectus laboriosam corrupti atque earum ut, totam recusandae nulla molestiae cupiditate.</span>
                            <img class="image-delete" src="../../../imagenes/perfilAdmin/delete.png" width=45 height=40>
                            <img class="image-edit" src="../../../imagenes/perfilAdmin/editedit.png" width=45 height=40>
                        </div>
                        <hr class="linea">

                        
                        <div  class="dates-table"> <!--Inicia el tercero producto-->
                            <img class="image-product"src="../../../imagenes/perfilAdmin/foodPet.png" width=60 height=60>
                            <span class="table-nameFood">Comida de Perro</span>
                            <span class="item table-type">Comida</span>
                            <span class="table-price">s./40.00</span>
                            <span class="table-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor expedita aperiam commodi impedit eum illum, totam voluptas facere! Ducimus delectus laboriosam corrupti atque earum ut, totam recusandae nulla molestiae cupiditate.</span>
                            <img class="image-delete" src="../../../imagenes/perfilAdmin/delete.png" width=45 height=40>
                            <img class="image-edit" src="../../../imagenes/perfilAdmin/editedit.png" width=45 height=40>
                        </div>
                        <hr class="linea">

                        
                        <div  class="dates-table"> <!--Inicia el cuarto producto-->
                            <img class="image-product"src="../../../imagenes/perfilAdmin/foodPet.png" width=60 height=60>
                            <span class="table-nameFood">Comida de Perro</span>
                            <span class="item table-type">Comida</span>
                            <span class="table-price">s./40.00</span>
                            <span class="table-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor expedita aperiam commodi impedit eum illum, totam voluptas facere! Ducimus delectus laboriosam corrupti atque earum ut, totam recusandae nulla molestiae cupiditate.</span>
                            <img class="image-delete" src="../../../imagenes/perfilAdmin/delete.png" width=45 height=40>
                            <img class="image-edit" src="../../../imagenes/perfilAdmin/editedit.png" width=45 height=40>
                        </div>
                        <hr class="linea">

                        
                        <div class="dates-table"> <!--Inicia el quinto producto-->
                            <img class="image-product"src="../../../imagenes/perfilAdmin/foodPet.png" width=60 height=60>
                            <span class="table-nameFood">Comida de Perro</span>
                            <span class="item table-type">General</span>
                            <span class="table-price">s./40.00</span>
                            <span class="table-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor expedita aperiam commodi impedit eum illum, totam voluptas facere! Ducimus delectus laboriosam corrupti atque earum ut, totam recusandae nulla molestiae cupiditate.</span>
                            <img class="image-delete" src="../../../imagenes/perfilAdmin/delete.png" width=45 height=40>
                            <img class="image-edit" src="../../../imagenes/perfilAdmin/editedit.png" width=45 height=40>
                        </div>
                        <hr class="linea">
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
                        <lord-icon
                            class="close"
                            id="close"
                            src="https://cdn.lordicon.com/nhfyhmlt.json"
                            trigger="hover"
                            colors="primary:#121331"
                            state="hover-2"
                            style="width:40px;height:40px">
                        </lord-icon>
                    </div>
                    <form action="../../../llamadas/proceso_registrar_producto.php" method="post" enctype="multipart/form-data" >
                    <div class="wrapper-bodyModals">
                        <div class="photos-Modals">
                            <div class="image-modals">
                                <img id="imgProducto" src="../../../imagenes/sinImagen.jpg" >
                            </div>
                         <div class="update-photos">
                            <input id="fotoProductoSRC" type="file" name="foto_P" hidden>
                                <label class="text-updatePhoto" for="fotoProductoSRC" onclick="previsualizarImagen('imgProducto', 'fotoProductoSRC', '../../../imagenes/sinImagen.jpg')">Subir Foto
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
                                    <input class="text-nameProduct" type="text" name="nombre_P">
                                </div>
                                <div class="second-group">
                                    <div class="group-selects">
                                        <label class="label-reuse" for="">Tipo:</label>
                                        <select class="selectProdcuts" name="Categoria_P" id="Categoria_P">
                                        <option selected>Selecciona Tipo Producto</option>
                                <?php
                                // Query para obtener los tipos de productos
                                $queryTipoProducto = "SELECT * FROM tipoproductoservicio where estado like 1 and idtipoproductoservicio not like 1 "; // Reemplaza "tabla_especie" con el nombre de tu tabla
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
                                        <input class="text-namePrice"type="text" name ="precio_P">
                                    </div>
                                </div>
                                <div class="thirds-group">
                                    <label class="label-reuse"for="">Descripcion:</label>
                                    <textarea class="text-descriptionProduct"type="area" name="descripcion_P"></textarea>
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




<script src="../../../js/previsualizarImagen.js"></script>
    <script src="../../../js/Interacciones.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="../../../js/swiperAdmin.js"></script>
<script src="../../../js/administrador/modals-products.js"></script>
<script src="../../../js/administrador/imagenPoup.js"></script>
<script src="../../../js/administrador/filterCheckbox.js"></script>
</body>

</html>