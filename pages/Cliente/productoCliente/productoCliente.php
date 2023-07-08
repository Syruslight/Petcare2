<?php
require('../../../controlador/conexion.php');
$conn = conectar();
?>

<?php
session_start();
$email = $_SESSION['email'];
foreach (listarCliente($email, $conn) as $key => $value) {
} ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scasle=1.0">
        <link rel="stylesheet" href='productoCliente.css'>
        <link rel="stylesheet" href='../editarCliente/estiloModalEditarCliente.css'>
        <link rel="stylesheet" href='../cliente.css'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <title>Pagina del cliente</title>
    </head>
<body>


<div class="wrapper">
        <div class="profile">
            <?php
            include('../components/navListCliente.php');
            ?>
        </div>
        <div class="dash-information">
            <?php
            include('../components/headerCliente.php');
            ?>
            
<section class="container-main">
    <div>
        <h2 class="mb-3">Catalogo de productos</h2>
    </div>
    <div class="row wrapped-main">
        <div class="busqueda">
            <h4>Categorias</h4>
            <div class="six">
                <span>Buscar: <input type="text" id="busqueda" class="form-control" placeholder="Ingrese nombre producto..."></span>
            </div> 
        </div>
        <div class="main-data">
            <aside class="categorias-row">
                <div class="categoria-list">
                    <div class="card">
                        <div class="card-header-categoria">
                            <button class="title btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCategoria" aria-expanded="false" aria-controls="collapseCategoria">
                                <span>Perros (48)</span>    
                                <i class="fa-solid fa-chevron-down" style="color: #00423f; right: 26px"></i>                       
                            </button>
                        </div>
                        <div class="card-body-categoria collapse show" id="collapseCategoria"> <!-- Agrega la clase "collapse" al contenedor del colapso -->
                            <ul class="values">
                                <li>
                                    <button class="btn" onclick="remplazarCheckIcon(this)">
                                        <i class="fa fa-square-o fa-xl" style="color: #00423f;"></i>
                                        <span>Comida (10)</span>
                                    </button>
                                </li>
                                <li>
                                    <button class="btn" onclick="remplazarCheckIcon(this)">
                                        <i class="fa fa-square-o fa-xl" style="color: #00423f;"></i>
                                        <span>Limpieza (11)</span>
                                    </button>
                                </li>
                                <li>
                                    <button class="btn" onclick="remplazarCheckIcon(this)">
                                        <i class="fa fa-square-o fa-xl" style="color: #00423f;"></i>
                                        <span>Cuidado (4)</span>
                                    </button>
                                </li>
                                <li>
                                    <button class="btn" onclick="remplazarCheckIcon(this)">
                                        <i class="fa fa-square-o fa-xl" style="color: #00423f;"></i>
                                        <span>Juguetes (8)</span>
                                    </button>
                                </li>
                                <li>
                                    <button class="btn" onclick="remplazarCheckIcon(this)">
                                        <i class="fa fa-square-o fa-xl" style="color: #00423f;"></i>
                                        <span>Accesorios (28)</span>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header-categoria">
                            <button class="title btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCategoriax1" aria-expanded="false" aria-controls="collapseCategoriax1">
                                <span>Gatos (89)</span>    
                                <i class="fa-solid fa-chevron-down" style="color: #00423f; right: 26px"></i>                       
                            </button>
                        </div>
                        <div class="card-body-categoria collapse show" id="collapseCategoriax1"> <!-- Agrega la clase "collapse" al contenedor del colapso -->
                            <ul class="values">
                                <li>
                                    <button class="btn" onclick="remplazarCheckIcon(this)">
                                        <i class="fa fa-square-o fa-xl" style="color: #00423f;"></i>
                                        <span>Comida (10)</span>
                                    </button>
                                </li>
                                <li>
                                    <button class="btn" onclick="remplazarCheckIcon(this)">
                                        <i class="fa fa-square-o fa-xl" style="color: #00423f;"></i>
                                        <span>Limpieza (11)</span>
                                    </button>
                                </li>
                                <li>
                                    <button class="btn" onclick="remplazarCheckIcon(this)">
                                        <i class="fa fa-square-o fa-xl" style="color: #00423f;"></i>
                                        <span>Cuidado (4)</span>
                                    </button>
                                </li>
                                <li>
                                    <button class="btn" onclick="remplazarCheckIcon(this)">
                                        <i class="fa fa-square-o fa-xl" style="color: #00423f;"></i>
                                        <span>Juguetes (8)</span>
                                    </button>
                                </li>
                                <li>
                                    <button class="btn" onclick="remplazarCheckIcon(this)">
                                        <i class="fa fa-square-o fa-xl" style="color: #00423f;"></i>
                                        <span>Accesorios (28)</span>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header-categoria">
                            <button class="title btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCategoriax2" aria-expanded="false" aria-controls="collapseCategoriax2">
                                <span>Conejo (67)</span>    
                                <i class="fa-solid fa-chevron-down" style="color: #00423f; right: 26px"></i>                       
                            </button>
                        </div>
                        <div class="card-body-categoria collapse show" id="collapseCategoriax2"> <!-- Agrega la clase "collapse" al contenedor del colapso -->
                            <ul class="values">
                                <li>
                                    <button class="btn" onclick="remplazarCheckIcon(this)">
                                        <i class="fa fa-square-o fa-xl" style="color: #00423f;"></i>
                                        <span>Comida (10)</span>
                                    </button>
                                </li>
                                <li>
                                    <button class="btn" onclick="remplazarCheckIcon(this)">
                                        <i class="fa fa-square-o fa-xl" style="color: #00423f;"></i>
                                        <span>Limpieza (11)</span>
                                    </button>
                                </li>
                                <li>
                                    <button class="btn" onclick="remplazarCheckIcon(this)">
                                        <i class="fa fa-square-o fa-xl" style="color: #00423f;"></i>
                                        <span>Cuidado (4)</span>
                                    </button>
                                </li>
                                <li>
                                    <button class="btn" onclick="remplazarCheckIcon(this)">
                                        <i class="fa fa-square-o fa-xl" style="color: #00423f;"></i>
                                        <span>Juguetes (8)</span>
                                    </button>
                                </li>
                                <li>
                                    <button class="btn" onclick="remplazarCheckIcon(this)">
                                        <i class="fa fa-square-o fa-xl" style="color: #00423f;"></i>
                                        <span>Accesorios (28)</span>
                                    </button>
                                </li>     
                            </ul>
                        </div>
                    </div>
                </div>
    
            </aside>
            <div class="list-product">
                <div class="card-product">
                    <div class="card-head-product">
                        <span>Carnaza pack 12 unids. sabor pollo</span>
                    </div>
                    <div class="card-img-product">
                        <img src="../../../imagenes/productos_servicios/productos/Comida adulto Bell´s 15 kg.jpg" alt="foto-producto">
                    </div>
                    <div class="card-footer-product">
                        <span>Precio: s/. 25.00</span>
                    </div>
                </div>
                <div class="card-product">
                    <div class="card-head-product">
                        <span>Carnaza pack 12 unids. sabor pollo</span>
                    </div>
                    <div class="card-img-product">
                        <img src="../../../imagenes/productos_servicios/productos/Comida adulto Bell´s 15 kg.jpg" alt="foto-producto">
                    </div>
                    <div class="card-footer-product">
                        <span>Precio: s/. 25.00</span>
                    </div>
                </div>
                <div class="card-product">
                    <div class="card-head-product">
                        <span>Carnaza pack 12 unids. sabor pollo</span>
                    </div>
                    <div class="card-img-product">
                        <img src="../../../imagenes/productos_servicios/productos/Comida adulto Bell´s 15 kg.jpg" alt="foto-producto">
                    </div>
                    <div class="card-footer-product">
                        <span>Precio: s/. 25.00</span>
                    </div>
                </div>
                <div class="card-product">
                    <div class="card-head-product">
                        <span>Carnaza pack 12 unids. sabor pollo</span>
                    </div>
                    <div class="card-img-product">
                        <img src="../../../imagenes/productos_servicios/productos/Comida adulto Bell´s 15 kg.jpg" alt="foto-producto">
                    </div>
                    <div class="card-footer-product">
                        <span>Precio: s/. 25.00</span>
                    </div>
                </div>
                <div class="card-product">
                    <div class="card-head-product">
                        <span>Carnaza pack 12 unids. sabor pollo</span>
                    </div>
                    <div class="card-img-product">
                        <img src="../../../imagenes/productos_servicios/productos/Comida adulto Bell´s 15 kg.jpg" alt="foto-producto">
                    </div>
                    <div class="card-footer-product">
                        <span>Precio: s/. 25.00</span>
                    </div>
                </div>
                <div class="card-product">
                    <div class="card-head-product">
                        <span>Carnaza pack 12 unids. sabor pollo</span>
                    </div>
                    <div class="card-img-product">
                        <img src="../../../imagenes/productos_servicios/productos/Comida adulto Bell´s 15 kg.jpg" alt="foto-producto">
                    </div>
                    <div class="card-footer-product">
                        <span>Precio: s/. 25.00</span>
                    </div>
                </div>
                <div class="card-product">
                    <div class="card-head-product">
                        <span>Carnaza pack 12 unids. sabor pollo</span>
                    </div>
                    <div class="card-img-product">
                        <img src="../../../imagenes/productos_servicios/productos/Comida adulto Bell´s 15 kg.jpg" alt="foto-producto">
                    </div>
                    <div class="card-footer-product">
                        <span>Precio: s/. 25.00</span>
                    </div>
                </div>
                <div class="card-product">
                    <div class="card-head-product">
                        <span>Carnaza pack 12 unids. sabor pollo</span>
                    </div>
                    <div class="card-img-product">
                        <img src="../../../imagenes/productos_servicios/productos/Comida adulto Bell´s 15 kg.jpg" alt="foto-producto">
                    </div>
                    <div class="card-footer-product">
                        <span>Precio: s/. 25.00</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
</div>

<?php
                include('../../Cliente/editarCliente/modalEditarCliente.php');
                ?>


                <?php
                include('../components/footerCliente.php');
                ?>



































































<script src="../../js/previsualizarImagen.js"></script>
                <script src="../../../js/Interacciones.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/b9a2b0c154.js" crossorigin="anonymous"></script>
    <script src="../../../js/cliente/filtroProducto.js"></script>
</body>
</html>