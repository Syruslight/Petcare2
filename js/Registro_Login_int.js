const btnregistrolink = document.querySelector('.btnregistrolink');
const  btnlinklogin = document.querySelector('.btnlinklogin');
const wrapper = document.querySelector('.wrapper');

btnregistrolink.addEventListener('click', ()=>{
    wrapper.classList.toggle('active');
});
    btnlinklogin.addEventListener('click', ()=>{
        wrapper.classList.toggle('active');
});