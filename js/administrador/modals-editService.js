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

function openModalEdithProduct(event) {
  const button = event.target;
  const modal = document.querySelector(".modal-edithProduct");
  const closeModal = document.querySelector("#close1");

  const idProducto = button.getAttribute("data-idproducto");
  const nombreProducto = button.getAttribute("data-nombreproducto");
  const precioProducto = button.getAttribute("data-precioproducto");
  const descripcionProducto = button.getAttribute("data-descripcionproducto");
  const fotoproducto = button.getAttribute("data-fotoproducto");
  const tipoProducto = button.getAttribute("data-tipoproducto");

  const fotoproducto1 = fotoproducto;
  


  document.querySelector("#idProductoEnvio").value = idProducto;
  document.querySelector("#nombreProductoEnvio").value = nombreProducto;
  document.querySelector("#precioProductoEnvio").value = precioProducto;
  document.querySelector("#descripcionProductoEnvio").value = descripcionProducto;
  document.querySelector("#productoEnvio").src = "../../../imagenes/productos_servicios/productos/" + fotoproducto;
  document.querySelector("#nombrefotoProductoEnvio").value = fotoproducto1;

  //Codigo para tipo del producto (combo box)
  const tipoSelect = document.querySelector("#tipoEnvio");
  for (let i = 0; i < tipoSelect.options.length; i++) {
      if (tipoSelect.options[i].value === tipoProducto) {
          tipoSelect.selectedIndex = i;
      break;
      }
  }  

  modal.classList.add("modalProduct--show");

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
