<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="Estilos_modal_L&R.css">

    <title>LandingPage</title>
</head>
<<<<<<< Updated upstream
<body >
=======

<body>
>>>>>>> Stashed changes
    <header class="header" id="Inicio">
        <!-- <nav class="navbar navbar-light bg-dark">
            <div class="container">
                <img class="logo" src="Imagenes/PHlogo.png" alt="Pet&Care">
            </div>
        </nav> -->

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg header-nav fixed-top top-nav-collapse">
            <div class="container-fluid ms-4 me-4">
                <!-- Logo -->
                <a class="navbar-brand" href="#">
                    <img class="logo" src="Imagenes/PHlogo.png" alt="Pet&Care">
                </a>
                <!-- Fin Logo -->
                <!--NavBarDesplegable -->
                <button class="navbar-toggler border" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <!--FIN NavBarDesplegable -->
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="#Inicio">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#row-nosotros">Quienes somos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#row-servicios">Servicios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#row-productos">Productos</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <button class="boton-modal" role="button" onclick="openmodalLogin()" type="submit">Iniciar Sesión</button>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Fin Navbar -->

        <!-- CARRUSEL -->
        <section class="carousel slide" id="carousel-weston">
            <!-- slides -->
            <div class="carousel-inner">
                <!-- Imagen #1 -->
                <div class="carousel-item active ">
                    <div class="d-block wimg ig1"></div>
                </div>
                <!-- Imagen #2 -->
                <div class="carousel-item ">
                    <div class="d-block wimg ig2"></div>
                </div>
                <!-- Imagen #3 -->
                <div class="carousel-item ">
                    <div class="d-block wimg ig3"></div>
                </div>
            </div>
            <!-- Fin slides -->
            <!-- Cambiar de imagen carrusel iconos -->
            <a href="#carousel-weston" class="carousel-control-prev" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a href="#carousel-weston" class="carousel-control-next" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
            <!-- Fin Cambiar de imagen carrusel iconos -->
        </section>
        <!-- Texto dentro -->
        <div class="container">
            <div class="tittle">
                <h1 class="mb-5 shad">Atención 24H</h1>
                <p>Nuestra pasión es trabajar juntos para la salud y<br>
                    el bienestar de tu mascota <i class="fa-sharp fa-solid fa-shield-heart fa-beat fa-lg" style="color: #ffffff;"></i><br></p>

                <button type="button" class="btn mt-2">Registrate</button>
            </div>
        </div>
        <!-- Fin Texto dentro -->
        <!-- FIN CARRUSEL -->
    </header>
    <main>
        <!-- Nosotros -->
        <div class="row" id="row-nosotros">
            <div class="container">
                <div class="row">
                    <!-- Imagen -->
                    <div class="col-md-6 text-center">
                        <img src="Imagenes/AboutUS.jpg" alt="Nosotros" class="">
                    </div>
                    <!-- Fin Imagen -->
                    <!-- Texto y Titulo -->
                    <div class="col-md-6 mt-2">
                        <h1 class="mb-2 text-center">Sobre Nosotros</h1>
                        <p>Somos una veterinaria especializada en el cuidado estético de
                            animales, nosdedicamos a proporcionar servicios de alta calidad
                            para mejorar la apariencia y el bienestar de sus mascotas.
                            Nos esforzamos por mantener un ambiente amigable y cómodo para nuestros pacientes, y estamos comprometidos en brindar un servicio personalizado para satisfacer las necesidades individuales de cada uno. </p>
                        <p>Como parte de nuestro compromiso con nuestros clientes y sus mascotas, ofrecemos servicios de urgencias las 24 horas del día para garantizar la tranquilidad y seguridad de nuestros pacientes en caso de emergencia.</p>
                    </div>
                    <!-- Fin Texto y Titulo -->
                </div>
            </div>
        </div>
        <!-- Fin Nosotros -->
        <!-- Servicios -->
        <div class="row" id="row-servicios">
            <div class="conte-servicio text-center">
                <!-- Titulo y texto -->
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <h1>Nuestros Servicios</h1>
                        <p>Nos caracterizamos por ofrecer los mejores servicios calidad-precio para su mascota</p>
                    </div>
                </div>
                <!-- Fin Titulo y texto -->
                <!-- Items Servicio-->
                <div class="row mt-4 justify-content-center">
                    <div class="col-12 col-md-6 col-lg-3 card ">
                        <img src="Imagenes/mujer-corta-perro-perro-sentado-sofa-raza-yorkshire-terrier.jpg" alt="Baño y Corte">
                        <h4 class="mt-4">Baño y Corte</h4>
                        <p>Baño y cuidado del pelaje de su mascota, incluyendo el corte y arreglo del mismo.</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 card">
                        <img src="Imagenes/cerca-veterinario-cuidando-perro.jpg" alt="Consultas">
                        <h4 class="mt-4">Consultas</h4>
                        <p>Consultas para identificar y tratar cualquier problema de salud de su mascota</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 card">
                        <img src="Imagenes/lavar-perro-mascota-casa.jpg" alt="Enmotado">
                        <h4 class="mt-4">Baño Medicado</h4>
                        <p>Proporcionar cuidado adicional para la piel y el pelaje de su mascota con prodcutos medicados específicos para el tipo de affeción de la piel de su mascota.</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 card">
                        <img src="Imagenes/veterinario-cepillo-animales-mujer-camiseta-negra-gato-sofa.jpg" alt="Enmotado">
                        <h4 class="mt-4">Enmotado</h4>
                        <p>Proporcionar una experiencia personalizada y lujosa para la mascota, que incluye un enfoque relajado y cómodo para el cuidado estético</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 card">
                        <img src="Imagenes/perro-negro-grande-obteniendo-procedimiento-salon-peluqueria-mujer-joven-camiseta-blanca-peinando-perro-perro-atado-mesa-azul.jpg" alt="Enmotado">
                        <h4 class="mt-4">Deslanado</h4>
                        <p>Eliminar la capa inferior de pelo muerto que a menudo queda atrapada en el pelaje de la mascota, lo que puede llevar a problemas de enredos</p>
                    </div>
                </div>
                <!-- Fin Items Servicio-->
            </div>
        </div>
        <!-- Fin Servicios -->
        <div class="row" id="row-contacto">
        </div>
        <!-- Frase -->
        <div class="row" id="row-frase">
            <div class="container text-center">
                <h3>La grandeza de una nación y su progreso moral puede ser juzgado
                    por la forma en que sus animales son tratados</h3>
                <h3 class="mt-4  font-weight-bold">- Mahatma Gandhi</h3>
            </div>
        </div>
        <!-- Fin Frase -->
        <div class="row" id="row-productos">
        </div>
        <!-- Productos -->
        <div class="productos mb-5" id="productos">
            <h1 class="heading"> Nuestros Productos</h1>
            <div class="container">
                <!-- Card #1 -->
                <div class="box">
                    <img class="image" src="Imagenes/comida.png" alt="">
                    <div class="content">
                        <img src="Imagenes/ComidaIcono.png" alt="">
                        <h3>Comida</h3>
                        <p>Proporcionamos a nuestros clientes una amplia variedad de opciones de alimentos para mascotas de alta calidad, saludables y nutritivas. Como profesionales trabajamos en conjunto con nuestros clientes para entender las necesidades nutricionales específicas de la mascota y recomendar productos que satisfagan sus necesidades.</p>
                    </div>
                </div>
                <!-- FIN Card #1 -->
                <!-- Card #2 -->
                <div class="box">
                    <img src="Imagenes/JugueteMascota.jpg" alt="" class="image">
                    <div class="content">
                        <img src="Imagenes/JugueteIcono.png" alt="">
                        <h3>Juguetes</h3>
                        <p>Proporcionamos una amplia variedad de juguetes de alta calidad para sus mascotas. Estos juguetes están diseñados específicamente para satisfacer las necesidades de juego y entretenimiento de las mascotas, ayudando a mejorar su salud y bienestar general.</p>
                    </div>
                </div>
                <!-- FIN Card #2 -->
            </div>
        </div>
        <!-- Fin Productos -->
    </main>

    <!-- Iplementando un login modal en la pagina web -->

    <section class="modal ">
        <div class="modal__container">
            <div class="wrapper">
                <div class="top-form">
                    <div id="close-modal">
                        &#10006
                    </div>
                </div>
                <!-- Proceso de iniciar sesión -->
                <div class="form-wrapper logeo">
                    <form action="llamadas/proceso_logeoportipo.php" method="POST">
                        <b>
                            <h2 class="texto-h2">Iniciar sesión</h2>
                        </b>
                        <p class="textoparrafo">Entérate de las novedades que tenemos en Pet&Care para tí y tus mascotas</p>
                        <div class="input-group">
                            <input class="estilo-separado" type="text" name="email" required>

                            <label for=""><i class="fa-solid fa-envelope icono-log"></i> Correo electronico</label>
                        </div>
                        <div class="input-group">
                            <input class="estilo-separado" type="password" name="pass" required>

                            <label for=""><i class="fa-solid fa-lock icono-log"></i> Contraseña</label>
                        </div>
                        <button class="btnlogin">INICIAR SESIÓN</button>
                        <div class="link">

                            <!-- Llamada al registro por si no cuenta con cuenta -->
                            <p>¿Aún no tienes cuenta? <a class="btnlinklogin" href="#">Registrarse</a></p>
                        </div>
                    </form>
                </div>

                <!-- vista registro de usuario -->
                <div class="form-wrapper registro">
                    <form action="llamadas/proceso_registrousuario.php">
                        <b>
                            <h2 class="texto-h2">Registrar datos</h2>
                        </b>
                        <p class="textoparrafo">Únete a la familia de Pet&Care para conocer todos los beneficios que tenemos</p>
                        <div class="input-group">
                            <input class="estilo-separado" type="text" name="email" required>

                            <label for=""> <i class="fa-solid fa-envelope icono-reg"></i> Correo electronico</label>
                        </div>
                        <div class="input-group">
                            <input class="estilo-separado" type="password" name="pass" required>

                            <label for=""><i class="fa-solid fa-lock icono-reg"></i> Contraseña</label>
                        </div>
                        <div class="terminos">
                            <label for=""><input type="checkbox"> Estoy de acuerdo con los terminos & condiciones</label>
                        </div>
                        <!-- Llamada por a la vista login por si tiene cuenta -->
                        <button class="btnregistro">REGISTRAR</button>
                        <div class="link">
                            <p>¿Ya tienes cuenta? <a class="btnregistrolink" href="#">Iniciar sesión</a></p>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-dark text-white py-4">
        <div class="container text-center mt-3">
            <div class="row">
                <!-- Logo -->
                <a href="#" class="col-md-3 col-lg-3 col-xl-3 mx-auto text-reset text-uppercase d-flex align-items-center mb-4">
                    <img src="Imagenes/PHlogo.png" alt="logo" class="logo">
                </a>
                <!-- Fin Logo -->
                <!-- menu -->
                <ul class="col-md-2 col-lg-2 col-xl-2 mx-auto list-unstyled">
                    <li class="font-weight-bold text-uppercase mb-4"><span>Navegación</span></li>
                    <hr class="mb-4">
                    <li><a href="#row-nosotros" class="text-reset">Somos</a></li>
                    <li><a href="#row-servicios" class="text-reset">Servicios</a></li>
                    <li><a href="#row-productos" class="text-reset">Productos</a></li>
                </ul>
                <!-- Fin menu -->
                <!-- Breve Descripción -->
                <ul class="col-md-2 col-lg-2 col-xl-2 mx-auto list-unstyled">
                    <li class="font-weight-bold text-uppercase mb-4">Nosotros</li>
                    <hr class="mb-4">
                    <p>En <span>Pet&Care</span> trabajamos juntos para mantener a tu compañero feliz y saludable</p>
                </ul>
                <!-- Fin Breve Descripción -->
                <!-- Redes Sociales -->
                <ul class="col-md-2 col-lg-2 col-xl-2 mx-auto list-unstyled">
                    <li class="font-weight-bold mb-4">Redes Sociales</li>
                    <hr class="mb-4">
                    <li class="d-flex justify-content-between py-4 social-red">
                        <a href="#" class="text-reset"><i class="fa-brands fa-square-facebook fa-beat"></i></a>
                        <a href="#" class="text-reset"><i class="fa-brands fa-square-twitter fa-beat"></i></a>
                        <a href="#" class="text-reset"><i class="fa-brands fa-square-instagram fa-beat"></i></a>
                        <a href="#" class="text-reset"><i class="fa-brands fa-youtube fa-beat"></i></a>
                        <a href="#" class="text-reset"><i class="fa-brands fa-tiktok fa-beat"></i></a>

                    </li>

                </ul>
                <!-- Fin Redes Sociales -->
                <hr class="mb-4">
                <div class="text-center mb-2">
                    <strong>©2023</strong> Pet&Care. Todos los derechos reservados.
                    <a href="#">
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script src="js/Registro_Login_int.js"></script>
    <script src="js/Interacciones.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b9a2b0c154.js" crossorigin="anonymous"></script>
</body>

</html>