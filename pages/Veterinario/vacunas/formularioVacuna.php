<section class="modalVacuna">
    <div class="modal__container">
        <div class="wrappervacuna">
            <div class="top-formvacuna">
                <div id="closeModalVacuna">
                    &#10006;
                </div>
            </div>
            <form action="../../../llamadas/proceso_registrarDetalleVacuna.php" method="post"
                enctype="multipart/form-data">
                <label for="" class="etiqueta_nombre"> Ingrese el RENIAN de la mascota:</label>
                <div class="grupotex1">

                    <input type="number_format" name="busqueda" id="busqueda" class="ingreso_datos1" required>


                    <input type="text" name="nombreMascota" class="nomMascota" id="nombreMascota"
                        placeholder="Mascota" disabled>
                </div>
                <input type="text" name="idMascota" id="idMascota" placeholder="ID Mascota" hidden>
                <label for="" class="etiqueta_nombre"> Lote de Vacuna:</label>
                <input type="search" name="busqueda2" id="busqueda2" class="ingreso_datos" required>

                <input type="text" name="idVacuna" id="idVacuna" placeholder="ID vacuna" hidden>
                <input type="text" name="tipoVacuna" id="tipoVacuna" placeholder="tipo vacuna" hidden>
                <input type="text" name="idVeterinario" value="<?= $value[7] ?>" hidden>
                <div class="grupotex1">
                    <div class="columna">
                        <label for="" class="etiqueta_nombre2"> Fecha aplicada:</label><br>
                        <label type="date" id="etiquetaFecha" class="fechaInicial"></label>
                    </div>
                    <div class="columna">
                        <label for="" class="etiqueta_nombre2"> Proxima fecha:</label><br>
                        <input type="date" name="fechaProxima" id="" class="ingreso_datos1">
                    </div>
                </div>
                <div class="grupotex">
                    <label for="" class="etiqueta_nombre">Observación</label>
                    <textarea type="text" name="observacion" id="" class="ingresoFullText"></textarea>
                </div>
                <label for="" class="etiqueta_nombre">Restricciones</label>
                <textarea type="text" name="restriciones" id="" class="ingresoFullText"></textarea>
                <button type="submit" class="btn_envio">Agregar</button>
            </form>
        </div>
    </div>
</section>
