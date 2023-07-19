document.addEventListener('DOMContentLoaded', function() {
    const logoutBtn = document.getElementById('logoutBtn');
    const confirmModal = document.getElementById('confirmModal');
    const confirmBtn = document.getElementById('confirmBtn');
    const cancelBtn = document.getElementById('cancelBtn');
  
    logoutBtn.addEventListener('click', function() {
      confirmModal.style.display = 'block';
    });
  
    confirmBtn.addEventListener('click', function() {
      cerrarSesion();
    });
  
    cancelBtn.addEventListener('click', function() {
      confirmModal.style.display = 'none';
    });
  
    function cerrarSesion() {
      fetch('../../../llamadas/proceso_cerrar_sesion.php', {
        method: 'POST'
      })
        .then(function(response) {
          if (response.ok) {
            window.location.href = '../../../index.php';
          } else {
            console.log('Error al cerrar sesión');
          }
        })
        .catch(function(error) {
          console.log('Error al cerrar sesión:', error);
        });
    }
  });