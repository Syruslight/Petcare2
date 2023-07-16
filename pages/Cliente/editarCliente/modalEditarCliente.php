<!-- Modal Editar Cliente -->
<section class="modalEditarCliente">
    <div class="modal__container">
        <div class="cuadro_modal">
            <div class="top-form">
                <div class="titulo-h2">
                    <h2 class="tituloform">Editar Datos</h2>
                </div>
                <div id="closeModalEditarCliente">
                    &#10006
                </div>
            </div>
            <form action="../../../llamadas/proceso_actualizarDatosCliente.php" enctype="multipart/form-data"
                method="POST">

                <div class="editheader">
                    <aside class="contfoto">

                        <div class="imgcontainereditcliente">
                            <img id="imgPersona" src="../../../imagenes/fotosperfil/cliente/<?= $value[6] ?>" width="95"
                                height="89">
                        </div>

                        <input id="fotoPersona" type="file" name="foto" hidden>
                        <label for="fotoPersona"
                            onclick="previsualizarImagen('imgPersona','fotoPersona','../../imagenes/fotosperfil/cliente/<?= $value[6] ?>')"> <img  class="iconoEditCliente" src="../../../imagenes/perfilCliente/pencil.png" alt=""> </label>
                    </aside>
                    <section class="textonomap">
                        <div class="input-groupe">
                            <input class="estilo-separado" type="text" name="nombres" value="<?= $value[0] ?>" required>
                            <label for=""> Nombres</label>

                        </div>
                        <div class="input-groupe">
                            <input class="estilo-separado" type="text" name="apellidos" value="<?= $value[1] ?>"
                                required>
                            <label for=""> Apellidos</label>
                        </div>

                    </section>
                </div>
                <div class="modalinf">
                    <div class="input-groupe1">
                        <input class="estilo-separado1" type="TEXT" name="telefono" value="<?= $value[3] ?>" required>
                        <label for=""> Telefono</label>
                    </div>
                    <div class="input-groupe2">
                        <input class="estilo-separado1" type="TEXT" name="dni" value="<?= $value[2] ?> " required>
                        <label for=""> DNI</label>
                    </div>

                    <input hidden name="idcliente" value="<?= $value[7] ?> " required>
                    <input hidden name="foto2" value="<?= $value[6] ?> " required>
                </div>
                <div class="modalFoot">
                    <div class="input-groupe3">
                        <input class="estilo-separado" type="text" name="direccion" value="<?= $value[4] ?>" required>
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