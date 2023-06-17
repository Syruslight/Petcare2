<section class="modaleditarVeterinario">
        <div class="modal__container">
            <div class="cuadro_modal">
                <div class="top-form">
                    <div class="titulo-h2">
                        <h2 class="tituloform">Editar Datos</h2>
                    </div>
                <div id="closeModalVeterinario">
                        &#10006
                    </div> 
                </div>
                    <form action="../../llamadas/proceso_actualizarDatosVeterinario.php" enctype="multipart/form-data" method="POST">
                        
                        <div class="editheader">
                            <aside class="contfoto">
                                <img id="imgVeterinario" src="../../../imagenes/fotosperfil/veterinario/<?= $value[6] ?>" class="modal__img" width="95" height="89">
                                <input id="fotovet" type="file" name="foto" hidden>
                            <label id="cambiar-foto" for="fotovet" onclick="previsualizarImagen('imgVeterinario','fotovet','../../../imagenes/fotosperfil/veterinario/<?= $value[6] ?>')"><img class="image-profile"
                src="../../../imagenes/perfilAdmin/pencil.png"  alt="pencil" width="32" height="30"></label>

                                
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
                            <input hidden name="idveterinario"  value="<?= $value[7] ?> "required>

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