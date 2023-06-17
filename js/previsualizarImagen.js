
function previsualizarImagen(imgElement, fileElement, fotoporDefecto) {
  let img = document.getElementById(imgElement);
  let file = document.getElementById(fileElement);
  let defaultFile = fotoporDefecto || img.src;

  file.addEventListener('change', e => {
    if (e.target.files[0]) {
      const reader = new FileReader();
      reader.onload = function(e) {
        img.src = e.target.result;
      }
      reader.readAsDataURL(e.target.files[0]);
    } else {
      img.src = defaultFile;
    }
  });

  
}
