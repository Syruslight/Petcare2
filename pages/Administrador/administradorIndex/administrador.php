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
    <link rel="stylesheet" href='administrador.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href='../components/navListAdministrador.css'>
    <link rel="stylesheet" href='../components/headerAdministrador.css'>
    <link rel="stylesheet" href='../editAdministrador/editModalAdministrador.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <title>Pagina de administrador</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            // Ejecutar la búsqueda al cargar la página
            buscarClientes('');

            $('#busqueda').on('input', function () {
                var query = $(this).val();
                buscarClientes(query);
            });
        });

        function buscarClientes(query) {
            $.ajax({
                url: '../../../llamadas/proceso_busqueda_cliente.php',
                method: 'POST',
                data: { query: query },
                success: function (response) {
                    $('#resultados').html(response);
                }
            });
        }
    </script>
<style>
    .custom-modal {
  display: none;
  position: fixed;
  z-index: 9999;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  
}

.custom-modal-content {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: #fff;
  padding: 20px;
  border-radius: 5px;
  width: 400px; 
}

.custom-modal-body {
  margin-bottom: 20px;
}

.custom-modal-footer {
  text-align: right;
}

.btn {
  padding: 8px 16px;
  margin-left: 5px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.btn-primary {
  background-color: #007bff;
  color: #fff;
}

.btn-secondary {
  background-color: #ccc;
  color: #fff;
}

</style>

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
             <h1 class="tituloProductos">Productos Populares del Mes</h1>
            <div class="wrapper-drawer">
             

                    
                    
                    
                    <!-- Swiper -->
                    
                    
                    <div class="swiper">
    <div class="swiper-wrapper">
        
        <!-- Inicia contenedor de swiper -->
        <?php
        $productos = listarProductos($conn);
        foreach ($productos as $producto) {
            echo '<div class="swiper-slide">';
            echo '<div class="cardpet-sup">';
            echo '<div class="cardpet">';
            echo '<img src="../../../imagenes/productos_servicios/productos/' . $producto['foto'] . '" width="60" height="60">';
            echo '<span class="type-product">' . $producto['nombre'] . '</span>';
            echo '<span class="type-category">' . $producto['tipo'] . '</span>'; 
            echo '<span class="price">s/.' . $producto['precio'] . '</span>';
            echo '</div>';
           
            echo '</div>';
            echo '</div>';
        }
        ?>
        <!-- Finaliza contenedor de swiper -->

    </div>

    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div> <!-- Finish Swiper -->


            
        </div>
            <div class="wrapper-myclients">
                <div class="subwrapper-myclients">
                    <div class="clients-search">
                        <h1>Mis Clientes</h1>
                        
                    </div>
                    <div class="wrapper-search">
                        <span>Buscar: <input type="search" id="busqueda" name="searchuser"
                                placeholder="Dni, nombre, telefono..."></span>
                    </div>
                    <div id="resultados">

                    </div>
                </div>
               

            </div>



            <?php
            include('../components/footerAdministrador.php');
            ?>

<?php
            include('../editAdministrador/editModalAdministrador.php');
            ?>

        </div>




    </div>

    </div>

    </div>




<div class="custom-modal" id="confirmModal">
  <div class="custom-modal-content">
    <div class="custom-modal-body">
      <p>¿Desea salir de la cuenta?</p>
    </div>
    <div class="custom-modal-footer">
      <button type="button" class="btn btn-secondary" id="cancelBtn">Cancelar</button>
      <button type="button" class="btn btn-primary" id="confirmBtn">Aceptar</button>
    </div>
  </div>
</div>
    

    <script>
  document.addEventListener('DOMContentLoaded', function() {
  const logoutBtn = document.getElementById('logoutBtn');
  const confirmModal = document.getElementById('confirmModal');
  const confirmBtn = document.getElementById('confirmBtn');
  const cancelBtn = document.getElementById('cancelBtn');

  logoutBtn.addEventListener('click', function() {
    confirmModal.style.display = 'block';
  });

  confirmBtn.addEventListener('click', function() {
    cerrarSesion();
  });

  cancelBtn.addEventListener('click', function() {
    confirmModal.style.display = 'none';
  });

  function cerrarSesion() {
    fetch('../../../llamadas/proceso_cerrar_sesion.php', {
      method: 'POST'
    })
      .then(function(response) {
        if (response.ok) {
          window.location.href = '../../../index.php';
        } else {
          console.log('Error al cerrar sesión');
        }
      })
      .catch(function(error) {
        console.log('Error al cerrar sesión:', error);
      });
  }
});

</script>


<script src="../../../js/previsualizarImagen.js"></script>
    <script src="../../../js/Interacciones.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="../../../js/swiperAdmin.js"></script>

</body>

</html>