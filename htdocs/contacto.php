<?php
    require "contenido_comun.php";
    require "conectaDB.php";

    //Obtengo el número total de recetas almacenado en la BBDD
    $sql =  "SELECT * FROM recetas ";
    $filas = $conexion->query( $sql);
    $numrecetas = $filas->num_rows;


if(!isset($_SESSION)) session_start();
if(isset($_SESSION['nameuser'])) $usuario=$_SESSION['nameuser'];

    HTMLInicio();
    HTMLHeader();
    if(isset($usuario) && $usuario != "")
        HTMLNavPrivado();
    else
        HTMLNavPublic();


    if(isset($_GET['nombre'])) $nombre = $_GET['nombre'];
    if(isset($_GET['email'])) $email = $_GET['email'];
    if(isset($_GET['telefono'])) $telefono = $_GET['telefono'];
    if(isset($_GET['comentario'])) $comentario = $_GET['comentario'];
    if(isset($_GET['error'])) {
        $error = $_GET["error"];
        $error = base64_decode($_GET["error"]);
        $error = unserialize($error);
    }

?>

<div id="contenido_contacto">
    <main id="c_izq">
        <h1>Contacto</h1>
        <p>Autor de la página web: Beatriz Correa Castillo<p>
        <p>Fecha de creación: Abril de 2020</p>
        <p>Si tiene alguna pregunta o sugerencia por favor rellene el siguiente formulario: </p>

        <form method="POST" action="procesaformulario.php" id="formulario_comentario">
            <fieldset>
                <legend align="center">Formulario de contacto</legend>

               <label>Nombre:
                <input type='text' name='nombre'
                <?php if (isset($nombre)) echo " value='".$nombre."'"; ?> />
                <?php if(isset($error['nombre'])){
                   echo $error['nombre']; }
                 ?>
                </label>
                <br>

                <label>Correo electrónico:
                <input type="email" name="email"
                <?php if (isset($email)) echo " value='".$email."'"; ?> />
                <?php if(isset($error['email'])){
                    echo $error['email']; }
                 ?>
                </label>
                <br>

               <label>Teléfono:<br>
                <input type="tel" name="telf"
                <?php if (isset($telefono)) echo " value='".$telefono."'"; ?> />
                <?php if(isset($error['telefono'])){
                   echo $error['telefono']; }
                 ?>
               </label>
                <br>

               <label>Comentario:<br>
                   <textarea id="comentario" name="comentario" rows="4" cols="50">
                       <?php if (isset($comentario)) echo $comentario; ?>
                   </textarea>
                   <?php if(isset($error['comentario'])){
                       echo $error['comentario']; }
                   ?>
               </label>

                <input type="submit" id="btn1" name="submit">
            </fieldset>
        </form>
    </div>
    </main>

<?php

    if(isset($usuario) && $usuario != "")
        HTMLAsidePrivado($numrecetas);
    else
        HTMLAsidePublic($numrecetas);

    HTMLFooter();
    HTMLFin();
?>