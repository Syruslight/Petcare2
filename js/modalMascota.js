// // Función para abrir el modal
// function openModalM(modalSelector) {
//     const modal = document.querySelector(modalSelector);
//     modal.classList.add("modal--show");
// }

// // Función para cerrar el modal
// function closeModalM(modal) {
//     modal.classList.remove("modal--show");
// }

// // Event listeners para abrir los modales
// document.addEventListener("DOMContentLoaded", () => {
//     const openModalButtons = document.querySelectorAll('.butModal');
//     openModalButtons.forEach((button) => {
//         button.addEventListener("click", (e) => {
//             e.preventDefault();
//             const modalSelector = button.getAttribute("data-modal");
//             openModalM(modalSelector);
//         });
//     });
// });

// // Event listeners para cerrar los modales
// const closeModalButtons = document.querySelectorAll('.modal__close');

// closeModalButtons.forEach((button) => {
//     button.addEventListener("click", (e) => {
//         e.preventDefault();
//         const modal = button.closest('.moda');
//         closeModalM(modal);
//     });
// });


// Función para abrir el modal
function openModalM(modalSelector) {
    const modal = document.querySelector(modalSelector);
    modal.classList.add("modal--show");
}

// Función para cerrar el modal
function closeModalM(modal) {
    modal.classList.remove("modal--show");
}

// Event listener para abrir el modal
$(document).on("click", ".butModal", function(e) {
    e.preventDefault();
    const modalSelector = $(this).data("modal");
    openModalM(modalSelector);
});

// Event listeners para cerrar los modales
const closeModalButtons = document.querySelectorAll('.modal__close');

closeModalButtons.forEach((button) => {
    button.addEventListener("click", (e) => {
        e.preventDefault();
        const modal = button.closest('.moda');
        closeModalM(modal);
    });
});