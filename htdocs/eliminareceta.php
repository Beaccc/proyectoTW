<?php

require "conectaDB.php";

$titulo = $_GET["titulo"];

$sql = "DELETE FROM recetas WHERE titulo='$titulo'";
$res = $conexion->query($sql);

if($res) {
    echo("<script>
         alert('Se ha eliminado la receta $titulo');
         window.location.replace('../index_privado.php');
         </script>");
}

?>
