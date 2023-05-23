<?php
require('../../controlador/conexion.php');
$conn = conectar();
?>
  <?php
                session_start();
                $email = $_SESSION['email'];
                foreach (listarCliente($email, $conn) as $key => $value) {
                }?>


<!--Perfil del cliente (deriva o esta incluido de su pagina principal)-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='cliente.css'>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script> -->
    <title>Pagina del cliente</title>
</head>

<body style="
    margin-top: 0px;
    margin-left: 0px;
    margin-bottom: 0px;
    margin-right: 0px;
    ">


    <div class="wrapper">
        <div class="profile">
        <?php
            include('components/navListCliente.php');
        ?> 
        </div>
            <div class="dash-information">

                
            <div class="wrapper-petypuntos">
                <div class="petypuntos-top">
                    <span class="tittle-petypuntos"> Mis pety Puntos </span>
                </div>
                <div class="petypuntos-bot">
                    <div class="petyscore-img">
                        <img src="../../imagenes/perfilCliente/CHANCHITO1.png" alt="Chanchito" width="212" height="184">
                    </div>
                    <div class="canjear-petypuntos">
                        <div class="petypuntos-uno">
                            <div class="petypuntos-acumulados">
                                <div class="acumulados">
                                    <img src="https://img.icons8.com/ios/50/null/checked-2--v1.png" width="14"
                                        height="15" />
                                    <p>Puntos acumulados</p>
                                </div>
                                <div class="petyscore">
                                    <span>580 </span>
                                    <p>Pety puntos </p>
                                </div>
                            </div>
                            <div class="petypuntos-canjeados">
                                <div class="acumulados">
                                    <img src="https://img.icons8.com/ios/50/null/checked-2--v1.png" width="14"
                                        height="15" />
                                    <p>Puntos canjeados</p>
                                </div>
                                <div class="petyscore">
                                    <span>580 </span>
                                    <p>Pety puntos </p>
                                </div>
                            </div>

                        </div>

                        <button type="button">Canjear Puntos</button>
                    </div>
                    <div class="resumen-petypuntos">
                        <div class="wrapper-resumen">
                            <h1 class="subtittle-petypuntos">Resumen de Pety Puntos</h1>
                            <span class="info-petypuntos">Estimado usuario, recuerde que al canjear el cupón de puntos
                                en la adquisición de un producto o servicio, este tiene un limite de tiempo, se efectúa
                                una sola vez y no se aceptan devoluciones</span>
                        </div>
                        <button class="see-more" type="button">Ver mas...</button>
                    </div>
                </div>

            </div>
            <div class="wrapper-pets">
                <h1>Mis Mascotas</h1>
                <div class="my-pets">

                    <div class="subwrapper-pets">

                        <div class="ballot-pets"> <!--Primer pet -->
                            <div class="picture-pet">
                                <img src="../../imagenes/perfilCliente/dog.png" alt="Logo" width="119" height="120">
                                <span>Nombre: Colita</span>
                            </div>

                            <div class="info-pets">
                                <div class="info-text">
                                    <span>Edad:2 años(s)</span>
                                    <span>Sexo:Masculino</span>
                                    <span>Peso:12kg</span>
                                </div>
                                <div>
                                    <img class="edits-pets" src="../../imagenes/perfilCliente/edit-pencil.png"
                                        alt="Logo" width="35" height="34">
                                    <img class="pdf-pets" src="../../imagenes/perfilCliente/pdf.png" alt="Logo"
                                        width="46" height="42">
                                </div>
                            </div>
                        </div>

                        <div class="ballot-pets"> <!--segundo pet -->
                            <div class="picture-pet">
                                <img src="../../imagenes/perfilCliente/cat.png" alt="Logo" width="119" height="120">
                                <span>Nombre: Nube</span>
                            </div>

                            <div class="info-pets">
                                <div class="info-text">
                                    <span>Edad:1 años(s)</span>
                                    <span>Sexo:Femenino</span>
                                    <span>Peso:5kg</span>
                                </div>
                                <div>
                                    <img class="edits-pets" src="../../imagenes/perfilCliente/edit-pencil.png"
                                        alt="Logo" width="35" height="34">
                                    <img class="pdf-pets" src="../../imagenes/perfilCliente/pdf.png" alt="Logo"
                                        width="46" height="42">
                                </div>
                            </div>
                        </div>

                        <div class="ballot-pets"> <!--TERCER pet -->
                            <div class="picture-pet">
                                <img src="../../imagenes/perfilCliente/rabbit.png" alt="Logo" width="119" height="120">
                                <span>Nombre: Copo</span>
                            </div>

                            <div class="info-pets">
                                <div class="info-text">
                                    <span>Edad:3 años(s)</span>
                                    <span>Sexo:Masculino</span>
                                    <span>Peso:3kg</span>
                                </div>
                                <div>
                                    <img class="edits-pets" src="../../imagenes/perfilCliente/edit-pencil.png"
                                        alt="Logo" width="35" height="34">
                                    <img class="pdf-pets" src="../../imagenes/perfilCliente/pdf.png" alt="Logo"
                                        width="46" height="42">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <img class="add-pet" src="https://img.icons8.com/ios/50/plus-2-math.png" alt="plus-2-math" />
                    </div>
                </div>

            </div>

            <div class="header-activities">
                <span>Actividad Reciente:</span>
            </div>
            <div class="wrapper-activities">
                <div class="colors">
                    <div class="color-yellow">

                    </div>
                    <div class="color-turquese">

                    </div>
                    <div class="color-skyblue">

                    </div>
                </div>
                <div class="info-activities">
                    <div class="scheme">
                        <h1 class="tittle-activities">
                            Producto
                        </h1>
                        <span>Baño Medico</span>
                        <span>Peluqueria</span>
                        <span>Paquete 4 (baño+corte)</span>
                    </div>
                    <div class="scheme">
                        <h1 class="tittle-activities">
                            Fecha-Hora
                        </h1>
                        <span>24/02/2023 - 14:00</span>
                        <span>26/02/2023 - 18:00</span>
                        <span>01/03/2023 - 20:00</span>
                    </div>
                    <div class="scheme">
                        <h1 class="tittle-activities">
                            Precio
                        </h1>
                        <span>s./ 90.00</span>
                        <span>s./ 40.00</span>
                        <span>s./ 110.00</span>
                    </div>
                    <div class="scheme">
                        <h1 class="tittle-activities">
                            Estado
                        </h1>
                        <span id="miTexto"> Activo</span>
                        <span id="miTexto"> Inactivo</span>
                        <span id="miTexto"> Activo </span>
                    </div>
                    <div class="scheme">
                        <h1 class="tittle-activities">
                            Puntos
                        </h1>
                        <span>9 pts</span>
                        <span>4 pts</span>
                        <span>11pts </span>
                    </div>
                </div>

            </div>
            <div class="footer">
                <span class="copyrigth">©</span>
                <span> Vet&Care, todos los derechos reservados.</span>
            </div>

            <!-- <div>

            <button type="button" onclick="window.location.href='../mascota/registro.php'">Registrar Mascota</button>
        </div> -->
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
                    <form action="../../llamadas/proceso_actualizarDatosCliente.php" enctype="multipart/form-data" method="POST">
                        
                        <div class="editheader">
                            <aside class="contfoto">
                                <img class="fotous" src="../../imagenes/fotosperfil/cliente/<?= $value[6] ?>" class="modal__img" width="95" height="89">
                                <input id="foto" type="file" name="foto">
                                
                            </aside>
                            <section class="textonomap">
                                <div class="input-group">
                                    <input class="estilo-separado" type="text" name="nombres" value="<?= $value[0] ?>" required>
                                    <label for=""> Nombres</label>
                                    
                                </div>
                                <div class="input-group">
                                    <input class="estilo-separado" type="text" name="apellidos"  value="<?= $value[1] ?>" required>
                                    <label for=""> Apellidos</label>
                                </div>

                            </section>                                       
                                 </div>
                        <div class="modalinf">
                            <div class="input-group1">
                                <input class="estilo-separado1" type="TEXT" name="telefono"  value="<?= $value[3] ?>" required>
                                <label for=""> Telefono</label>
                            </div>
                            <div class="input-group2">
                                <input class="estilo-separado1" type="TEXT" name="dni"  value="<?= $value[2] ?> "required>
                                <label for=""> DNI</label>
                            </div>
                            
                            <input hidden name="idcliente"  value="<?= $value[7] ?> "required>
                            <input hidden name="foto2"  value="<?= $value[6] ?> "required>
                        </div> 
                        <div class="modalFoot">
                                <div class="input-group3">
                                <input class="estilo-separado" type="text" name="direccion"  value="<?= $value[4] ?>" required>
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
                    
                    
                    <script src="../../js/Modal.js"></script>
                    
                    </body>

</html>