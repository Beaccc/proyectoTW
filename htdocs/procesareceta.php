<?php

require "conectaDB.php";

$validado = true;

if (isset($_POST['titulo'])) {
    $titulo = $_POST['titulo'];
    if (trim($titulo) == '') {
        $validado = false;
        $error['titulo'] = '<p class="error">Debe escribir un titulo</p>';
    }
}

$categorias = array();
//Obtengo todas las categorías a las que puede pertenecer una receta
$sql = "SELECT nombre FROM listacategorias";
$res =  $conexion->query( $sql);
foreach ($res as $cat) {
     $nombre = $cat['nombre'];
     if (isset($_POST[$nombre])) {
         array_push($categorias, $nombre);
     }
}
$categorias = serialize($categorias);
$categorias = base64_encode($categorias);
$categorias = urlencode($categorias);


if (isset($_POST['descripcion'])) {
    $descripcion = $_POST['descripcion'];
    if (trim($descripcion) == '') {
        $validado = false;
        $error['descripcion'] = '<p class="error">Debes rellenar la descripcion</p>';

    }
}

if (isset($_POST['ingredientes'])) {
    $ingredientes = $_POST['ingredientes'];
    if (trim($ingredientes) == '') {
        $validado = false;
        $error['ingredientes'] = '<p class="error">Debes rellenar los ingredientes</p>';

    }
}

if (isset($_POST['preparacion'])) {
    $preparacion = $_POST['preparacion'];
    if (trim($preparacion) == '') {
        $validado = false;
        $error['preparacion'] = '<p class="error">Debe indicar la preparacion de la receta</p>';

    }
}


if ($validado) {
    //Comprobamos si ya hay una receta con ese titulo
    $sql = "SELECT * FROM recetas WHERE titulo = '$_POST[titulo]'";
    $res = $conexion->query($sql);


    //Si ya hay una receta que se llame asi se le obliga al usuario a cambiar el titulo
    if ($res->num_rows != 0) {
        $repetido = "Ya hay una receta con ese titulo por favor elige otro";
        header("location:receta.php?titulo=$titulo&categorias=$categorias&descripcion=$descripcion&ingredientes=$ingredientes&preparacion=$preparacion&repetido=$repetido");
    }

    //Si no hay otra receta con ese titulo, se pide confirmacion al usuario
    else {
        $readonly = 1;
        $confirmacion = "Por favor, confirma la receta antes de añadirla";
        header("location:receta.php?titulo=$titulo&categorias=$categorias&descripcion=$descripcion&ingredientes=$ingredientes&preparacion=$preparacion&readonly=$readonly&confirmacion=$confirmacion");
        

    }
}

else{
    print_r($error);
    $error = serialize($error);
    $error = base64_encode($error);
    $error = urlencode($error);
    $url3= "receta.php?titulo=$titulo&categorias=$categorias&descripcion=$descripcion&ingredientes=$ingredientes&preparacion=$preparacion&error=$error";
    header("Location: $url3");
}
?>

