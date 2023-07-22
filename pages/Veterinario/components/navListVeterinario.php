<div class="first-seccion">
    <div class="logo">
        <img src="../../../imagenes/perfilVeterinario/logo.png" alt="Logo" width="168" height="46">
    </div>
    <?php

    $email = $_SESSION['email'];
    foreach (listarVeterinario($email, $conn) as $key => $value) {
    ?>

        <img class="photo-profile" src="../../../imagenes/fotosperfil/veterinario/<?= $value[6] ?>" alt="profile" width="217" height="227">
        <div class="profile-information">

            <span class="user"><?= $value[0] ?>
                <?= $value[1] ?></span>
            <img class="botonmodalVeterinario" onclick="openModalVeterinario()" src="../../../imagenes/perfilVeterinario/pencil.png" alt="pencil" width="32" height="30">
        </div>
        <span class="id"> <?= $value[2] ?> </span>
    <?php
    }
    ?>
</div>
<div class="second-seccion">
<?php
    $current_page = basename($_SERVER['PHP_SELF']);
    ?>

    <!-- <style>
        .categories a.active {
            background-color: yellow;
            border-radius: 10px;
        }
    </style> -->

    <div class="categories">
        <a  href="../../../pages/Veterinario/veterinario.php" <?php echo ($current_page === "veterinario.php") ? 'class="active"' : ''; ?>>
            <div class="icons">
                <img src="https://img.icons8.com/ios/50/null/health-data.png" width="25" height="25" />
                <span class="principal">Principal</span>
            </div>
        </a>

        <a href="../../../pages/Veterinario/vacunas/moduloVacuna.php" <?php echo ($current_page === "moduloVacuna.php") ? 'class="active"' : ''; ?> >
        <div class="icons">
            <img src="https://img.icons8.com/ios/50/null/conference-call--v1.png" width="25" height="25" />
                <span class="list">Vacunas</span>
        </div>
        </a>

        <a href="../../../pages/Veterinario/vacunas/moduloLote.php" <?php echo ($current_page === "moduloLote.php") ? 'class="active"' : ''; ?> >
        <div class="icons">
            <img src="https://img.icons8.com/ios/50/null/chat-message-sent.png" width="25" height="25" />
                <span class="list">Lotes</span>
            </div>
        </a>

        <a href="../../../pages/Veterinario/horario/horario.php" <?php echo ($current_page === "horario.php") ? 'class="active"' : ''; ?> >
        <div class="icons">
            <img src="https://img.icons8.com/ios/50/null/database--v1.png" width="25" height="25" />
                <span class="list">Mi horario</span>
            </div>
        </a>

        <a href="../../../pages/Veterinario/ventas/ventas.php" <?php echo ($current_page === "ventas.php") ? 'class="active"' : ''; ?>>
        <div class="icons">
            <img src="https://img.icons8.com/ios/50/null/appointment-reminders--v1.png" width="25" height="25" />
                <span class="list">Ventas </span>
            </div>
        </a>
        <a href="../../../pages/Veterinario/petiPuntosVet/petiPuntoVet.php" <?php echo ($current_page === "petiPuntoVet.php") ? 'class="active"' : ''; ?>>
  
        <div class="icons">
            <img src="https://img.icons8.com/ios/50/null/settings--v1.png" width="25" height="25" />
            <span class="list">PetiPuntos</span>
        </div>
        </a>

        <div class="sign-off">

            <img src="https://img.icons8.com/ios/50/null/shutdown--v1.png" width="25" height="25" />
            <form action="../../../llamadas/proceso_cerrar_sesion.php" method="POST">
            <button type="button" class="list" name="" id="logoutBtn">Cerrar sesión</button>
            </form>

        </div>
   </div>
</div>