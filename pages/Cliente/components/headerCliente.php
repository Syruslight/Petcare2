
<div class="dash-header">
<?php
               
               foreach (listarAdministrador($email, $conn) as $key => $value) {
                   ?>
                    <span class="tittle-header">
                        <?= $value[0] ?>
                        <?= $value[1] ?>
                    </span>
                    <?php
                }
                ?> <!--Se abre codigo php para invocar a la sesion del 'usuario'-->
                    <img src="../../../imagenes/fotosperfil/administrador/<?= $value[6] ?>" alt="profile" width="38"
                        height="39">
</div>   