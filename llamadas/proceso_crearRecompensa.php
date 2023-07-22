<?php
    require '../controlador/conexion.php';
	$conn =conectar();

    
    $idProductoServicio = $_POST['producto']; // Corregir '$_GET' a '$_POST'
    $puntos= $_POST['puntosRecompensa'];
    
  
  //  echo "ID Cliente: " . $idcliente . "<br>";
   // echo "ID Producto Servicio: " . $idProducto . "<br>";
   // echo "Cantidad: " . $cantidad . "<br>";
   // echo "Precio: " . $precio . "<br>";
    //echo "Importe: " . $importe . "<br>";



    crearRecompensas($idProductoServicio, $puntos, $conn);    
    
    echo '<script>alert("Se creo la recompensa.");</script>';
    header('location:../pages/Administrador/gestionDePetiPuntos/gestionDePetiPuntos.php');
    
?>