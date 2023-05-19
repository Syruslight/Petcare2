const openModalR = document.querySelector('.butModal');
const modalR = document.querySelector(".modalMascota");
const closeModalR = document.querySelector(".modal__close");

openModalR.addEventListener("click", (e) => {
    e.preventDefault();
    modalR.classList.add("modal--show");
});

closeModalR.addEventListener("click", (e) => {
    e.preventDefault();
    modalR.classList.remove("modal--show");
});

const openModalE = document.querySelectorAll('.butModalE');
const modalE = document.querySelector(".modalMascotaEd");
const closeModalE = document.querySelector(".modal__closeE");

openModalE.forEach((button) => {
    button.addEventListener("click", (e) => {
        e.preventDefault();
        modalE.classList.add("modal--show");
    });
});
closeModalE.addEventListener("click", (e) => {
    e.preventDefault();
    modalE.classList.remove("modal--show");
});
