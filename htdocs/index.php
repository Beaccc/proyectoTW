<?php

    require "contenido_comun.php";
    require "conectaDB.php";

    //Obtengo el número total de recetas almacenado en la BBDD
    $sql =  "SELECT * FROM recetas ";
    $filas = $conexion->query( $sql);
    $numrecetas = $filas->num_rows;

    HTMLInicio();
    HTMLHeader();
    HTMLNavPublic();
    HTMLpag_inicio();
    HTMLAsidePublic($numrecetas);
    HTMLFooter();
    HTMLFin();

?>