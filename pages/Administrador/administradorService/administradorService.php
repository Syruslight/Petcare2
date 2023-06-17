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
        <h1>Mis Servicios</h1> 
        <button class="add-newService">+Nuevo Servicio</button>            
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
           echo '<img class="edit-pencil" src="../../../imagenes/perfilAdmin/editPencil.png" alt="" width=35 height=35>';
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






    
    <script src="../../../js/Interacciones.js"></script>
    <script src="../../../js/previsualizarImagen.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="../../../js/administrador/toogleSwitchCategory.js"></script>
</body>
</html>