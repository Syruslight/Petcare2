<?php

require('../../../controlador/conexion.php');
$conn = conectar();
if (isset($_POST['veterinarioSeleccionado'])) {
    $veterinarioSeleccionado = $_POST['veterinarioSeleccionado'];
    $fechaSeleccionada = $_POST['fechaSeleccionada'];

    

    // Realiza una consulta para obtener los horarios disponibles del veterinario seleccionado
    $query = "SELECT horarioinicio, horariofin FROM horario WHERE fecha = '$fechaSeleccionada' AND idveterinario = '$veterinarioSeleccionado' and estado != 1";
    $result = mysqli_query($conn, $query);

    // Verifica si se encontraron horarios
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $horarioInicio = date('h:i a', strtotime($row['horarioinicio']));
            $horarioFin = date('h:i a', strtotime($row['horariofin']));
            echo "<option value='$horarioInicio-$horarioFin'>$horarioInicio - $horarioFin</option>";
        }
    } else {
        echo '<option value="">No se encontraron horarios disponibles</option>';
    }
}
?>
