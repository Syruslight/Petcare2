


        
<div class="first-seccion">
                <div class="logo">
                    <img class="image-logoPetcare" src="../../../imagenes/perfilAdmin/logo.png" alt="Logo" width="168" height="46">
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
                        <img class="openModalAdministrador" src="../../../imagenes/perfilAdmin/pencil.png" alt="pencil" width="32"
                            height="30" onclick="openModalAdministrador()">
                    </div>
                    <span class="id">DNI:
                        <?= $value[2] ?>
                    </span>
                    <?php
                }
                ?>
</div>
<div class="second-seccion">
<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<style>
.categories a.active {
    background-color: yellow;
    border-radius: 10px;
}
</style>
     
                    <div class="categories">
                    <a href="../administradorIndex/administrador.php" <?php echo ($current_page === "administrador.php") ? 'class="active"' : ''; ?>>
                        <div class="icons">
                        <img src="https://img.icons8.com/ios/50/null/health-data.png" width="25" height="25" />
                        <span class="principal">Principal</span>
                        </div>
                    </a>
                    <a href="../administradorProducts/administradorProducts.php" <?php echo ($current_page === "administradorProducts.php") ? 'class="active"' : ''; ?>>
                        <div class="icons">
                        <img src="https://img.icons8.com/ios/50/null/chat-message-sent.png" width="25" height="25" />
                        <span class="list">Productos</span>
                        </div>
                    </a>
                        <a href="../administradorService/administradorService.php" <?php echo ($current_page === "administradorService.php") ? 'class="active"' : ''; ?> >
                            <div class="icons">
                                <img src="https://img.icons8.com/ios/50/null/database--v1.png" width="25" height="25" />
                                <span class="list">servicios</span>
                            </div>
                        </a>

                        <a href="../administradorCategory/administradorCategory.php" <?php echo ($current_page === "administradorCategory.php") ? 'class="active"' : ''; ?> >

                            <div class="icons">
                                <img src="https://img.icons8.com/ios/50/null/appointment-reminders--v1.png" width="25"
                                height="25" />
                                <span class="list">Categoria </span>
                            </div>
                        </a>

                        <a href="../../../../pages/Administrador/ReservaCitas/reservaCitas.php" <?php echo ($current_page === "reservaCitas.php") ? 'class="active"' : ''; ?>>
                        <div class="icons">
                            <img src="https://img.icons8.com/ios/50/null/settings--v1.png" width="25" height="25" />
                            <span class="list">Reserva de cita</span>
                        </div>
                    </a>

                        <a href="../administradorAccounts/administradorAccounts.php" <?php echo ($current_page === "administradorAccounts.php") ? 'class="active"' : ''; ?> >
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
      

    

    </section>      


