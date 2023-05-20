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
        <div class="dash-header">
            <span class="tittle-header"><?=$value[0]?>  <?=$value[1]?></span> <!--Se abre codigo php para invocar a la sesion del 'usuario'-->
            <img src="../../../imagenes/fotosperfil/administrador/<?=$value[6]?>" alt="profile" width="38" height="39">
        </div>
       
  
<div class="wrapper-services">
   <div class="header-services">
        <h1>Mis Servicios</h1> 
        <div class="edit-create">
            <img src="../../../imagenes/perfilAdmin/editPencil.png" width="74" height="62">
            <button class="button-create">Crear</button>
        </div>
   </div>
   <div class="wrapper-deck">
            <div class="card">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Baño</h5>
                <p class="card-text">s/.20.</p>
            </div>
            </div>
            <div class="card">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Baño</h5>
                <p class="card-text">s/.20.</p>
            </div>
            </div>
            <div class="card">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Baño</h5>
                <p class="card-text">s/.20.</p>
            </div>
            </div>
            <div class="card">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Baño</h5>
                <p class="card-text">s/.20.</p>
            </div>
            </div>
            <div class="card">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Baño</h5>
                <p class="card-text">s/.20.</p>
            </div>
            </div>
            <div class="card">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Baño</h5>
                <p class="card-text">s/.20.</p>
            </div>
            </div>
   </div>
</div>


        <!-- <div class="footer">
            <span class="copyrigth">©</span>
            <span> Vet&Care, todos los derechos reservados.</span>
        </div> -->


</div>


     
</div>
</div>
<section class="modal">
        <div class="modal__wrapper">
            <div class="modal__first">
                <div class="modal__logoclose">
                    <img class="modal__close" src="../../../imagenes/perfilCliente/close.png" alt="pencil" width="32"
                        height="30">
                </div>
                <div class="modal__profile">
                    <img src="../../../imagenes/perfilCliente/profile.png" class="modal__img" width="95" height="89">
                    <img class="" src="../../../imagenes/perfilCliente/pencil.png" width="32" height="30">
                </div>
                <span class="modal__user">
                    <?= $_SESSION['usuario'] ?>
                </span>
            </div>
            <div class="modal__data">
                <div class="moda__info">
                    <span>Nombre</span>
                    <input type="text" name="nombre" value="John Doe">
                </div>
                <div class="moda__info">
                    <span>Telefono</span>
                    <input type="text" name="nombre" value="John Doe">
                </div>
                <div class="moda__info">
                    <span>Direccion</span>
                    <input type="text" name="nombre" value="John Doe">
                </div>
            </div>
            <button class="modal__button">Actualizar Datos</button>
        </div>
    </section>
    </section>


    
<script src="../../../js/modalCliente.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>