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
         where usuario.email = ? AND usuario.pass = ?";
         
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'ss', $email, $pass);
    mysqli_stmt_execute($stmt);
    
    $res = mysqli_stmt_get_result($stmt);
    $fila = mysqli_fetch_assoc($res);
    
    return $fila;
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

//Funcion para verificar si ya existe el correo 
function correoExistente($correo, $conn) {
    $sql = "SELECT * FROM usuario WHERE email = '$correo'";
    $result = mysqli_query($conn, $sql);
  
    if (mysqli_num_rows($result) > 0) {
      // El correo ya existe en la base de datos
      return true;
    } else {
      // El correo no existe en la base de datos
      return false;
    }
  }

  //Funcion para crear cuenta de veterinario
  function agregarCuentaVeterinario($correo, $pass, $conn) {
    if (correoExistente($correo, $conn)) {
      // El correo ya existe, retornar el mensaje de error
      return "El correo electrónico ya está registrado";
    } else {
      // El correo no existe, agregar la cuenta veterinario
      $sql = "INSERT INTO usuario (idtipousuario, email, pass, estado) VALUES ('3', '$correo', '$pass', '1')";
      mysqli_query($conn, $sql) or die(mysqli_error($conn));
      
      // Retornar true para indicar que la cuenta veterinario se agregó correctamente
      return true;
    }
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
    $sql = "SELECT cliente.nombres, cliente.apellidos, cliente.dni, cliente.telefono, cliente.direccion, usuario.email, cliente.foto, cliente.idcliente, cliente.puntosacumulados, cliente.puntoscanjeados
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
function agregarDatosLote($lote, $tipo, $descripcion,$estadoLote, $conn)
{
    $sql = "insert into vacuna(lote,tipo,descripcion,estadoLote) values ('$lote','$tipo','$descripcion','$estadoLote')";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}

//Ingresar el detalle vacuna para la mascota
function agregarDatosDetalleVacuna($idMascota, $idVacuna, $idVeterinario, $fechaProxima,$observacion, $restriciones,$conn)
{
    $sql = "insert into detallevacuna(idmascota,idvacuna,idveterinario,  proxFecha, observacion, restricciones) values ('$idMascota','$idVacuna','$idVeterinario','$fechaProxima','$observacion','$restriciones')";
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
function actualizarDatosMascota($idMascota,  $nombre, $peso, $esterilizado, $etapa  , $fotoMascota, $conn){
    $sql = "UPDATE mascota SET nombre = '$nombre', peso = '$peso',  esterilizado = '$esterilizado' , etapa = '$etapa', fotoPerfil = '$fotoMascota' WHERE idmascota = $idMascota;";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}

//Función para listar los datos de la mascota (top3) desde el dashboard principal del cliente
function listarDatosMascotaDasboardCliente($idCliente, $conn) {
    $sql = "SELECT nombre, fotoPerfil, fechaNac, sexo, peso, idmascota,etapa,esterilizado FROM `mascota` WHERE idcliente = '$idCliente' LIMIT 3";
    $result = mysqli_query($conn, $sql);

    $mascotas = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $edad = calcularEdadMascota($row['fechaNac']);
        $row['edad'] = $edad;
        $mascotas[] = $row;
    }

    return $mascotas;
}

//Función para listar los datos de la mascota y poder editarlo 
function listarDatosMascota($idMascota, $conn) {
    $sql = "SELECT nombre, peso, fechaNac, etapa, esterilizado, fotoPerfil, idmascota FROM mascota WHERE idmascota = '$idMascota'";
    $result = mysqli_query($conn, $sql);

    $vec = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $fechaNacimiento = $row['fechaNac'];

        $fechaActual = date('Y-m-d');
        $diferencia = date_diff(date_create($fechaNacimiento), date_create($fechaActual));

        $row['edadAnos'] = $diferencia->format('%y');
        $row['edadMeses'] = $diferencia->format('%m');

        $vec[] = $row;
    }

    return $vec;
}

//Funcion para cargar el carnet desde la mascota seleccionada del del perfil del cliente 
function listarCarnetMascota($idMascota,$conn){
    $sql="SELECT Mascota.nombre, Mascota.fotoPerfil, Mascota.renian, Mascota.fechaNac, Mascota.sexo, Mascota.peso, Raza.nombre AS raza, Mascota.esterilizado, DetalleVacuna.fecha, Vacuna.lote, Vacuna.tipo, DetalleVacuna.observacion FROM DetalleVacuna INNER JOIN Mascota ON DetalleVacuna.idMascota = Mascota.idMascota INNER JOIN Raza ON Mascota.idRaza = Raza.idRaza INNER JOIN Vacuna ON DetalleVacuna.idVacuna = Vacuna.idVacuna WHERE idcliente = '$idMascota'";
    $result = mysqli_query($conn, $sql);
    $vec = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $fechaNacimiento = $row['fechaNac'];

        $fechaActual = date('Y-m-d');
        $diferencia = date_diff(date_create($fechaNacimiento), date_create($fechaActual));

        $row['edadAnos'] = $diferencia->format('%y');
        $row['edadMeses'] = $diferencia->format('%m');

        $vec[] = $row;
    }   return $vec;
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
    $sql = "SELECT productoservicio.fotoProductoServicio as foto, productoservicio.nombre AS nombreproducto, tipoproductoservicio.nombre AS nombretipoproducto, productoservicio.precio FROM productoservicio INNER JOIN tipoproductoservicio ON productoservicio.idtipoproductoservicio = tipoproductoservicio.idtipoproductoservicio
    where productoservicio.idtipoproductoservicio NOT IN ('2', '7', '12')";
    $res = mysqli_query($conn, $sql);
    $vec = array();
    while ($f = mysqli_fetch_array($res)) {
        $vec[] = array(
            'foto' => $f['foto'],
            'nombre' => $f['nombreproducto'],
            'tipo' => $f['nombretipoproducto'],
            'precio' => $f['precio']
        );
    }
    return $vec;
}

function actualizarProductos($idproductoservicio, $nombre, $precio, $descripcion, $fotoProductoServicio, $tipoProducto, $conn)
{
    $sql = "UPDATE productoservicio
    SET nombre = '$nombre', precio = '$precio', descripcion = '$descripcion',
    fotoProductoServicio = '$fotoProductoServicio', idtipoproductoservicio = '$tipoProducto'
    WHERE idproductoservicio = $idproductoservicio";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}


//Funcion para listar los tipos de productos 
function listarTipoProducto($conn){
    $sql = "SELECT nombre,estado FROM tipoproductoservicio where idtipoproductoservicio not like '1' ";
    $res = mysqli_query($conn, $sql);
    $vec = array();
    while ($f = mysqli_fetch_array($res)) {
        $vec[] = array(
            'nombre' => $f['nombre'],
            'estado' => $f['estado'],
        );
    }
    return $vec;
}

//Funcion para agregar productos desde dashboard de administrador:
function agregarProducto($idCategoria,$fotProducto,$nombre,$descripcion,$precio,$conn){
    $sql = "insert into productoservicio(idtipoproductoservicio,fotoProductoServicio,nombre,descripcion,precio,estado) values ('$idCategoria','$fotProducto','$nombre','$descripcion','$precio',1)";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}
//Para insertar productos : INSERT INTO `productoservicio` (`idproductoservicio`, `idtipoproductoservicio`, `nombre`, `fotoProductoServicio`, `precio`, `descripcion`, `estado`) VALUES (NULL, '4', 'Playology Dri-Tech - Soga Sabor Carne De Res', 'playology-dri-tech.jpg', '59.90', 'PLAYOLOGY Dri-Tech Dog Toy perfumado con la exclusiva tecnología Encapsiscent. Cada juguete está infundido con un aroma totalmente natural, fabricado con materiales seguros para perros extra duraderos y diseñado para un juego más duradero.', '1');

//Funcion para obtener el tipo de producto
function obtenerTipoProd($conn){
    $sql= "SELECT * FROM tipoproductoservicio where estado like 1 and tipocategoria not like 'Servicio' ORDER by nombre";
    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    return $res;
}

#     Servicios
//Funcion para listar servicios //modificar el estado 
function listarServicios($conn) {
    $sql = "SELECT productoservicio.idproductoservicio, productoservicio.fotoProductoServicio AS foto, productoservicio.nombre, productoservicio.descripcion, productoservicio.precio, productoservicio.estado FROM productoservicio INNER JOIN tipoproductoservicio on productoservicio.idtipoproductoservicio= tipoproductoservicio.idtipoproductoservicio WHERE tipoproductoservicio.tipocategoria like 'Servicio'" ;
    $res = mysqli_query($conn, $sql);
    $vec = array();
    while ($f = mysqli_fetch_array($res)) {
        $servicio = array(
            'idproductoservicio' => $f['idproductoservicio'],
            'foto' => $f['foto'],
            'nombre' => $f['nombre'],
            'descripcion' => $f['descripcion'],
            'precio' => $f['precio'],
            'estado' => $f['estado']
        ); 
        $vec[] = $servicio;
    }
    return $vec;
}

//Funcion para crear servicios 
function agregarServicios($fotProducto,$nombre,$descripcion,$precio,$conn){
    $sql = "insert into productoservicio(idtipoproductoservicio,fotoProductoServicio,nombre,descripcion,precio,estado) values (1,'$fotProducto','$nombre','$descripcion','$precio',1)";
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
function actualizarServicios($idproductoservicio, $nombre,$precio,$descripcion,$fotoProductoServicio, $conn)
{
    $sql = "UPDATE productoservicio SET nombre = '$nombre', precio = '$precio', descripcion = '$descripcion', 
    fotoProductoServicio = '$fotoProductoServicio' WHERE idproductoservicio = $idproductoservicio;";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}

# Area de puntos

//Funcion para listar el detalle de puntos por producto o servicio adquirido desde pagina principal de cliente
function listarDetallePuntosCliente($idCliente, $conn) {
    $sql = "SELECT productoservicio.nombre, venta.fecha, productoservicio.precio, detalleventa.cantidad, venta.total, puntoscliente.puntos 
            FROM puntoscliente
            JOIN detalleventa ON puntoscliente.iddetalleventa = detalleventa.iddetalleventa
            JOIN venta ON detalleventa.idventa = venta.idventa
            JOIN productoservicio ON detalleventa.idproductoservicio = productoservicio.idproductoservicio
            WHERE venta.idcliente = '$idCliente'
            ORDER BY venta.fecha DESC
            LIMIT 3";
    
    $result = mysqli_query($conn, $sql);

    $detallePuntos = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $detallePuntos[] = $row;
    }

    return $detallePuntos;
}

//funcion registrar horario
function agregarHorario( $idveterinario, $idproductoservicio, $fecha, $horarioinicio, $horariofin, $estado,$conn)
{
    $sql = "insert into horario(idveterinario,idproductoservicio,fecha,horarioinicio,horariofin,estado) 
    values ('$idveterinario','$idproductoservicio','$fecha','$horarioinicio','$horariofin','$estado')";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}

# Area de mantenimiento de cuentas

//Funcion para listar la cuenta de los veterinarios 
function listarCuentasVeterinarios($conn) {
    $sql = "SELECT idusuario,email, pass, fechaCre, estado FROM usuario WHERE idtipousuario = 3 ORDER BY fechaCre DESC";
    $res = mysqli_query($conn, $sql);
    $vec = array();
    while ($f = mysqli_fetch_array($res)) {
        $cuentaVeterinario = array(
            'idusuario' => $f['idusuario'],
            'email' => $f['email'],
            'pass' => $f['pass'],
            'fechaCre' => $f['fechaCre'],
            'estado' => $f['estado']        
        ); 
        $vec[] = $cuentaVeterinario;
    }
    return $vec;
}


?>