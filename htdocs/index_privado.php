<?php
    session_start();

    require"contenido_comun.php";
    require"conectaDB.php";

    //Obtengo el número total de recetas almacenado en la BBDD
    $sql =  "SELECT * FROM recetas ";
    $filas = $conexion->query( $sql);
    $numrecetas = $filas->num_rows;

    HTMLInicio();
    HTMLHeader();
    HTMLNavPrivado();
    HTMLpag_inicio();
    HTMLAsidePrivado($numrecetas);
    HTMLFooter();
    HTMLFin();

?><?php
