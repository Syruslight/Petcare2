<?php
function conectar()
{
    $conn = mysqli_connect("127.0.0.1", "root", "", "petcare");
    return $conn;
}


#-------Consultas correspondientes al logeo del usuario-------

//Función para validar el usuario y en base a esto hacer el redireccionamiento
function validarUsuario($email, $pass, $conn)
{
    $sql = "SELECT tipousuario.nombre as tipoUsuario, usuario.estado as estado
    FROM tipousuario INNER JOIN
         usuario on tipousuario.idtipousuario= usuario.idtipousuario
         where usuario.email ='$email' AND usuario.pass ='$pass'";
    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $fila = mysqli_fetch_assoc($res); // Utilizar mysqli_fetch_assoc en lugar de mysqli_fetch_row
    return $fila; // Devolver la fila completa como un array asociativo
}
//Función para obtener el idUsuario y mostrar sus datos personales posteriormente 
function obteneridUsuario($email, $pass, $conn)
{
    $sql = "SELECT usuario.idusuario
    FROM tipousuario INNER JOIN
         usuario on tipousuario.idtipousuario= usuario.idtipousuario
         where usuario.email LIKE '$email' AND usuario.pass LIKE '$pass'";
    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $fila = mysqli_fetch_row($res);
    return $fila[0];
}


#-------Consulta generica a la hora de actualizar el usuario-------

//Funcion actualiza el estado del usuario cuando registre sus datos, de 1 a 2
function actualizarEstado($idusuario, $estado, $conn)
{
    $sql = "UPDATE usuario SET estado = '$estado' WHERE idusuario = '$idusuario'";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}


#-------Consultas relacionadas al registro del cliente-------

//Función para agregar al cliente.  || El veterinario y administrador lo crea el del área de sistemas
function agregarCliente($idTipoUsuario, $email, $pass, $estado, $conn)
{
    $sql = "insert into usuario(idtipousuario,email,pass,estado) values('$idTipoUsuario','$email','$pass','$estado')";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}

//Esta funcion agrega los datos personales del cliente cuando se logee por primera vez | estado : 1
function agregarDatosCliente($idusuario, $nombres, $apellidos, $dni, $telefono, $direccion, $foto, $sexo, $fechaNac, $conn)
{
    $sql = "insert into cliente(idusuario,nombres,apellidos,dni,telefono,direccion,foto,sexo,fechaNac) values ('$idusuario','$nombres','$apellidos','$dni','$telefono','$direccion','$foto','$sexo','$fechaNac')";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}
//Función para actualizar el cliente por idusuario cuando su estado sea 2 desde el dashboard del cliente
function actualizarDatosCliente($idCliente, $nombres, $apellidos, $telefono, $direccion, $dni, $foto, $conn)
{
    $sql = "UPDATE cliente SET nombres = '$nombres', apellidos = '$apellidos', telefono = '$telefono', direccion = '$direccion', dni = '$dni',foto ='$foto' WHERE idcliente = $idCliente;";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}

//Funcion para listar los datos del cliente dependiendo de su correo al logearse
function listarCliente($email, $conn)
{
    $sql = "SELECT cliente.nombres, cliente.apellidos, cliente.dni, cliente.telefono, cliente.direccion, usuario.email, cliente.foto, cliente.idcliente
    FROM     cliente INNER JOIN
                      usuario ON cliente.idusuario = usuario.idusuario
                      where usuario.email LIKE '$email'";
    $res = mysqli_query($conn, $sql);
    $vec = array();
    while ($f = mysqli_fetch_array($res))
        $vec[] = $f;
    return $vec;
}


#-------Consultas relacionadas a la pagina principal de administrador-------

//Función para añadir los datos personales del administrador cuando se logee por primera vez
function agregarDatosAdministrador($idusuario, $nombres, $apellidos, $dni, $telefono, $direccion, $foto, $sexo, $fechaNac, $conn)
{
    $sql = "insert into administrador(idusuario,nombres,apellidos,dni,telefono,direccion,foto,sexo,fechaNac) values ('$idusuario','$nombres','$apellidos','$dni','$telefono','$direccion','$foto','$sexo','$fechaNac')";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}

//Función para listar los datos del administrador por su email, se muestra en el dashboard principal
function listarAdministrador($email, $conn)
{
    $sql = "SELECT administrador.nombres, administrador.apellidos, administrador.dni, administrador.telefono, administrador.direccion, usuario.email, administrador.foto, administrador.idadministrador
    FROM     administrador INNER JOIN
                      usuario ON administrador.idusuario = usuario.idusuario
                      where usuario.email LIKE '$email'";
    $res = mysqli_query($conn, $sql);
    $vec = array();
    while ($f = mysqli_fetch_array($res))
        $vec[] = $f;
    return $vec;
}

//Función para actualizar los datos personales el administrador por idusuario desde el dashboard principal
function actualizarDatosAdministrador($idadministrador, $nombres, $apellidos, $telefono, $direccion, $dni, $foto, $conn)
{
    $sql = "UPDATE administrador SET nombres = '$nombres', apellidos = '$apellidos', telefono = '$telefono', direccion = '$direccion', dni = '$dni',foto ='$foto' WHERE idadministrador = $idadministrador;";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}



#-------Consultas relacionadas a la pagina principal de veterinario-------

//Función para añadir los datos personales del veterinario cuando se logee por primera vez
function agregarDatosVeterinario($idusuario, $nombres, $apellidos, $dni, $telefono, $direccion, $foto, $sexo, $fechaNac, $conn)
{
    $sql = "insert into veterinario(idusuario,nombres,apellidos,dni,telefono,direccion,foto,sexo,fechaNac) values ('$idusuario','$nombres','$apellidos','$dni','$telefono','$direccion','$foto','$sexo','$fechaNac')";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}

//Función para listar los datos del veterinario dentro de su dashboard principal
function listarVeterinario($email, $conn)
{
    $sql = "SELECT veterinario.nombres, veterinario.apellidos, veterinario.dni, veterinario.telefono, veterinario.direccion, usuario.email, veterinario.foto,veterinario.idveterinario
    FROM     veterinario INNER JOIN
                      usuario ON veterinario.idusuario = usuario.idusuario
                      where usuario.email LIKE '$email'";
    $res = mysqli_query($conn, $sql);
    $vec = array();
    while ($f = mysqli_fetch_array($res))
        $vec[] = $f;
    return $vec;
}
//Funcion para actualizar los datos del veterinario desde su dasboard principal
function actualizarVeterinario($idveterinario, $nombres, $apellidos, $telefono, $direccion, $dni, $foto, $conn)
{
    $sql = "UPDATE veterinario SET nombres = '$nombres', apellidos = '$apellidos', telefono = '$telefono', direccion = '$direccion', dni = '$dni',foto ='$foto' WHERE idveterinario = $idveterinario;";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}


#Vacunas

//Ingresar datos de la vacuna
function agregarDatosVacuna($lote, $tipo, $descripcion, $conn)
{
    $sql = "insert into vacuna(lote,tipo,descripcion) values ('$lote','$tipo','$descripcion')";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}


#-------Consultas correspondientes a la mascota------

//Función de registrar los datos de la mascota desde el Perfil del Cliente
function agregarDatosMascota($idcliente, $idraza, $nombre, $fechaNac, $peso, $color, $fotoPerfil, $esterilizado, $etapa, $renian, $sexo, $estado, $conn)
{
    $sql = "insert into mascota(idcliente,idraza,nombre,fechaNac,peso,color,fotoPerfil,esterilizado,etapa,renian,sexo,estado) values ('$idcliente','$idraza','$nombre','$fechaNac','$peso','$color','$fotoPerfil','$esterilizado','$etapa','$renian','$sexo','$estado')";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}

//Función para listar los datos de la mascota, aplica para la busqueda dentro del perfil cliente como para el ver carnet
function listarMascota($idMascota, $conn)
{
    $sql = "SELECT mascota.nombre, mascota.fotoPerfil, 
    CONCAT(
        FLOOR(DATEDIFF(CURRENT_DATE(), mascota.fechaNac) / 365), ' años, ',
        FLOOR((DATEDIFF(CURRENT_DATE(), mascota.fechaNac) % 365) / 30), ' meses, ',
        DATEDIFF(CURRENT_DATE(), mascota.fechaNac) % 30, ' días'
    ) AS edad,mascota.sexo, mascota.peso, raza.nombre AS nombre_raza,mascota.esterilizado,mascota.renian
    FROM mascota INNER JOIN raza ON mascota.idraza = raza.idraza
    WHERE mascota.idmascota LIKE '$idMascota'"; //cambiar el like a = cuando funcione 
    $res = mysqli_query($conn, $sql);
    $vec = array();
    while ($f = mysqli_fetch_array($res))
        $vec[] = $f;
    return $vec;
}

//Función para actualizar los datos de la mascota
function actualizarDatosMascota($idMascota, $nombre, $peso, $color, $fotoPerfil, $conn){
    $sql = "UPDATE mascota SET nombre = '$nombre', peso = '$peso', color = '$color', fotoPerfil = '$fotoPerfil' WHERE idmascota = $idMascota;";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}

//Función para listar los datos de la mascota (top3) desde el dashboard principal del cliente
function listarDatosMascotaDasboardCliente($idCliente, $conn) {
    $sql = "SELECT nombre, fotoPerfil, fechaNac, sexo, peso, idmascota FROM `mascota` WHERE idcliente = '$idCliente' LIMIT 3";
    $result = mysqli_query($conn, $sql);

    $mascotas = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $edad = calcularEdadMascota($row['fechaNac']);
        $row['edad'] = $edad;
        $mascotas[] = $row;
    }

    return $mascotas;
}

function calcularEdadMascota($fechaNacimiento) {
    $fechaActual = date('Y-m-d');
    $diff = date_diff(date_create($fechaNacimiento), date_create($fechaActual));

    $anios = $diff->y;
    $meses = $diff->m;

    $edad = "";
    if ($anios > 0) {
        $edad .= $anios . " año";
        if ($anios > 1) {
            $edad .= "s";
        }
    }

    if ($meses > 0) {
        if ($anios > 0) {
            $edad .= " y ";
        }
        $edad .= $meses . " mes";
        if ($meses > 1) {
            $edad .= "es";
        }
    }

    return $edad;
}

function evaluarEdadEtapa($fechaNacimiento, $esPerro, $esGato, $esConejo){
    //Calculando la edad en años y meses
    $fechaActual = new DateTime();
    $fechaNacimiento = new DateTime($fechaNacimiento);
    $diferencia = $fechaNacimiento->diff($fechaActual);
    $edadYear = $diferencia->y;
    $edadMonth = $diferencia->m;
  
    //Evaluando la etapa segun la especie
    if($esPerro){
        if($edadYear == 0){
            if($edadMonth >= 2 && $edadMonth <= 6){
            $etapa = 'Cachorro';
        } else {
            $etapa = 'Recien Nacido';
       }
    } elseif ($edadYear == 1 && $edadMonth >= 0 && $edadMonth <= 30){
        $etapa = 'Adolescente';
    } elseif ($edadYear >= 1 && $edadMonth >= 3 && $edadYear <= 6){
        $etapa = 'Adulto';
    } elseif ($edadYear >= 7){
        $etapa = 'Senior';
    } else {
        $etapa = 'No definida';
    }
    } elseif ($esGato) {
        if($edadYear == 0){
            if($edadMonth >= 0 && $edadMonth <= 6){
                $etapa = 'Cachorro';
            } else {
                $etapa = 'Recien Nacido';
            }
        } elseif ($edadYear == 0 && $edadMonth >= 6){
            $etapa = 'Joven';
        } elseif ($edadYear == 1 && $edadYear <= 2){
            $etapa = 'Joven';
        } elseif ($edadYear >= 2 && $edadYear <= 6){
            $etapa = 'Adulto';
        } elseif ($edadYear >= 6 && $edadYear <= 10){
            $etapa = 'Maduro';
        } elseif ($edadYear >= 10 && $edadYear <= 14){
            $etapa = 'Senior';
        } elseif ($edadYear >= 14){
            $etapa = 'Geriatrico';
        } else {
            $etapa = 'No definida';
        }
  } else {
        if($edadYear == 0){
            if ($edadYear >= 0 && $edadMonth <= 6){
                $etapa = 'bebé';
            } else {
                $etapa ='Recien Nacido';
            }
        } elseif ($edadYear == 0 && $edadMonth <= 9){
            $etapa = 'adolescente';
        } elseif ($edadMonth == 9 && $edadYear <= 2){
            $etapa = 'adolescente';
        } elseif ($edadYear >= 3 && $edadYear <= 5){
            $etapa = 'adulto';
        } elseif ($edadYear >= 6){
            $etapa = 'anciano';
        }
  }
    return [$edadYear, $edadMonth, $etapa];
}

#   Productos

////Función para listar los datos de la mascota (top3) desde el dashboard principal del cliente
function listarProductos( $conn) { //modificar para que sea el top 4 dependiendo de la tabla detalle venta  y el estado ==1
    $sql = "SELECT productoservicio.fotoProductoServicio, productoservicio.nombre AS nombreproducto, tipoproductoservicio.nombre AS nombretipoproducto, productoservicio.precio FROM productoservicio INNER JOIN tipoproductoservicio ON productoservicio.idtipoproductoservicio = tipoproductoservicio.idtipoproductoservicio where productoservicio.idtipoproductoservicio like '2' LIMIT 3";
    $res = mysqli_query($conn, $sql);
    $vec = array();
    while ($f = mysqli_fetch_array($res)) {
        $vec[] = array(
            'foto' => $f['fotoProductoServicio'],
            'nombre' => $f['nombreproducto'],
            'tipo' => $f['nombretipoproducto'],
            'precio' => $f['precio']
        );
    }
    return $vec;
}

//Para insertar productos : INSERT INTO `productoservicio` (`idproductoservicio`, `idtipoproductoservicio`, `nombre`, `fotoProductoServicio`, `precio`, `descripcion`, `estado`) VALUES (NULL, '4', 'Playology Dri-Tech - Soga Sabor Carne De Res', 'playology-dri-tech.jpg', '59.90', 'PLAYOLOGY Dri-Tech Dog Toy perfumado con la exclusiva tecnología Encapsiscent. Cada juguete está infundido con un aroma totalmente natural, fabricado con materiales seguros para perros extra duraderos y diseñado para un juego más duradero.', '1');


#     Servicios
//Funcion para listar servicios //modificar el estado 
function listarServicios($conn) {
    $sql = "SELECT productoservicio.fotoProductoServicio AS foto, productoservicio.nombre, productoservicio.descripcion, productoservicio.precio FROM productoservicio WHERE productoservicio.idtipoproductoservicio = '1'";
    $res = mysqli_query($conn, $sql);
    $vec = array();
    while ($f = mysqli_fetch_array($res)) {
        $servicio = array(
            'foto' => $f['foto'],
            'nombre' => $f['nombre'],
            'descripcion' => $f['descripcion'],
            'precio' => $f['precio']
        );
        $vec[] = $servicio;
    }
    return $vec;
}

//Funcion para crear servicios 
function crearServicios($idTipoProductoServicio,$nombre,$precio,$descripcion,$fotoProductoServicio, $estado, $conn){
    $sql = "insert into productoservicio(idtipoproductoservicio,nombre,precio,descripcion,fotoProductoServicio,estado) values ('$idTipoProductoServicio','$nombre','$precio','$descripcion','$fotoProductoServicio','$estado')";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}

//Funcion para listar servicios pero con parametros para editarlo posteriormente
function listarServiciosPorId($idServicio, $conn) {
    $sql = "SELECT nombre,precio,descripcion,fotoProductoServicio,estado FROM `productoservicio` WHERE idproductoservicio = '$idServicio'";
    $res = mysqli_query($conn, $sql);
    $vec = array();
    while ($f = mysqli_fetch_array($res))
        $vec[] = $f;
    return $vec;
}


//Funcion para editar los servicios (precio nombre descripcion estado - desactivarlo)
function actualizarServicios($idproductoservicio, $nombre,$precio,$descripcion,$fotoProductoServicio, $estado, $conn)
{
    $sql = "UPDATE productoservicio SET nombre = '$nombre', precio = '$precio', descripcion = '$descripcion', fotoProductoServicio = '$fotoProductoServicio', estado = '$estado' WHERE idproductoservicio = $idproductoservicio;";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}


?>