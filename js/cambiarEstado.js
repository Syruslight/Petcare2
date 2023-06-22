function updateStatus(id, checked, pTexto) {
    
    var switchElement = document.getElementById('switch' + id);
    var originalState = switchElement.getAttribute('data-original-state'); //Se obtiene el estado del toggle original

    var confirmation = confirm(pTexto);
    if (confirmation) {
        var xhr = new XMLHttpRequest();
        xhr.onload = function() { 
            if (xhr.status === 200) {
                // Actualización exitosa:
                console.log(xhr.responseText); // Respuesta en consola para verificar
                var statusElement = document.getElementById('status' + id);
                statusElement.textContent = checked ? 'Activado' : 'Desactivado';
            } else {
                console.error('Error al actualizar el estado');
            }
        };
        var params = 'id=' + encodeURIComponent(id) + '&checked=' + encodeURIComponent(checked ? 1 : 0);
        xhr.open('POST', 'update_status.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.send(params);
    } else {
        // El usuario canceló la actualización, restablecer el estado original del toggle
        switchElement.checked = originalState === 'true';
    }
}