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
                    }?>
<!--Perfil del administrador (deriva o esta incluido de su pagina principal)-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='administradorService.css'>
    <link rel="stylesheet" href='../editAdministrador/editModalAdministrador.css'>
    <script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
            include('../editAdministrador/editModalAdministrador.php');
        ?> 
       <div class="wrapper-services">
   <div class="header-services">
        <h1 >Mis Servicios</h1> 
        <button id="open" class="add-newService">+Nuevo Servicio</button>            
   </div>
   <div class="wrapper-deck">
       <?php
       $servicios = listarServicios($conn);
       foreach ($servicios as $servicio) {
           echo '<div class="card">';
           echo '<img src="../../../imagenes/productos_servicios/servicios/' . $servicio['foto'] . '" class="card-img-top" alt="...">';
           echo '<div class="card-body">';
           echo '<div>';
           echo '<h5 class="card-title">' . $servicio['nombre'] . '</h5>';
           echo '<p class="card-text">' . $servicio['descripcion'] . '</p>';
           echo '<p class="card-text">s/.' . $servicio['precio'] . '</p>';
           echo '</div>'; 
           echo '<img onclick="openModalEdithService()" class="edit-pencil openModalEdithService" src="../../../imagenes/perfilAdmin/editPencil.png" alt="" width=35 height=35>';
           echo '<div class="toggle-switch">';
           echo '<input  type="checkbox"';
           echo 'id="switch5"';
           echo 'class="toggle-switch-checkbox"';
           echo 'onchange="toggleSwitch("variable5", this.checked)" />';
           echo '<label for="switch5" class="toggle-switch-label"></label>';
           echo '<span class="slider round"></span>';
           echo '<span class="toggle-switch-text" id="status5" hidden>';
           echo 'Inactivo';
           echo '</span>';
           
           echo '</div>';
           echo '</div>';
           echo '</div>';
       }
       ?>
    <!-- <div class="card">
       <img src="../../../imagenes/perfilAdmin/bañitoDog.png" class="card-img-top" alt="Baño Medico">
       <div class="card-body">
        <div>    
            <h5 class="card-tittle">Baño medicado</h5>
            <p class="card-text">Bañito medicado terrible</p>
            <p class="card-text">Monedas xd</p>
        </div>
        <img class="edit-pencil" src="../../../imagenes/perfilAdmin/editPencil.png" alt="" width=35 height=35>
        <div class="toggle-switch">
            <input  type="checkbox"
            id="switch5"
            class="toggle-switch-checkbox"
            onchange="toggleSwitch('variable5', this.checked)" />
            <label for="switch5" class="toggle-switch-label"></label>
            <span class="slider round"></span>
            <span class="toggle-switch-text" id="status5" hidden>
            Inactivo
             </span>
        </div>    
    </div>
    </div> -->
   </div>
</div>





<div class="footer">
    <span class="copyrigth">©</span>
    <span> Vet&Care, todos los derechos reservados.</span>
</div>
</div>


     
</div>
</div>






    <!-- Inicia el terrible modal de crear servicio -->
    <section>
    <form action="../../../llamadas/proceso_registrar_servicio.php" method="post" enctype="multipart/form-data" >
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
                        <h1 class="title-newProduct">Nuevo Servicio</h1>
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
                                <img id="imgProducto" src="../../../imagenes/sinImagen.jpg" >
                            </div>
                         <div class="update-photos">
                            <input id="fotoProductoSRC" type="file" name="foto_S" hidden>
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
                                    <label class="label-reuse" for="">Nombre del servicio:</label>
                                    <input class="text-nameProduct" type="text" name="nombre_S">
                                </div>
                                <div class="second-group">
                                    <div class="group-text">
                                        <label class="label-reuse" for="">Precio</label>
                                        <input class="text-namePrice"type="text"  name ="precio_S">
                                    </div>
                                </div>
                                <div class="thirds-group">
                                    <label class="label-reuse"for="">Descripcion:</label>
                                    <textarea class="text-descriptionProduct" type="area" name="descripcion_S"></textarea>
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

    

    <!-- Inicia el terrible modal de editar servicio -->
    <section>
        <div id="modal-edithService" class="modal-edithService">
            <div class="modals">
                <div>
                    <div class="frame frame-1"></div>
                    <div class="wrapper-headerModals">
                        <div class="only-circle">
                            <div class="circle-rigth"></div>
                            <div class="circle-center"></div>
                            <div class="circle-left"></div>
                        </div>
                        <h1 class="title-newProduct">Editar Servicio</h1>
                        <lord-icon
                            class="close"
                            id="close1"
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
                                    <label class="label-reuse" for="">Nombre del producto:</label>
                                    <input class="text-nameProduct" type="text">
                                </div>
                                <div class="second-group">
                                    <div class="group-selects">
                                        <label class="label-reuse" for="">Tipo:</label>
                                        <select class="selectProdcuts" name="select" id="">
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
                <button class="add-button">Actualizar</button>
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



    
    <script src="../../../js/Interacciones.js"></script>
    <script src="../../../js/previsualizarImagen.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="../../../js/administrador/toogleSwitchCategory.js"></script>
<script src="../../../js/administrador/modals-products.js"></script>
<script src="../../../js/administrador/modals-editService.js"></script>
</body>
</html>