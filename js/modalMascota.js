// const openModalR = document.querySelector('.butModal');
// const modalR = document.querySelector(".modalMascota");
// const closeModalR = document.querySelector(".modal__close");

// openModalR.addEventListener("click", (e) => {
//     e.preventDefault();
//     modalR.classList.add("modal--show");
// });

// closeModalR.addEventListener("click", (e) => {
//     e.preventDefault();
//     modalR.classList.remove("modal--show");
// });

// const openModalE = document.querySelectorAll('.butModalE');
// const modalE = document.querySelector(".modalMascotaEd");
// const closeModalE = document.querySelector(".modal__closeE");

// openModalE.forEach((button) => {
//     button.addEventListener("click", (e) => {
//         e.preventDefault();
//         modalE.classList.add("modal--show");
//     });
// });
// closeModalE.addEventListener("click", (e) => {
//     e.preventDefault();
//     modalE.classList.remove("modal--show");
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

// Event listeners para abrir los modales
document.addEventListener("DOMContentLoaded", () => {
    const openModalButtons = document.querySelectorAll('.butModal');
    openModalButtons.forEach((button) => {
        button.addEventListener("click", (e) => {
            e.preventDefault();
            const modalSelector = button.getAttribute("data-modal");
            openModalM(modalSelector);
        });
    });
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