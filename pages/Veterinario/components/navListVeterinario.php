

   <div class="first-seccion">
            <div class="logo">
                <img src="../../imagenes/perfilVeterinario/logo.png" alt="Logo" width="168" height="46">
            </div>
            <?php
          
                $email = $_SESSION['email'];
                foreach (listarVeterinario($email, $conn) as $key => $value) {
                    ?>

            <img src="../../imagenes/fotosperfil/veterinario/<?= $value[6] ?>" alt="profile" width="217" height="227">
        <div class="profile-information">
              
            <span class="user"><?= $value[0] ?>
                            <?= $value[1] ?></span>
            <img class="boton-modal" src="../../imagenes/perfilVeterinario/pencil.png" alt="pencil" width="32" height="30">
        </div >
        <span class="id"> <?= $value[2] ?> </span>
        <?php
                }
                ?>
        </div>
        <div class="second-seccion">
            <div class="categories">
                <div class="icons">  
                 <img src="https://img.icons8.com/ios/50/null/health-data.png" width="25" height="25"/>
                 <a href="../veterinario.php"><span class="principal">Principal</span></a>
                 
                </div>
                <div class="icons">
                            <img src="https://img.icons8.com/ios/50/null/conference-call--v1.png" width="25" height="25" />
                            <a href="../../pages/Veterinario/vacunas/moduloVacunaLote.php"><span class="list">Vacunas</span></a>
                        </div>
                <div class="icons">
                <img src="https://img.icons8.com/ios/50/null/chat-message-sent.png" width="25" height="25"/>
                <span class="list">Productos</span>
                </div>
                <div class="icons">
                        <img src="https://img.icons8.com/ios/50/null/database--v1.png" width="25" height="25" />
                        <span class="list">Servicios</span>
                    </div>
                <div class="icons">
                <img src="https://img.icons8.com/ios/50/null/appointment-reminders--v1.png"width="25" height="25"/>
                <span class="list">PetiPuntos </span>
                </div>
                <div class="icons">
                <img src="https://img.icons8.com/ios/50/null/settings--v1.png"width="25" height="25"/>
                <span class="list">Reserva una cita</span>
                </div>
                <div class="icons">
                <img src="https://img.icons8.com/ios/50/null/help--v1.png"width="25" height="25"/>
                <span class="list">Ayuda</span>
                </div>         

                <div class="sign-off">
                
                    <img src="https://img.icons8.com/ios/50/null/shutdown--v1.png" width="25" height="25"/>
                    <span class="list">Cerrar sesion</span>   

                </div>
            </div>
        </div>
   