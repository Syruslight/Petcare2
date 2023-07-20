<?php
    require '../controlador/conexion.php';
	$conn =conectar();

    $idcliente = $_POST['idCliente'];
    $idProducto = $_POST['producto']; // Corregir '$_GET' a '$_POST'
    $cantidad = $_POST['cantidadP'];
    $precio = $_POST['precioP'];
    $importe = $precio * $cantidad;
    
  
  //  echo "ID Cliente: " . $idcliente . "<br>";
   // echo "ID Producto Servicio: " . $idProducto . "<br>";
   // echo "Cantidad: " . $cantidad . "<br>";
   // echo "Precio: " . $precio . "<br>";
    //echo "Importe: " . $importe . "<br>";
    agregarVenta($idcliente,$idProducto,$cantidad,$importe,$conn);
        // Mostrar el mensaje de confirmación utilizando un alert
        echo '<script>alert("La venta se ha guardado con éxito.");</script>';
    header('location:../pages/Veterinario/ventas/ventas.php');
    
?>