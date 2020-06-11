<?php

    require "conectaDB.php";

    $palabraclave = $_POST['palabraclave'];
    $orden = $_POST['ordenacion'];

    $sql = "SELECT titulo FROM recetas WHERE titulo LIKE '%$palabraclave%' ORDER BY titulo $orden";
    $filas = $conexion->query($sql);

    if($filas){
        if(mysqli_num_rows($filas)>0)
            $res = mysqli_fetch_all($filas,MYSQLI_ASSOC);
        else
            $res = [];
    }

    print_r($res);

$res = serialize($res);
$res = base64_encode($res);
$res = urlencode($res);

header("location:listado.php?palabraclave=$palabraclave&orden=$orden&res=$res");

?>