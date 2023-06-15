

<link rel="stylesheet" href='navListAdmin.css'>
        
<div class="first-seccion">
                <div class="logo">
                    <img src="../../../imagenes/perfilAdmin/logo.png" alt="Logo" width="168" height="46">
                </div>
                <!--Codigo php para obtener la variable usuario-->
                <?php
               
                foreach (listarAdministrador($email, $conn) as $key => $value) {
                    ?>
                    <img class="photo-profile porky"src="../../../imagenes/fotosperfil/administrador/<?= $value[6] ?>" alt="profile" width="217"
                        height="227">
                    <div class="profile-information">

                        <span class="user">
                            <?= $value[0] ?>
                            <?= $value[1] ?>
                        </span>
                        <img class="boton-modal" src="../../../imagenes/perfilAdmin/pencil.png" alt="pencil" width="32"
                            height="30">
                    </div>
                    <span class="id">DNI:
                        <?= $value[2] ?>
                    </span>
                    <?php
                }
                ?>
</div>
<div class="second-seccion">
                    <div class="categories">
                        <a href="../administradorIndex/administrador.php">
                        <div class="icons">
                            <img src="https://img.icons8.com/ios/50/null/health-data.png" width="25" height="25" />
                            <span class="principal">Principal</span>
                        </div>
                        </a>    
                        <a href="../administradorProducts/administradorProducts.php">
                            <div class="icons">
                                <img src="https://img.icons8.com/ios/50/null/chat-message-sent.png" width="25" height="25" />
                                <span class="list">Productos</span>
                            </div>
                        </a>
                        <a href="../administradorService/administradorService.php">
                            <div class="icons">
                                <img src="https://img.icons8.com/ios/50/null/database--v1.png" width="25" height="25" />
                                <span class="list">servicios</span>
                            </div>
                        </a>
                        <a href="../administradorCategory/administradorCategory.php">

                            <div class="icons">
                                <img src="https://img.icons8.com/ios/50/null/appointment-reminders--v1.png" width="25"
                                height="25" />
                                <span class="list">Categoria </span>
                            </div>
                        </a>
                        <div class="icons">
                            <img src="https://img.icons8.com/ios/50/null/settings--v1.png" width="25" height="25" />
                            <span class="list">Reserva una cita</span>
                        </div>
                        <a href="../administradorAccounts/administradorAccounts.php">
                        <div class="icons">
                            <img src="https://img.icons8.com/ios/50/null/settings--v1.png" width="25" height="25" />
                            <span class="list">Cuentas</span>
                        </div>
                        </a>
                        <div class="icons">
                            <img src="https://img.icons8.com/ios/50/null/help--v1.png" width="25" height="25" />
                            <span class="list">Ayuda</span>
                        </div>


                        <div class="sign-off">

                            <img src="https://img.icons8.com/ios/50/null/shutdown--v1.png" width="25" height="25" />
                            <form action="../../../llamadas/proceso_cerrar_sesion.php" method="POST">
                                <button type="submit" class="list" name="">Cerrar sesión</button>
                            </form>

                        </div>
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
                <form action="../../../llamadas/proceso_actualizarDatosAdministrador.php" enctype="multipart/form-data" method="POST">
                        
                        <div class="editheader">
                            <aside class="contfoto">
                                <img class="fotous" src="../../../imagenes/fotosperfil/administrador/<?= $value[6] ?>" class="modal__img" width="95" height="89">
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
                            
                            <input hidden name="idadministrador"   value="<?= $value[7] ?> "required>
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

    <script src="../../../js/Modal.js"></script>

