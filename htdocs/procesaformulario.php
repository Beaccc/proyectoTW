<?php

    $validado = true;

    if(isset($_POST['nombre'])) {
        $nomb = $_POST['nombre'];
        if (trim($nomb) == '' || !preg_match('/^[a-z A-Z]*$/', $nomb)) {
            $validado = false;
            $_POST['nombre'] = '';
            $error['nombre'] = '<p class="error">Nombre no valido</p>';
        }
    }


    if(isset($_POST['telf'])){
        $telefono = $_POST['telf'];
        $patron = '/[0-9|\+]{0,2}[0-9\- ]/';
        if(trim($telefono) != ''&& !preg_match($patron, $telefono)){
            $validado = false;
            $_POST['telf'] = '';
            $error['telefono'] = '<p class="error">Telefono no valido</p>';
        }
    }


    if(isset($_POST['email'])){
        $email = $_POST['email'];
        if(trim($email) == ''|| !filter_var($email, FILTER_VALIDATE_EMAIL)){
            $validado = false;
            $_POST['email'] = '';
            $error['email'] = '<p class="error">Email no valido</p>';
        }
    }



    if(isset($_POST['comentario'])) {
        $comentario = $_POST['comentario'];
        if (trim($comentario) == '') {
            $validado = false;
            $_POST['comentario'] = '';
            $error['comentario'] = '<p class="error">Debes rellenar el comentario</p>';

        }
    }


    if($validado) {
        echo("<script>
			 alert('Muchas gracias, hemos recibido tu comentario');
			 window.location.replace('./contacto.php');
			 </script>");
    }

    else{
        $error = serialize($error);
        $error = base64_encode($error);
        $error = urlencode($error);
        header("location:contacto.php?nombre=$nomb&email=$email&telefono=$telefono&comentario=$comentario&error=$error");
    }


?>