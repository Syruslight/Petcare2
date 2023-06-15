<section class="modalLote">
    <div class="modalLote__container">
        <div class="wrapperLote">
            <div class="top-formLote">
                <div id="closeModalLote">
                    &#10006;
                </div>
            </div>
            <div class="contformLote">
            <form action="../../../llamadas/proceso_registrarvacuna.php">

              <h2 class="titulo_form">Registro de Lote</h2>
              <div class="grupotex">
                <label for="" class="etiqueta_nombre">Lote:</label>
                <input type="text" name="lote" id="" class="ingreso_datos">

                <label for="" class="etiqueta_nombre">Tipo:</label>
                <input type="texto" name="tipo" id="" class="ingreso_datos">
              </div>
              <div class="grupotex">
                <label for="" class="etiqueta_nombre">Descripción:</label>
                <textarea type="text" name="descripcion" id="" class="ingreso_datos"></textarea>
                <button type="submit" class="btn_envioLote">Agregar</button>
              </div>
              

            </form>
          </div>
        </div>
    </div>
</section>