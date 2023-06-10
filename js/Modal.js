const openModal = document.querySelector(".boton-modal");
const modal = document.querySelector(".modal");
const closeModal = document.querySelector("#close-modal");
openModal.addEventListener("click", (e) => {
  e.preventDefault();
  modal.classList.add("modal--show");
});
closeModal.addEventListener("click", (e) => {
  e.preventDefault();
  modal.classList.remove("modal--show");
});
