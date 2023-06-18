<?php
    require '../controlador/conexion.php';
	$conn =conectar();

    $nombre = $_REQUEST['nombre_S'];
    $precio = $_REQUEST['precio_S'];
    $descripcion = $_REQUEST['descripcion_S'];
    
    $foto = $_FILES['foto_S']['name'];
	$ruta = $_FILES['foto_S']['tmp_name'];
    
    
    if(!empty($foto)) {
	    $fotServicio = "../imagenes/productos_servicios/servicios/".$foto;
		copy($ruta, $fotServicio);
	}
    agregarServicios($foto,$nombre,$descripcion,$precio,$conn);
    header('location:../pages/Administrador/administradorService/administradorService.php');
?>