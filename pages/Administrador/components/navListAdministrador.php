


        
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
      

    




