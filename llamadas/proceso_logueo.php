<?php
    require '../controlador/conexion.php';
    $con =conectar();

    $usu =$_REQUEST['usuario'];
    $pas =$_REQUEST['contraseña'];
    $status = validarUsuario($usu,$pas,$con);
    if ($status =='administrador') {
        # Se el estado es administrador redirige a pagina admin
        # Aqui se inicia la sesion y se guarda el usuario ingresado como var:user, para usarlo en el perfil,
        # FALTA modificarlo con procedimiento almacenado para obtener el id  con el correo ingresado y mostrar los datos
        session_start();
        $_SESSION['usuario'] = $usu;
        //setcookie("cookie", "$usu", time() + 60 * 2, "/" ,"localhost");
        header("location:../paginas/administrador/perfil.php");
    }
    else if ($status =='user') { #Cliente
        # Se redirige a pagina del cliente - usuario
        session_start();
        $_SESSION['usuario'] = $usu;
        //setcookie("cookie", "$usu", time() + 60 * 2, "/" ,"localhost");
        header("location:../paginas/cliente/perfil.php");
        }
    else if($status =='veterinario'){
        # Se redirige a pagina de veterinario
        session_start();
        $_SESSION['usuario'] = $usu;
        //setcookie("cookie", "$usu", time() + 60 * 2, "/" ,"localhost");
        header("location:../paginas/veterinario/perfil.php");
    }   
    else{
        echo('<script>alert("Usuario o contraseña incorrecta"); window.history.back()</script>');
    }        
?>