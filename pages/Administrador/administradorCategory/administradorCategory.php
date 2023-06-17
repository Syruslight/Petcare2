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

           <div class="wrapper-products">
            <div class="subwrapper-products">
                <div class="header-products">
                    <h1 class="tittle-products">Lista de Producto</h1>
                </div>
                <div class="wrapper-tableProducts">
                   <div class="header-table">
                   <button class="add-newCategory">+ Nueva Catergoria</button>
                    </div>
                   <div class="wrapper-onlyTable">
                    <div class="tittle-table">
                        <div>

                            <span class="tittle-textProduct">N°</span>
                            <span class="tittle-textType">Nombre</span>
                            <span class="tittle-textPrice">Afiliaciones</span>
                            <span class="tittle-textDescription">Estado</span>
                            <span class="tittle-textAction">Accion</span>
                        </div>
                        <hr class="linea">
                    </div>
                    <div class="wrapper-table">
                        <div class="dates-table"> <!--Inicia el primer producto-->
                            <span class="table-nameFood">01</span>
                            <span class="table-type">Comida</span>
                            <span class="table-price">12 Productos</span>
                            <div class="toogleStatus">   
                                <div class="toggle-switch">
                                    <input  type="checkbox"
                                    id="switch1"
                                    class="toggle-switch-checkbox"
                                    onchange="toggleSwitch('variable1', this.checked)" />
                                    <label for="switch1" class="toggle-switch-label"></label>
                                    <span class="slider round"></span>
                                    <span class="toggle-switch-text" id="status1">
                                        Inactivo
                                    </span>
                                </div>                             
                            </div>
                            <img class="image-delete" src="../../../imagenes/perfilAdmin/delete.png" width=45 height=40>
                            <img id="open" class="image-edit" src="../../../imagenes/perfilAdmin/editedit.png" width=45 height=40>
                        </div>
                        <hr class="linea">

                        <div class="dates-table"> <!--Inicia el segundo producto-->
                            <span class="table-nameFood">02</span>
                            <span class="table-type">Comida</span>
                            <span class="table-price">12 Productos</span>
                            <div class="toogleStatus">   
                                <div class="toggle-switch">
                                    <input  type="checkbox"
                                    id="switch2"
                                    class="toggle-switch-checkbox"
                                    onchange="toggleSwitch('variable2', this.checked)" />
                                    <label for="switch2" class="toggle-switch-label"></label>
                                    <span class="slider round"></span>
                                    <span class="toggle-switch-text" id="status2">
                                        Inactivo
                                    </span>
                                </div>                             
                            </div>
                            <img class="image-delete" src="../../../imagenes/perfilAdmin/delete.png" width=45 height=40>
                            <img id="open" class="image-edit" src="../../../imagenes/perfilAdmin/editedit.png" width=45 height=40>
                        </div>
                        <hr class="linea">

                        <div class="dates-table"> <!--Inicia el tercero producto-->
                            <span class="table-nameFood">03</span>
                            <span class="table-type">Comida</span>
                            <span class="table-price">12 Productos</span>
                            <div class="toogleStatus">   
                                <div class="toggle-switch">
                                    <input  type="checkbox"
                                    id="switch3"
                                    class="toggle-switch-checkbox"
                                    onchange="toggleSwitch('variable3', this.checked)" />
                                    <label for="switch3" class="toggle-switch-label"></label>
                                    <span class="slider round"></span>
                                    <span class="toggle-switch-text" id="status3">
                                        Inactivo
                                    </span>
                                </div>                             
                            </div>
                            <img class="image-delete" src="../../../imagenes/perfilAdmin/delete.png" width=45 height=40>
                            <img id="open" class="image-edit" src="../../../imagenes/perfilAdmin/editedit.png" width=45 height=40>
                        </div>
                        <hr class="linea">

                        <div class="dates-table"> <!--Inicia el cuarto producto-->
                            <span class="table-nameFood">04</span>
                            <span class="table-type">Comida</span>
                            <span class="table-price">12 Productos</span>
                            <div class="toogleStatus">   
                                <div class="toggle-switch">
                                    <input  type="checkbox"
                                    id="switch4"
                                    class="toggle-switch-checkbox"
                                    onchange="toggleSwitch('variable4', this.checked)" />
                                    <label for="switch4" class="toggle-switch-label"></label>
                                    <span class="slider round"></span>
                                    <span class="toggle-switch-text" id="status4">
                                        Inactivo
                                    </span>
                                </div>                             
                            </div>
                            <img class="image-delete" src="../../../imagenes/perfilAdmin/delete.png" width=45 height=40>
                            <img id="open" class="image-edit" src="../../../imagenes/perfilAdmin/editedit.png" width=45 height=40>
                        </div>
                        <hr class="linea">

                        <div class="dates-table"> <!--Inicia el quinto producto-->
                            <span class="table-nameFood">05</span>
                            <span class="table-type">Comida</span>
                            <span class="table-price">12 Productos</span>
                            <div class="toogleStatus">   
                                <div class="toggle-switch">
                                    <input  type="checkbox"
                                    id="switch5"
                                    class="toggle-switch-checkbox"
                                    onchange="toggleSwitch('variable5', this.checked)" />
                                    <label for="switch5" class="toggle-switch-label"></label>
                                    <span class="slider round"></span>
                                    <span class="toggle-switch-text" id="status5">
                                        Inactivo
                                    </span>
                                </div>                             
                            </div>
                            <img class="image-delete" src="../../../imagenes/perfilAdmin/delete.png" width=45 height=40>
                            <img id="open" class="image-edit" src="../../../imagenes/perfilAdmin/editedit.png" width=45 height=40>
                        </div>
                        <hr class="linea">

        

                    </div>
                   </div>
                </div>
            </div>
           </div>
           <?php
            include('../editAdministrador/editModalAdministrador.php');
            ?>
           <?php
            include('../components/footerAdministrador.php');
            ?>




       </div>




    </div>




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




<script src="../../../js/previsualizarImagen.js"></script>
    <script src="../../../js/Interacciones.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="modals-products.js"></script>
<script src="../../../js/administrador/toogleSwitchCategory.js"></script>
</body>

</html>