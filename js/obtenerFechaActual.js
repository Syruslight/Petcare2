// Obtener el elemento de etiqueta por su ID
var etiquetaFecha = document.getElementById("etiquetaFecha");

// Función para actualizar la fecha en tiempo real
function actualizarFecha() {
  // Obtener la fecha actual
  var fechaActual = new Date();

  // Formatear la fecha en el formato deseado
  var dia = fechaActual.getDate();
  var mes = fechaActual.getMonth() + 1;
  var anio = fechaActual.getFullYear();
  var hora = fechaActual.getHours();
  var minutos = fechaActual.getMinutes();
  var segundos = fechaActual.getSeconds();
  
  // Asegurarse de agregar un cero delante de los valores de un solo dígito
  dia = (dia < 10) ? "0" + dia : dia;
  mes = (mes < 10) ? "0" + mes : mes;



  // Construir la cadena de fecha y hora
  var fechaHoraActual = dia + "/" + mes + "/" + anio;

  // Asignar la fecha y hora actual al contenido del elemento de etiqueta
  etiquetaFecha.textContent = fechaHoraActual;
}

// Actualizar la fecha inicialmente
actualizarFecha();

// Actualizar la fecha cada segundo
setInterval(actualizarFecha, 1000);