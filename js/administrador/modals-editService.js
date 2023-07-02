// Modal para services

function openModalEdithService() {
  const openModalButtons = document.querySelectorAll(".openModalEdithService");
  const modal = document.querySelector(".modal-edithService");
  const closeModal = document.querySelector("#close1");

  openModalButtons.forEach((button) => {
    button.addEventListener("click", (e) => {
      e.preventDefault();
      const nombreServicio = e.target.getAttribute("data-nombre");
      const precioServicio = e.target.getAttribute("data-precio");
      const descripcionServicio = e.target.getAttribute("data-descripcion");
      const fotoperfil = e.target.getAttribute("data-foto");
      const fotoperfil1 = fotoperfil; // Nueva variable foto por defecto (la que esta guardada en la BD)
      // aqui falta otra variable para guardar la nueva foto en caso de haber

      document.querySelector("#nombreServicioEnvio").value = nombreServicio;
      document.querySelector("#precioServicioEnvio").value = precioServicio;
      document.querySelector("#descripcionServicioEnvio").value =
        descripcionServicio;
      document.querySelector("#perfil-img").src =
        "../../../imagenes/productos_servicios/servicios/" + fotoperfil1;

      modal.classList.add("modalService--show");
    });
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
function openModalCreateProduct() {
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
