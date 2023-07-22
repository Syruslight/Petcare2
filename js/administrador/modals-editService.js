// Modal para services

function openModalEdithService() {
  const openModalButtons = document.querySelectorAll(".openModalEdithService");
  const modal = document.querySelector(".modal-edithService");
  const closeModal = document.querySelector("#close1");

  openModalButtons.forEach((button) => {
    button.addEventListener("click", (e) => {
      e.preventDefault();

      const idServicio = e.target.getAttribute("data-idservicio");
      const nombreServicio = e.target.getAttribute("data-nombre");
      const precioServicio = e.target.getAttribute("data-precio");
      const descripcionServicio = e.target.getAttribute("data-descripcion");
      const fotoservicio = e.target.getAttribute("data-foto");
      const fotoservicio1 = fotoservicio; // Nueva variable foto por defecto (la que esta guardada en la BD)
      // aqui falta otra variable para guardar la nueva foto en caso de haber

      document.querySelector("#servicioEnvio").src =
        "../../../imagenes/productos_servicios/servicios/" + fotoservicio;
      document.querySelector("#nombrefotoServicioEnvio").value = fotoservicio1;

      document.querySelector("#idServicioEnvio").value = idServicio;
      document.querySelector("#nombreServicioEnvio").value = nombreServicio;
      document.querySelector("#precioServicioEnvio").value = precioServicio;
      document.querySelector("#descripcionServicioEnvio").value =
        descripcionServicio;
      //document.querySelector("#perfil-img").src =  "../../../imagenes/productos_servicios/servicios/" + fotoservicio1;

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
  //const tipoProducto = button.getAttribute("data-tipoproducto");

  const fotoproducto1 = fotoproducto;

  document.querySelector("#idProductoEnvio").value = idProducto;
  document.querySelector("#nombreProductoEnvio").value = nombreProducto;
  document.querySelector("#precioProductoEnvio").value = precioProducto;
  document.querySelector("#descripcionProductoEnvio").value = descripcionProducto;
  document.querySelector("#productoEnvio").src =
    "../../../imagenes/productos_servicios/productos/" + fotoproducto;
  document.querySelector("#nombrefotoProductoEnvio").value = fotoproducto1;

  //Codigo para tipo del producto (combo box)


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
function openModalEdithCategory() {
  const openButtons = document.querySelectorAll(".image-edit");
  const modalContainer = document.getElementById("modal-edithCategory");
  const closeModal = document.getElementById("close1");

  openButtons.forEach((button) => {
    button.addEventListener("click", (e) => {
      e.preventDefault();
      
      // Obtener los atributos data del botón
      const idCategoria = button.getAttribute("data-idtipoproductoservicio");
      const nombreCategoria = button.getAttribute("data-nombrecategoria");

      // Asignar los valores al modal de edición
      document.querySelector("#idCategoria").value = idCategoria;
      document.querySelector("#nombreCategoria").value = nombreCategoria;
      
      modalContainer.classList.add("modalCategory--show");
    });
  });

  closeModal.addEventListener("click", (e) => {
    e.preventDefault();
    modalContainer.classList.remove("modalCategory--show");
  });
}

openModalEdithCategory();



function openModalCreatePetiPunto() {
  const open = document.getElementById("open-createPetiPunto");
  const modal_container = document.getElementById("modal-createPetiPunto");
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



//GLOBAL EDITAS PUNTOS 

document.querySelectorAll(".modal-imagenPeti").forEach((button) => {
  button.addEventListener("click", (e) => {
    // Pasa el evento (e) como parámetro a la función
    openModalEdithPetiPunto(e);
  });
});


function openModalEdithPetiPunto(idRecompensa, nombreRecompensa, puntosRecompensa) {
  const modal_container = document.getElementById("modal-edithPetiPunto");
  const close = document.getElementById("close1");
  
  document.querySelector("#idRecompensa").value = idRecompensa;
  document.querySelector("#nombreRecompensa").value = nombreRecompensa;
  document.querySelector("#puntosRecompensa").value = puntosRecompensa;

  modal_container.classList.add("modalPetiPunto--show");

  close.addEventListener("click", (e) => {
    e.preventDefault();
    modal_container.classList.remove("modalPetiPunto--show");
  });
}
