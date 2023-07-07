<?php
require '../controlador/conexion.php';
$conn = conectar();

$idproductoservicio = $_REQUEST['id_SE'];
$nombre = $_REQUEST['nombre_SE'];
$precio = $_REQUEST['precio_SE'];
$descripcion = $_REQUEST['descripcion_SE'];

$fotoProductoServicio = $_FILES['fotoNuevaServicio']['name']; 
$ruta = $_FILES['fotoNuevaServicio']['tmp_name'];

// Obtener la foto anterior del formulario
$foto_anterior = $_REQUEST['nombrefotoServicio_PE']; //Nombre del producto guardado en la bd


// Verificar si se ha seleccionado una nueva foto
if (!empty($fotoProductoServicio)) {
	// Se ha seleccionado una nueva foto, guardarla y actualizar la variable $foto
	$fotprod = "../imagenes/productos_servicios/servicios/" . $fotoProductoServicio;
	copy($ruta, $fotprod);
} else {
	// No se ha seleccionado una nueva foto, utilizar la foto anterior
	$fotoProductoServicio = $foto_anterior;
}

//probando valores 
//echo "Valores de los parámetros: nombre=$idproductoservicio";
//echo "Ruta del archivo temporal: " . $ruta;

actualizarServicios($idproductoservicio, $nombre,$precio,$descripcion,$fotoProductoServicio, $conn);
header('Location: ../pages/Administrador/administradorService/administradorService.php');
?>