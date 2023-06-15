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
var checkboxes = document.getElementsByClassName("filter-checkbox");
for (var k = 0; k < checkboxes.length; k++) {
  checkboxes[k].addEventListener("change", filterProducts);
}

function updateCheckbox(checkboxId) {
  const checkbox = document.getElementById(checkboxId);
  const checked = checkbox.checked;

  // Obtener todos los elementos <hr> dentro del contenedor
  const hrElements = document.querySelectorAll(".linea");

  // Ocultar o mostrar los <hr> según el estado del checkbox
  if (checked) {
    hrElements.forEach((hr) => (hr.style.display = "none"));
  } else {
    hrElements.forEach((hr) => (hr.style.display = "flex"));
  }
}
