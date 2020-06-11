<?php

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

if(isset($_SESSION['nameuser'])) {
    session_destroy();
    $_SESSION = array();
    echo("<script>
			 alert('La sesión ha finalizado');
			 window.location.replace('../index.php');
			 </script>");
}
?>