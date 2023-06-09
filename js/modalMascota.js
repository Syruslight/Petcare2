// Función para abrir el modal
function openModalM(modalSelector) {
    const modal = document.querySelector(modalSelector);
    modal.classList.add("modal--show");
}

// Función para cerrar el modal
function closeModalM(modal) {
    modal.classList.remove("modal--show");
}

// ...

document.addEventListener("click", function(e) {
    if (e.target.classList.contains("butModal")) {
        e.preventDefault();
        const modalSelector = e.target.getAttribute("data-modal");
        const fotoperfil= e.target.getAttribute("data-fotoperfil");
        const idMascota = e.target.getAttribute("data-idmascota");
        const nombreMascota = e.target.getAttribute("data-nombre");
        const pesoMascota = e.target.getAttribute("data-peso");
        const edadMascota = e.target.getAttribute("data-edad");
        const etapaMascota = e.target.getAttribute("data-etapa");
        const esterilizadoMascota = e.target.getAttribute("data-esterilizado");

        // Aquí puedes hacer lo que desees con el ID de la mascota, por ejemplo, mostrar los datos en el modal
        // Reemplazar el valor de la variable $idEditarmascota en el frontend
        document.querySelector("#idmascotaEnvio").value = idMascota;
        document.querySelector("#nombreEnvio").value = nombreMascota;
        document.querySelector("#pesoEnvio").value = pesoMascota;
        document.querySelector("#edadEnvio").value = edadMascota;
        
        // Actualizar la imagen de perfil
        document.querySelector("#perfil-img").src = "../../imagenes/fotosperfil/mascota/" + fotoperfil;

       // Seleccionar la opción correspondiente en el campo de etapa
       const etapaSelect = document.querySelector("#etapaEnvio");
       for (let i = 0; i < etapaSelect.options.length; i++) {
        if (etapaSelect.options[i].value === etapaMascota) {
          etapaSelect.selectedIndex = i;
          break;
        }
       }
        
       // Seleccionar el radio button correspondiente en el campo de esterilizado
       const esterilizadoRadioSI = document.querySelector("#siEnvio");
       const esterilizadoRadioNO = document.querySelector("#noEnvio");
       if (esterilizadoMascota === "SI") {
           esterilizadoRadioSI.checked = true;
       } else if (esterilizadoMascota === "NO") {
           esterilizadoRadioNO.checked = true;
       }
        // Abrir el modal
        openModalM(modalSelector);
    }
});

// ...


// Event listeners para cerrar los modales
const closeModalButtons = document.querySelectorAll('.modal__close');

closeModalButtons.forEach((button) => {
    button.addEventListener("click", (e) => {
        e.preventDefault();
        const modal = button.closest('.moda');
        closeModalM(modal);
    });
});



















