<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!--Formulario para registrar usuario nuevo-->
    <form action="../../../llamadas/proceso_registrarCuentaVeterinario.php" method="post" enctype="multipart/form-data">

        <div class="ClaseDelContenedor:v">
            <div class="Clase del div 2">
                <div class="label">Correo del veterinario: </div>
                <input class="clase del input 1" type="text" name="correoNuevo" required>
            </div>
            <div class="Clase del div 2">
                <div class="label">Contraseña: </div>
                <input class="textbox2" type="password" name="contraseniaNueva" required>
            </div>
            <div class="clase del boton">
                <button class="prev-3 prev BtnSen">Enviar</button>
            </div>
        </div>
    </form>
</body>

</html>