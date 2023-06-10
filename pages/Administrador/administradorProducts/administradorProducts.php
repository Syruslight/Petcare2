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

           <div class="wrapper-products">
            <div class="subwrapper-products">
                <div class="header-products">
                    <h1 class="tittle-products">Lista de Producto</h1>
                    <button class="add-newProduct">+ Nuevo producto</button>
                    <button class="add-newCategory">+ Nueva Catergoria</button>
                </div>
                <div class="wrapper-tableProducts">
                   <div class="header-table">
                        <div class="search-product">
                            <span class="search">Buscar:</span>
                            <input class="input-search" type="search" name="busqueadaDNI" placeholder="">
                        </div>
                        <img src="../../../imagenes/perfilAdmin/filter.png" width=45 height=40>
                        <span class="text-filter">Filtrar</span>
                    </div>
                   <div class="wrapper-onlyTable">
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
                    <div class="wrapper-table">
                        <div class="dates-table"> <!--Inicia el primer producto-->
                            <img class="image-product"src="../../../imagenes/perfilAdmin/foodPet.png" width=60 height=60>
                            <span class="table-nameFood">Comida de Perro</span>
                            <span class="table-type">Comida</span>
                            <span class="table-price">s./40.00</span>
                            <span class="table-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor expedita aperiam commodi impedit eum illum, totam voluptas facere! Ducimus delectus laboriosam corrupti atque earum ut, totam recusandae nulla molestiae cupiditate.</span>
                            <img class="image-delete" src="../../../imagenes/perfilAdmin/delete.png" width=45 height=40>
                            <img id="open" class="image-edit" src="../../../imagenes/perfilAdmin/editedit.png" width=45 height=40>
                        </div>
                        <hr class="linea">

                        <div class="dates-table"> <!--Inicia el segundo producto-->
                            <img class="image-product"src="../../../imagenes/perfilAdmin/foodPet.png" width=60 height=60>
                            <span class="table-nameFood">Comida de Perro</span>
                            <span class="table-type">Comida</span>
                            <span class="table-price">s./40.00</span>
                            <span class="table-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor expedita aperiam commodi impedit eum illum, totam voluptas facere! Ducimus delectus laboriosam corrupti atque earum ut, totam recusandae nulla molestiae cupiditate.</span>
                            <img class="image-delete" src="../../../imagenes/perfilAdmin/delete.png" width=45 height=40>
                            <img class="image-edit" src="../../../imagenes/perfilAdmin/editedit.png" width=45 height=40>
                        </div>
                        <hr class="linea">

                        
                        <div class="dates-table"> <!--Inicia el tercero producto-->
                            <img class="image-product"src="../../../imagenes/perfilAdmin/foodPet.png" width=60 height=60>
                            <span class="table-nameFood">Comida de Perro</span>
                            <span class="table-type">Comida</span>
                            <span class="table-price">s./40.00</span>
                            <span class="table-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor expedita aperiam commodi impedit eum illum, totam voluptas facere! Ducimus delectus laboriosam corrupti atque earum ut, totam recusandae nulla molestiae cupiditate.</span>
                            <img class="image-delete" src="../../../imagenes/perfilAdmin/delete.png" width=45 height=40>
                            <img class="image-edit" src="../../../imagenes/perfilAdmin/editedit.png" width=45 height=40>
                        </div>
                        <hr class="linea">

                        
                        <div class="dates-table"> <!--Inicia el cuarto producto-->
                            <img class="image-product"src="../../../imagenes/perfilAdmin/foodPet.png" width=60 height=60>
                            <span class="table-nameFood">Comida de Perro</span>
                            <span class="table-type">Comida</span>
                            <span class="table-price">s./40.00</span>
                            <span class="table-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor expedita aperiam commodi impedit eum illum, totam voluptas facere! Ducimus delectus laboriosam corrupti atque earum ut, totam recusandae nulla molestiae cupiditate.</span>
                            <img class="image-delete" src="../../../imagenes/perfilAdmin/delete.png" width=45 height=40>
                            <img class="image-edit" src="../../../imagenes/perfilAdmin/editedit.png" width=45 height=40>
                        </div>
                        <hr class="linea">

                        
                        <div class="dates-table"> <!--Inicia el segundo producto-->
                            <img class="image-product"src="../../../imagenes/perfilAdmin/foodPet.png" width=60 height=60>
                            <span class="table-nameFood">Comida de Perro</span>
                            <span class="table-type">Comida</span>
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






    <section class="modal">
        <div class="modal__container">
            <div class="cuadro_modal">
                <div class="top-form">
                    <div class="titulo-h2">
                        <h2 class="tituloform">Editar Datos</h2>
                    </div>
                    <div id="close-modal">
                        &#10006
                    </div>
                </div>
                <form action="../../../llamadas/proceso_actualizarDatosAdministrador.php" enctype="multipart/form-data"
                    method="POST">

                    <div class="editheader">
                        <aside class="contfoto">
                            <img id="img" src="../../../imagenes/fotosperfil/administrador/<?= $value[6] ?>"
                                class="modal__img" width="95" height="89">
                                <input id="foto" type="file" name="foto" hidden>
                            <label id="cambiar-foto" for="foto"><img class="image-profile"
                src="../../../imagenes/perfilAdmin/pencil.png" alt="pencil" width="32" height="30"></label>
                        </aside>
                        <section class="textonomap">
                            <div class="input-group">
                                <input class="estilo-separado" type="text" name="nombres" value="<?= $value[0] ?>"
                                    required>
                                <label for=""> Nombres</label>

                            </div>
                            <div class="input-group">
                                <input class="estilo-separado" type="text" name="apellidos" value="<?= $value[1] ?>"
                                    required>
                                <label for=""> Apellidos</label>
                            </div>

                        </section>
                    </div>
                    <div class="modalinf">
                        <div class="input-group1">
                            <input class="estilo-separado1" type="TEXT" name="telefono" value="<?= $value[3] ?>"
                                required>
                            <label for=""> Telefono</label>
                        </div>
                        <div class="input-group2">
                            <input class="estilo-separado1" type="TEXT" name="dni" value="<?= $value[2] ?> " required>
                            <label for=""> DNI</label>
                        </div>

                        <input hidden name="idadministrador" value="<?= $value[7] ?> " required>
                        <input hidden name="foto2" value="<?= $value[6] ?> " required>
                    </div>
                    <div class="modalFoot">
                        <div class="input-group3">
                            <input class="estilo-separado" type="text" name="direccion" value="<?= $value[4] ?>"
                                required>
                            <label for=""> Dirección</label>
                        </div>
                    </div>
                    <div class="contbtn">
                        <button class="btn-mod">ACTUALIZAR DATOS</button>
                    </div>

                </form>

            </div>
        </div>
    </section>
    </section>

    <!-- Inicia el terrible modal de editar producto -->
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
                    <div class="wrapper-bodyModals">
                        <div class="photos-Modals">
                            <div class="image-modals">
                                <img src="../../../imagenes/perfilAdmin/updatePhotoProducts.png" >
                            </div>
                         <div class="update-photos">
                                <span class="text-updatePhoto">Subir Foto</span>
                                <lord-icon
                                    src="https://cdn.lordicon.com/wfadduyp.json"
                                    trigger="click"
                                    colors="primary:#ffffff"
                                    state="hover-1"
                                    style="width:39px;height:39px">
                                </lord-icon>
                            </div>
                            



                        </div>
                        
                        <form action="">
                            <div class="formu-modals"> 
                                <div class="first-group">
                                    <label class="label-reuse"for="">Nombre del producto:</label>
                                    <input class="text-nameProduct"type="text">
                                </div>
                                <div class="second-group">
                                    <div class="group-selects">
                                        <label class="label-reuse" for="">Tipo:</label>
                                        <select class="selectProdcuts"name="select" id="">
                                            <option value="Comida">Comida</option>
                                            <option value="Limpieza">Limpieza</option>
                                            <option value="General">General</option>
                                        </select>
                                    </div>
                                    <div class="group-text">
                                        <label class="label-reuse" for="">Precio</label>
                                        <input class="text-namePrice"type="text">
                                    </div>
                                </div>
                                <div class="thirds-group">
                                    <label class="label-reuse"for="">Descripcion:</label>
                                    <textarea class="text-descriptionProduct"type="area"></textarea>
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




<script src="../../../js/registroNewUs.js"></script>
    <script src="../../../js/Modal.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="../../../js/swiperAdmin.js"></script>
<script src="modals-products.js"></script>
</body>

</html>