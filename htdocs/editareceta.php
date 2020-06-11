<?php

require "conectaDB.php";

$titulo = $_POST["titulo"];

$sql = "UPDATE recetas SET titulo='" . $_POST["titulo"] . "',
autor='" . $_POST["autor"] . "',
categoria='" . $_POST["categoria"] . "',
descripcion='" . $_POST["descripcion"] . "',
ingredientes='" . $_POST["ingredientes"] . "',
preparacion='" . $_POST["preparacion"] . "'  WHERE titulo='$titulo'";
$res = $conexion->query($sql);

if($res) {
    echo("<script>
         alert('Se ha modificado la receta');
         window.location.replace('edicion_receta.php?titulo=$titulo');
         </script>");
}

?>