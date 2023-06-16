function openmodalLogin(){
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
}

function openModalEditCliente(){
  const openModalEditarCliente = document.querySelector(".btnEditarCliente");
const modalEditarCliente = document.querySelector(".modalEditarCliente");
const closeModalEditarCliente = document.querySelector("#closeModalEditarCliente");
openModalEditarCliente.addEventListener("click", (e) => {
  e.preventDefault();
  modalEditarCliente.classList.add("modalEditarCliente--show");
});
closeModalEditarCliente.addEventListener("click", (e) => {
  e.preventDefault();
  modalEditarCliente.classList.remove("modalEditarCliente--show");
});
}


function openModalVacuna(){
  const openModalVacuna = document.querySelector(".add-newProduct");
const modalVacuna = document.querySelector(".modalVacuna");
const closeModalVacuna = document.querySelector("#closeModalVacuna");
openModalVacuna.addEventListener("click", (e) => {
e.preventDefault();
modalVacuna.classList.add("modalVacuna--show");
});
closeModalVacuna.addEventListener("click", (e) => {
e.preventDefault();
modalVacuna.classList.remove("modalVacuna--show");
});
}

function openModalLote(){
  const openModalLote = document.querySelector(".add-newCategory");
const modalLote = document.querySelector(".modalLote");
const closeModalLote = document.querySelector("#closeModalLote");
openModalLote.addEventListener("click", (e) => {
e.preventDefault();
modalLote.classList.add("modalLote--show");
});
closeModalLote.addEventListener("click", (e) => {
e.preventDefault();
modalLote.classList.remove("modalLote--show");
});
}

/* ToggleButton*/
    function toggleStatus(checkbox) {
      var status = checkbox.parentNode.querySelector('.status');
      
      if (checkbox.checked) {
        status.textContent = 'Activado';
      } else {
        status.textContent = 'Desactivado';
      }
    }

