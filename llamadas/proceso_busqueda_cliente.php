<?php
// Conexión a la base de datos (ajusta los datos de conexión según tu configuración)
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'petcare';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die('Error de conexión: ' . $conn->connect_error);
}

// Obtener el término de búsqueda enviado por Ajax
$query = $_POST['query'];

// Realizar la consulta a la base de datos
$sql = "SELECT u.email, c.nombres, c.apellidos, c.dni, c.telefono,c.foto, c.direccion
FROM cliente c
INNER JOIN usuario u ON c.idusuario = u.idusuario
WHERE c.dni LIKE '%$query%' OR c.nombres LIKE '%$query%' OR c.telefono LIKE '%$query%' OR c.direccion LIKE '%$query%'
LIMIT 10;
";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Construir la tabla de resultados
  $output = '<div class="wrapper-dates">
              <div class="dates-name">
                <span class="text-dates">Nombre</span>';
                
        foreach($result as $row) {
        $output .= '<div class="client-information">
                    <img width="50" height="50" src="../../../imagenes/fotosperfil/cliente/'.$row['foto'].'" alt="user-male"/>                    
                    <div class="name-lastname">
                    <span class="first-name">' . $row['nombres'] . '</span>
                    <span class="last-name">' . $row['apellidos'] . '</span>
                    </div>
                    </div>';
        }

    $output .= '</div>';
         $output .= '<div class="dates-email">
                    <span class="text-dates">E-mail</span>';

                    
                    foreach ($result as $row) {
                        
                        $output .='<div class="e-mail">
                                  <span>'. $row['email'] .'</span>
                                  </div>';
                      }
         $output .= '</div>';

         
         $output .= '<div class="dates-dni">
         <span class="text-dates">DNI</span>';
        
         
         foreach ($result as $row) {
             
             $output .='<div class="dni">
                       <span>'. $row['dni'] .'</span>
                       </div>';
           }
$output .= '</div>';
         


         

        $output .= '<div class="dates-cellphone">
                    <span class="text-dates">Telefono</span>';
                    foreach($result as $row) {
                      $output .='<div class="cell-phone">
                                  <span>'. $row['telefono'] .'</span>
                                  </div>';
                    }
                    $output .= '</div>';


        $output .= '<div class="dates-direction">
                    <span class="text-dates">Direccion</span>';
                    foreach($result as $row) {
                      $output .='<div class="direction">
                                  <span>'. $row['direccion'] .'</span>
                                  </div>';
                    }
                    $output .= '</div>';

        // $output .='<div class="dates-info">
        //           <span class="text-dates"> Informacion </span>';
        //           foreach($result as $row) {
        //             $output .='<div class="button-see">
        //             <button>Ver Cliente</button>
        //               </div> ';
        //           }
                  
        //           $output .='</div>';
        
  $output .= '</div>';

} else {
  // No se encontraron resultados
  $output = 'No se encontraron resultados.';
}

// Devolver los resultados al cliente
echo $output;

// Cerrar la conexión a la base de datos
$conn->close();
?>