<?php
    require '../controlador/conexion.php';
	$conn =conectar();

    #Parametros
    $idCategoria = $_REQUEST['id'];

    $razaSeleccionada = $_POST['Categoria_P'];
$razaData = explode('-', $razaSeleccionada);
$idraza = $razaData[0];



    $nombre = $_REQUEST['nombre_P'];
    $descripcion = $_REQUEST['descripcion_P'];
    $precio = $_REQUEST['precio_P'];
    $foto = $_FILES['foto_P']['name'];
	$ruta = $_FILES['foto_P']['tmp_name'];
    #El estado por defecto siempre sera 1 porque la cuenta se activa al crearse
    
    if(!empty($foto)) {
	    $fotProducto = "../imagenes/productos_servicios/productos/".$foto;
		copy($ruta, $fotProducto);
	}
    
    agregarProducto($idCategoria,$foto,$nombre,$descripcion,$precio);
    header('location:../pages/Administrador/administradorProducts/administradorProducts.php');
?>