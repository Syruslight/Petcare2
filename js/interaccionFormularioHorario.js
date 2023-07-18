function actualizarHoraFin() {
    var horaInicio = document.getElementById("horarioinicio").value;
    var horaFin = document.getElementById("horariofin");
  
    if (horaInicio) {
      var fechaInicio = new Date();
      var fechaFin = new Date();
  
      var partesHoraInicio = horaInicio.split(":");
      fechaInicio.setHours(partesHoraInicio[0], partesHoraInicio[1]);
  
      fechaFin.setTime(fechaInicio.getTime() + 60 * 60 * 1000);
  
      var horaFinFormateada =
        fechaFin.getHours().toString().padStart(2, "0") +
        ":" +
        fechaFin.getMinutes().toString().padStart(2, "0");
  
      horaFin.value = horaFinFormateada;
    }
  }
  
  function actualizaridproductoservicio(select) {
    var idproductoservicioInput = document.getElementById("idproductoservicioInput");
    idproductoservicioInput.value = select.value;
  }
  
  function validarFecha(fecha) {
    var fechaActual = new Date();
    var fechaSeleccionada = new Date(fecha);
  
    return !isNaN(fechaSeleccionada) && fechaSeleccionada >= fechaActual;
  }