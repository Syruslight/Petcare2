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
    echo "<option>Seleccionar Horario</option>";
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $horarioInicio = $row['horarioinicio'];
            $horarioFin = $row['horariofin'];
            echo "<option value='$horarioInicio-$horarioFin'>$horarioInicio-$horarioFin</option>";
        }
    } else {
        echo '<option value="">No hay horarios </option> <option value="">Seleccionar</option>';
    }
}
?>
