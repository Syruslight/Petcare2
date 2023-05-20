<?php 
function conectar() {
    $conn= mysqli_connect ("127.0.0.1", "root", "", "petcare");
    return $conn; 
}

function listarProducto($conn,$precio) {
    $sql="SELECT * FROM productoservicio where precio < $precio";
    $res= mysqli_query($conn, $sql);
    $vec=array();
    while($f= mysqli_fetch_array($res))
        $vec[]=$f;
    return $vec;
}

#-------Consultas correspondientes al logeo del usuario-------

//Función para validar el usuario y en base a esto hacer el redireccionamiento
function validarUsuario($email,$pass,$conn){
    $sql="SELECT tipousuario.nombre as tipoUsuario, usuario.estado as estado
    FROM tipousuario INNER JOIN
         usuario on tipousuario.idtipousuario= usuario.idtipousuario
         where usuario.email ='$email' AND usuario.pass ='$pass'";
   $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
   $fila = mysqli_fetch_assoc($res); // Utilizar mysqli_fetch_assoc en lugar de mysqli_fetch_row
   return $fila; // Devolver la fila completa como un array asociativo
}
//Función para obtener el idUsuario y mostrar sus datos personales posteriormente 
function obteneridUsuario($email,$pass,$conn){
    $sql="SELECT usuario.idusuario
    FROM tipousuario INNER JOIN
         usuario on tipousuario.idtipousuario= usuario.idtipousuario
         where usuario.email LIKE '$email' AND usuario.pass LIKE '$pass'";
    $res=mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $fila = mysqli_fetch_row($res);
    return $fila[0];
}

#-------Consultas relacionadas al registro del cliente-------

//Función para agregar al cliente porque el veterinario y administrador lo crea el del área de sistemas
function agregarCliente($idTipoUsuario, $email, $pass,$estado, $conn){
        $sql="insert into usuario(idtipousuario,email,pass,estado) values('$idTipoUsuario','$email','$pass','$estado')";   
        mysqli_query($conn, $sql) or die(mysqli_error($conn));}

//Esta funcion agrega los datos personales del cliente cuando se logee por primera vez | estado : 1
function agregarDatosCliente($idusuario,$nombres,$apellidos,$dni,$telefono,$direccion,$foto,$sexo,$fechaNac,$estado,$conn)
{
    $sql="insert into cliente(idusuario,nombres,apellidos,dni,telefono,direccion,foto,sexo,fechaNac,estado) values ('$idusuario','$nombres','$apellidos','$dni','$telefono','$direccion','$foto','$sexo','$fechaNac','$estado')";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}

//Funcion para actualizar el cliente por idusuario 
// Función para actualizar el cliente por idusuario
function actualizarDatosCliente($idCliente, $nombres, $apellidos, $telefono, $direccion, $dni,$foto, $conn)
{
    $sql = "UPDATE cliente SET nombres = '$nombres', apellidos = '$apellidos', telefono = '$telefono', direccion = '$direccion', dni = '$dni',foto ='$foto' WHERE idcliente = $idCliente;";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}


//Funcion para listar los datos del cliente
function listarCliente($email,$conn) {
    $sql="SELECT cliente.nombres, cliente.apellidos, cliente.dni, cliente.telefono, cliente.direccion, usuario.email, cliente.foto, cliente.idcliente
    FROM     cliente INNER JOIN
                      usuario ON cliente.idusuario = usuario.idusuario
                      where usuario.email LIKE '$email'";
    $res= mysqli_query($conn, $sql);
    $vec=array();
    while($f= mysqli_fetch_array($res))
        $vec[]=$f;
    return $vec;
}

//Esta funcion actualiza el estado del cliente de 1 a 2 al insertar datos personales
function actualizarEstadoCliente($idusuario,$estado,$conn){
    $sql = "UPDATE usuario SET estado = '$estado' WHERE idusuario = '$idusuario'";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}

#-------Consultas relacionadas a la pagina principal de administrador-------

//Función para añadir los datos personales del administrador cuando se logee por primera vez
function agregarDatosAdministrador($idusuario,$nombres,$apellidos,$dni,$telefono,$direccion,$foto,$sexo,$fechaNac,$estado,$conn){
    $sql="insert into administrador(idusuario,nombres,apellidos,dni,telefono,direccion,foto,sexo,fechaNac,estado) values ('$idusuario','$nombres','$apellidos','$dni','$telefono','$direccion','$foto','$sexo','$fechaNac','$estado')";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}

//Función para listar los datos del cliente por idusuario
function listarAdministrador($email,$conn) {
    $sql="SELECT administrador.nombres, administrador.apellidos, administrador.dni, administrador.telefono, administrador.direccion, usuario.email, administrador.foto
    FROM     administrador INNER JOIN
                      usuario ON administrador.idusuario = usuario.idusuario
                      where usuario.email LIKE '$email'";
    $res= mysqli_query($conn, $sql);
    $vec=array();
    while($f= mysqli_fetch_array($res))
        $vec[]=$f;
    return $vec;
}


#-------Consultas relacionadas a la pagina principal de administrador-------

//Función para añadir los datos personales del administrador cuando se logee por primera vez
function agregarDatosVeterinario($idusuario,$nombres,$apellidos,$dni,$telefono,$direccion,$foto,$sexo,$fechaNac,$estado,$conn){
    $sql="insert into veterinario(idusuario,nombres,apellidos,dni,telefono,direccion,foto,sexo,fechaNac,estado) values ('$idusuario','$nombres','$apellidos','$dni','$telefono','$direccion','$foto','$sexo','$fechaNac','$estado')";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}

//Función para listar los datos del cliente por idusuario
function listarVeterinario($email,$conn) {
    $sql="SELECT veterinario.nombres, veterinario.apellidos, veterinario.dni, veterinario.telefono, veterinario.direccion, usuario.email, veterinario.foto,veterinario.idveterinario
    FROM     veterinario INNER JOIN
                      usuario ON veterinario.idusuario = usuario.idusuario
                      where usuario.email LIKE '$email'";
    $res= mysqli_query($conn, $sql);
    $vec=array();
    while($f= mysqli_fetch_array($res))
        $vec[]=$f;
    return $vec;
}

#Vacunas
//Ingresar datos de la vacuna
function agregarDatosVacuna($lote,$tipo,$descripcion,$conn){
    $sql="insert into vacuna(lote,tipo,descripcion) values ('$lote','$tipo','$descripcion')";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}
?>

