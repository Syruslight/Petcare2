<?php
require '../controlador/conexion.php';
$conn = conectar();

$idproductoservicio = $_REQUEST['id_PE'];
$nombre = $_REQUEST['nombre_PE'];
$precio = $_REQUEST['precio_PE'];
$descripcion = $_REQUEST['descripcion_PE'];
//$tipoProducto = $_REQUEST['tipoProductoE'];
$idtipoProducto = $_POST['Categoria_P2'];


$fotoProductoServicio = $_FILES['fotoNuevaProducto']['name']; 
$ruta = $_FILES['fotoNuevaProducto']['tmp_name'];

// Obtener la foto anterior del formulario
$foto_anterior = $_REQUEST['nombrefotoProducto_PE']; //Nombre del producto guardado en la bd


// Verificar si se ha seleccionado una nueva foto
if (!empty($fotoProductoServicio)) {
	// Se ha seleccionado una nueva foto, guardarla y actualizar la variable $foto
	$fotprod = "../imagenes/productos_servicios/productos/" . $fotoProductoServicio;
	copy($ruta, $fotprod);
} else if ($fotoProductoServicio.is_null(true)){
        $fotoProductoServicio = "sinImagen.jpg"; } 
else {
	// No se ha seleccionado una nueva foto, utilizar la foto anterior
	$fotoProductoServicio = $foto_anterior;
}

//probando valores 
//echo "Valores de los parámetros: idproductoservicio=$fotoProductoServicio";
//echo "Ruta del archivo temporal: " . $ruta;

actualizarProductos($idproductoservicio, $nombre,$precio,$descripcion,$fotoProductoServicio, $idtipoProducto, $conn);
header('Location: ../pages/Administrador/administradorProducts/administradorProducts.php');
?>