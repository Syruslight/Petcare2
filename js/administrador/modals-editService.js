// Modal para services

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

function openModalCreateService() {
  const open = document.getElementById("open");
  const modal_container = document.getElementById("modal_wrapper");
  const close = document.getElementById("close");
  open.addEventListener("click", (e) => {
    e.preventDefault();
    modal_container.classList.add("show");
  });

  close.addEventListener("click", (e) => {
    e.preventDefault();
    modal_container.classList.remove("show");
  });
}

// Modal para Products
function openModalCreateProdcut() {
  const open = document.getElementById("open");
  const modal_container = document.getElementById("modal_wrapper");
  const close = document.getElementById("close");
  open.addEventListener("click", (e) => {
    e.preventDefault();
    modal_container.classList.add("show");
  });

  close.addEventListener("click", (e) => {
    e.preventDefault();
    modal_container.classList.remove("show");
  });
}

function openModalEdithProduct() {
  const openModal = document.getElementById("openModalEdithProduct");
  const modal = document.getElementById("modal-edithProduct");
  const closeModal = document.getElementById("close1");
  openModal.addEventListener("click", (e) => {
    e.preventDefault();
    modal.classList.add("modalProduct--show");
  });
  closeModal.addEventListener("click", (e) => {
    e.preventDefault();
    modal.classList.remove("modalProduct--show");
  });
}

// Modal para Category
function openModalCreateCategory() {
  const open = document.getElementById("open");
  const modal_container = document.getElementById("modal_wrapper");
  const close = document.getElementById("close");
  open.addEventListener("click", (e) => {
    e.preventDefault();
    modal_container.classList.add("show");
  });

  close.addEventListener("click", (e) => {
    e.preventDefault();
    modal_container.classList.remove("show");
  });
}
