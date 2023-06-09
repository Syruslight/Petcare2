<?php
require '../controlador/conexion.php';
$conn = conectar();

$idproductoservicio = $_REQUEST['id_PE'];
$nombre = $_REQUEST['nombre_PE'];
$precio = $_REQUEST['precio_PE'];
$descripcion = $_REQUEST['descripcion_PE'];
$tipoProducto = $_REQUEST['tipoProductoE'];

// Arrary de tipo producto a id
$tipoProductoMap = array(
    'Comida para perros' => '1',
    'Comida para gatos' => '6',
    'Comida para conejos' => '11',
    'Juguetes para perros' => '4',
    'Juguetes para gatos' => '9',
    'Juguetes para conejos' => '14',
    'Accesorios para perros' => '5',
    'Accesorios para gatos' => '10',
    'Accesorios para conejos' => '15'
);


if (isset($tipoProductoMap[$tipoProducto])) {
    $idTipoProducto = $tipoProductoMap[$tipoProducto];
} else {
    $idTipoProducto = '4'; // Defecto 4
}




$fotoProductoServicio = $_FILES['fotoNuevaProducto']['name']; 
$ruta = $_FILES['fotoNuevaProducto']['tmp_name'];

// Obtener la foto anterior del formulario
$foto_anterior = $_REQUEST['nombrefotoProducto_PE']; //Nombre del producto guardado en la bd


// Verificar si se ha seleccionado una nueva foto
if (!empty($fotoProductoServicio)) {
	// Se ha seleccionado una nueva foto, guardarla y actualizar la variable $foto
	$fotprod = "../imagenes/productos_servicios/productos/" . $fotoProductoServicio;
	copy($ruta, $fotprod);
} else {
	// No se ha seleccionado una nueva foto, utilizar la foto anterior
	$fotoProductoServicio = $foto_anterior;
}

//probando valores 
//echo "Valores de los parámetros: idproductoservicio=$fotoProductoServicio";
//echo "Ruta del archivo temporal: " . $ruta;

actualizarProductos($idproductoservicio, $nombre,$precio,$descripcion,$fotoProductoServicio, $idTipoProducto, $conn);
header('Location: ../pages/Administrador/administradorProducts/administradorProducts.php');
?>