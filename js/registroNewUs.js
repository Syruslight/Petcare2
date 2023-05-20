
//previsualizar imagen
const defaulfile = "https://lh5.googleusercontent.com/proxy/9vqIPeIeHQHyGEo43DlSgD-DUtidieclv56O6UoAcYNGPXGNnZwFJL2V7oSodehCB1YT28jit7pMSVjNTnrBOnlBxW0CiRmOeH22FlPockzEbfdQPHLkDMPcgMwWdNfVHF1r2QpUk6W_aY_J87A9lFtYKMHf8_xhkMB7l_4=s0-d";
const img =document.getElementById('img');
const file = document.getElementById('foto');
file.addEventListener('change', e=>{
if(e.target.files[0]){
  const reader= new FileReader();
  reader.onload = function(e){
    img.src= e.target.result;
  }
  reader.readAsDataURL(e.target.files[0])
}else{
  img.src=defaulfile;
}
});