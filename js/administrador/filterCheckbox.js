// Función para filtrar los productos según los checkboxes seleccionados
function filterProducts() {
  // Obtener los checkboxes
  var checkboxes = document.getElementsByClassName("filter-checkbox");

  // Crear un array para almacenar los valores seleccionados
  var selectedValues = [];

  // Iterar sobre los checkboxes y obtener los valores seleccionados
  for (var i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i].checked) {
      selectedValues.push(checkboxes[i].value);
    }
  }

  // Obtener todos los productos
  var products = document.getElementsByClassName("dates-table");

  // Iterar sobre los productos y aplicar el filtrado
  for (var j = 0; j < products.length; j++) {
    var product = products[j];
    var productType = product.getElementsByClassName("table-type")[0].innerText;

    // Mostrar u ocultar el producto según el tipo
    if (selectedValues.length === 0 || selectedValues.includes(productType)) {
      product.style.display = "flex"; // Mostrar el producto
    } else {
      product.style.display = "none"; // Ocultar el producto
    }
  }
}

// Escuchar los cambios en los checkboxes y llamar a la función de filtrado
function updateCheckbox(checkboxId) {
  var checkboxes = document.getElementsByClassName("filter-checkbox");
  var tiposSeleccionados = [];

  for (var i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i].checked) {
      tiposSeleccionados.push(checkboxes[i].getAttribute("data-tipo"));
    }
  }

  // Enviar solicitud AJAX para filtrar los resultados
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("resultados").innerHTML = xmlhttp.responseText;
    }
  };

  xmlhttp.open("GET", "filtrar_productos.php?tipos=" + JSON.stringify(tiposSeleccionados), true);
  xmlhttp.send();
}

