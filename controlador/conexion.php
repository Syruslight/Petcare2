<?php //Inicio codigo php
 
//Función conexion: cambiar "" en caso de tener contraseña
function conectar() {
    $conn= mysqli_connect ("127.0.0.1", "root", "", "probandojsf");
    return $conn; 
}

//Función de listado de producto
function listarProducto($conn) {
    $sql="select idProducto, categoria.NombreCategoria, Nombre from producto INNER JOIN categoria ON producto.CatProducto = 	categoria.CatProducto";
    $res= mysqli_query($conn, $sql);
    $vec=array();
    while($f= mysqli_fetch_array($res))
        $vec[]=$f;
    return $vec;
}

// Consultas relacionados a la tabla de usuario:

//Agregar usuario
function agregarUsuario($nombre, $contra, $correo, $estado, $conn){
    $sql="insert into usuarios(nombre,contraseña,correo,estado) values('$nombre','$contra','$correo','$estado')";   
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}

//Para el logeo hay 3 estados : administrador, usuario y veterinario, la validación se hace en proceso_logeo.php
function validarUsuario($usu,$pas,$conn){
    $sql="select estado from usuarios where nombre='$usu' and contraseña='$pas'";
    $res=mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $fila = mysqli_fetch_row($res);
    return $fila[0];
}
//El administrador podra ver las cuentas ?

//Consultas relacionadas al cliente

//Listar cliente
function listarCliente($conn){
    $sql="select nombres, apellidos, dni, telefono, direccion from cliente";
    $res=mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $vec=array();
    while($f= mysqli_fetch_array($res)){
        $vec[]=$f;
    }
    return $vec;
}

//Busqueda por dni
function busquedadni($dni, $conn){
    $sql="select nombres, apellidos, dni, telefono, direccion from cliente where dni='$dni'";
    $res=mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $vec=array();
    while($f= mysqli_fetch_array($res)){
        $vec[]=$f;
    }
    return $vec;
}

//Consultas relacionadas a la tabla mascota
//Falta implementar funcionarlidad del id usuario, por aqui por defecto le enviare el 1
//Y falta añadir el peso
function agregarMascota($idusuario,$nombre,$foto,$conn){
    $sql="insert into mascota(idUsuario,mombre,foto) values ('$idusuario','$nombre','$foto')";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
//INSERT INTO `mascota` (`idMascota`, `idUsuario`, `mombre`, `foto`, `peso`) VALUES (NULL, '1', 'Copper', './imagenes/mas...', NULL);
}

?>

