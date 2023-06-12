function togglePopup() {
  const popup = document.getElementById("popup");
  popup.style.display = popup.style.display === "block" ? "none" : "block";
}

function updateCheckbox(selectedCheckbox) {
  const checkboxes = document.getElementsByName("checkbox");
  checkboxes.forEach(function (checkbox) {
    checkbox.checked = checkbox.id === selectedCheckbox;
  });
}
