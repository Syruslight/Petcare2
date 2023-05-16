<?php
    #Incluir el controlador donde se tienen las consultas
    require '../controlador/conexion.php';
    //Variable para hacer la conexión
    $conn =conectar();

    //Para hacer el logeo se necesita el correo y la contraseña obtenidos del formulario ....
    $email =$_REQUEST['email'];
    $pass =$_REQUEST['pass'];

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
    
    
    switch ($tipoUsuario) {
        case 'Admin':
            if ($estadoUsuario == 1) { //No tiene datoss
                $_SESSION['usuario'] = $usu;
                $_SESSION['email'] = $email;
                header("location:../paginas/paginaPreviaAdmin.php");
            } else { //Cuenta activada con 
                $_SESSION['usuario'] = $usu;
                $_SESSION['email'] = $email;
                header("location:../paginas/pagAdministrador.php");}
            break;                 
        case 'Cliente':
            if ($estadoUsuario == 1) { //No tiene datoss
                $_SESSION['usuario'] = $usu;
                $_SESSION['email'] = $email;
                header("location:../paginas/paginaPreviaCliente.php");
            } else{
                $_SESSION['usuario'] = $usu;
                $_SESSION['email'] = $email;
                header("location:../paginas/paginaPrincipalCliente.php");}
            break;
            

    #Para el tercer sprint
        case 'Veterinario':
            if($estadoUsuario ==1){

            }
                $_SESSION['usuario'] = $usu;
                header("location:../paginas/paginaPrincipalVeterinario.php");
                break;
        
        default:
            echo('<script>alert("Usuario o contraseña incorrecta"); window.history.back()</script>');
    }        

?>