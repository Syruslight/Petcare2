function actualizaridproductoservicio(selectElement) {
  var inputElement = document.getElementById("idproductoservicioInput");
  inputElement.value = selectElement.value;
}


  



function openModalHorario(){
  const openModal = document.querySelector(".botonHorario");
  const modal = document.querySelector(".modalHorario");
  const closeModal = document.querySelector("#CloseModalHorario");
  openModal.addEventListener("mousedown", (e) => {
    e.preventDefault();
    modal.classList.add("modalHorario--show");
  });
  closeModal.addEventListener("mousedown", (e) => {
    e.preventDefault();
    modal.classList.remove("modalHorario--show");
  });
}


function openModalCreacionCuentasAdministrador(){
  const openModal = document.querySelector(".addNewAccount");
  const modal = document.querySelector(".modalAdministradorCrearCuenta");
  const closeModal = document.querySelector("#closeModalAdministradorCrearCuenta");
  openModal.addEventListener("mousedown", (e) => {
    e.preventDefault();
    modal.classList.add("modalAdministradorCrearCuenta--show");
  });
  closeModal.addEventListener("mousedown", (e) => {
    e.preventDefault();
    modal.classList.remove("modalAdministradorCrearCuenta--show");
  });
}

function openModalVeterinario(){
  const openModal = document.querySelector(".botonmodalVeterinario");
  const modal = document.querySelector(".modaleditarVeterinario");
  const closeModal = document.querySelector("#closeModalVeterinario");
  openModal.addEventListener("mousedown", (e) => {
    e.preventDefault();
    modal.classList.add("modalVeterinario--show");
  });
  closeModal.addEventListener("mousedown", (e) => {
    e.preventDefault();
    modal.classList.remove("modalVeterinario--show");
  });
}

function openModalAdministrador(){
  const openModal = document.querySelector(".openModalAdministrador");
  const modal = document.querySelector(".modalAdministrador");
  const closeModal = document.querySelector("#cloaseModalAdministrador");
  openModal.addEventListener("mousedown", (e) => {
    e.preventDefault();
    modal.classList.add("modalAdministrador--show");
  });
  closeModal.addEventListener("mousedown", (e) => {
    e.preventDefault();
    modal.classList.remove("modalAdministrador--show");
  });
}


function openmodalLogin() {
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
openModalEditarCliente.addEventListener("mousedown", (e) => {
  e.preventDefault();
  modalEditarCliente.classList.add("modalEditarCliente--show");
});
closeModalEditarCliente.addEventListener("mousedown", (e) => {
  e.preventDefault();
  modalEditarCliente.classList.remove("modalEditarCliente--show");
});
}


function openModalVacuna(){
  const openModalVacuna = document.querySelector(".add-newProduct");
const modalVacuna = document.querySelector(".modalVacuna");
const closeModalVacuna = document.querySelector("#closeModalVacuna");
openModalVacuna.addEventListener("mousedown", (e) => {
e.preventDefault();
modalVacuna.classList.add("modalVacuna--show");
});
closeModalVacuna.addEventListener("mousedown", (e) => {
e.preventDefault();
modalVacuna.classList.remove("modalVacuna--show");
});
}

function openModalLote(){
const openModalLote = document.querySelector(".add-newCategory");
const modalLote = document.querySelector(".modalLote");
const closeModalLote = document.querySelector("#closeModalLote");
openModalLote.addEventListener("mousedown", (e) => {
e.preventDefault();
modalLote.classList.add("modalLote--show");
});
closeModalLote.addEventListener("mousedown", (e) => {
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

