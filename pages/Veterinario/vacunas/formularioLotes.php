<section class="modalLote">
  <div class="modalLote__container">
    <div class="wrapperLote">
      <div class="top-formLote">
         <h2>Registro de Lote</h2>
        <div id="closeModalLote">
          &#10006;
        </div>
      </div>
      <div class="contformLote">
       
        <form action="../../../llamadas/proceso_registrarvacuna.php">

          
          <div class="grupotex">
            <label for="" class="etiqueta_nombre">Lote:</label>
            <input type="text" name="lote" id="" class="ingreso_datos" required>

            <label for="" class="etiqueta_nombre">Tipo:</label>
            <input type="texto" name="tipo" id="" class="ingreso_datos" required>

            <label for="" class="etiqueta_nombre">Estado:</label>
            <select name="opcionesLotes" class="ingreso_datos">
              <option value="Activado">Activado</option>
              <option value="Desactivado">Desactivado</option>
            </select>
          </div>
          <div class="grupotex">
            <label for="" class="etiqueta_nombre">Descripción:</label>
            <textarea type="text" name="descripcion" id="" class="textAreaDatos"></textarea>
            <button type="submit" class="btn_envio">Agregar</button>
          </div>


        </form>
      </div>
    </div>
  </div>
</section>