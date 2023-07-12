<?php
    #Incluir el controlador donde se tienen las consultas
    require '../controlador/conexion.php';
    //Variable para hacer la conexión
    $conn =conectar();

    //Para hacer el logeo se necesita el correo y la contraseña obtenidos del formulario ....
    $email =$_POST['email'];
    $pass =$_POST['pass'];

    //Al logearse se deben obtener dos datos: 
    $datosUsuario= validarUsuario($email,$pass,$conn);
    //1. El tipo de usuario : Administrador, veterinario, cliente
    $tipoUsuario = $datosUsuario['tipoUsuario']; // Según esto se hace el
    //2. El estado del usuario, es decir : 1.Cuenta Desactivada | 2.Cuenta Activada pero sin datos del usuario |3.Cuenta activada con datos
    $estadoUsuario= $datosUsuario['estado'];
    
    session_start();

    #ObteneridUsuario
    $idUsuario = obteneridUsuario($email, $pass, $conn);
    $_SESSION['idUsuario'] = $idUsuario;
    $_SESSION['tipoUsuario']= $tipoUsuario;
    
    switch ($tipoUsuario) {
        case 'Admin':
            if ($estadoUsuario == 1) { //No tiene datoss
                $_SESSION['usuario'] = $usu;
                $_SESSION['email'] = $email;
                header("location:../pages/Usuario/registroNewUs.php");
            } else { //Cuenta activada con 
                $_SESSION['usuario'] = $usu;
                $_SESSION['email'] = $email;
                header("location:../pages/Administrador/administradorIndex/administrador.php");}
            break;                 
        case 'Cliente':
            if ($estadoUsuario == 1) { //No tiene datoss
                $_SESSION['usuario'] = $usu;
                $_SESSION['email'] = $email;
                header("location:../pages/Usuario/registroNewUs.php");
            } else{
                $_SESSION['usuario'] = $usu;
                $_SESSION['email'] = $email;
                header("location:../pages/Cliente/cliente.php");}
            break;

    #Para el tercer sprint
        case 'Veterinario':
            if($estadoUsuario ==1){
                $_SESSION['usuario'] = $usu;
                $_SESSION['email'] = $email;
                header("location:../pages/Usuario/registroNewUs.php");
            }
            else if ($estadoUsuario ==2){
                $_SESSION['usuario'] = $usu;
                $_SESSION['email'] = $email;
                header("location:../pages/Veterinario/veterinario.php"); //Cambiar ruta 
            }   
            else {
                $_SESSION['usuario'] = $usu;
                $_SESSION['email'] = $email;
                header("location:../pages/Veterinario/unableVet.php"); //Cambiar ruta 
            }break;
        default:
            echo('<script>alert("Usuario o contraseña incorrecta"); window.history.back()</script>');
    }        

?>