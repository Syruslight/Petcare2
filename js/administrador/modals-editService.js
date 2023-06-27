function openModalEdithService() {
  const openModalButtons = document.querySelectorAll('.openModalEdithService');
  const modal = document.querySelector('.modal-edithService');
  const closeModal = document.querySelector('#close1');
  
  openModalButtons.forEach((button) => {
    button.addEventListener('click', (e) => {
      e.preventDefault();
      const nombreServicio = e.target.getAttribute("data-nombre");
      const precioServicio = e.target.getAttribute("data-precio");
      const descripcionServicio = e.target.getAttribute("data-descripcion");
      const fotoperfil = e.target.getAttribute("data-foto");
      const fotoperfil1 = fotoperfil; // Nueva variable foto por defecto (la que esta guardada en la BD)
      // aqui falta otra variable para guardar la nueva foto en caso de haber

      document.querySelector("#nombreServicioEnvio").value = nombreServicio;
      document.querySelector("#precioServicioEnvio").value = precioServicio;
      document.querySelector("#descripcionServicioEnvio").value = descripcionServicio;
      document.querySelector("#perfil-img").src = "../../../imagenes/productos_servicios/servicios/" + fotoperfil1;
      
      
      
      
      modal.classList.add('modalService--show');
    });
  });
  
  closeModal.addEventListener('click', (e) => {
    e.preventDefault();
    modal.classList.remove('modalService--show');
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
