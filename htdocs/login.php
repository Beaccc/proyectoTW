
<?php

    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }

    if(isset($_SESSION['usuario'])){
        $accion = "yaidentificado";
    }

    else if(isset($_POST['nameuser']) && isset($_POST['passuser'])){
        //Se han recibido los datos del formulario de login
        if($_POST['nameuser']=="admin" && $_POST['passuser']=="clave"){
            $_SESSION['nameuser'] = $_POST['nameuser']; //Autenticación correcta
            $_SESSION['nombre'] = "Beatriz Correa";
            $accion = "bienvenida";
        } else
            $accion = "errorautenticacion";
    }else
        $accion = "formulario";


    switch ($accion) {

        case "yaidentificado":
            echo("<script>
			 alert('Usted ya está identificado');
			 window.location.replace('../index_privado.php');
			 </script>");
            break;


        case "errorautenticacion":
            echo("<script>
			 alert('Identificación incorrecta, por favor vuelve a logearte');
			 window.location.replace('../index.php');
			 </script>");
            break;

        case "bienvenida":
            echo("<script>
			 alert('Bienvenida, {$_SESSION['nombre']}, se ha identificado correctamente');
			 window.location.replace('../index_privado.php');
			 </script>");
            break;
    }
    ?>

