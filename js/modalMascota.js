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
        const idMascota = e.target.getAttribute("data-idmascota");
        const nombreMascota = e.target.getAttribute("data-nombre");

        // Aquí puedes hacer lo que desees con el ID de la mascota, por ejemplo, mostrar los datos en el modal
        // Reemplazar el valor de la variable $idEditarmascota en el frontend
        document.querySelector("#idmascota").value = idMascota;
        document.querySelector("#nombre").value = nombreMascota;

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



















