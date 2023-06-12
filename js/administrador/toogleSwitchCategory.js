var variables = {
  variable1: false,
  variable2: false,
  variable3: false,
  variable4: false,
  variable5: false,
};

function toggleSwitch(variable, checked) {
  variables[variable] = checked;
  var statusElement = document.getElementById("status" + variable.slice(-1));
  statusElement.textContent = checked ? "Activada" : "Desactivada";
}
