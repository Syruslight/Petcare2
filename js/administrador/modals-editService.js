function openModalEdithService() {
  const openModal = document.querySelector(".openModalEdithService");
  const modal = document.querySelector(".modal-edithService");
  const closeModal = document.querySelector("#close1");
  openModal.addEventListener("click", (e) => {
    e.preventDefault();
    modal.classList.add("modalService--show");
  });
  closeModal.addEventListener("click", (e) => {
    e.preventDefault();
    modal.classList.remove("modalService--show");
  });
}
openModalEdithService();

// const open = document.getElementById(".openModaler");
// const modaler = document.getElementById("modal-edithService");
// const close = document.getElementById("close1");

// open.addEventListener("click", () => {
//   modaler.classList.add("modalService--show");
// });

// close.addEventListener("click", () => {
//   modaler.classList.remove("modalService--show");
// });
