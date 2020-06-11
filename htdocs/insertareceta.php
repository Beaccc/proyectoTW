<?php
require "conectaDB.php";

session_start();
$autor=$_SESSION['nameuser'];

$sql = "SELECT id FROM usuarios WHERE nombre = '$autor'";
$res = $conexion->query($sql);
$res = $res->fetch_row();
$idautor = $res[0];

$titulo = $_POST["titulo"];
$descripcion = $_POST["descripcion"];
$ingredientes = $_POST["ingredientes"];
$preparacion = $_POST["preparacion"];


//Inserto la receta sin las categorias
$sql1 = "INSERT INTO recetas VALUES (null,$idautor,'".$_POST["titulo"]."','".$_POST['descripcion']."','".$_POST['ingredientes']."','".$_POST['preparacion']."')";
$res = $conexion->query($sql1);

if($res) {
    //Obtengo el id de la receta que acabo de insertar
    $sql = "SELECT id FROM recetas WHERE (idautor = $idautor AND nombre = '" . $_POST["titulo"] . "') ";
    $res = $conexion->query($sql);
    foreach ($res as $r) {
        $idreceta = $r['id'];
    }

    //Obtengo todas las categorías a las que puede pertenecer una receta
    $sql = "SELECT * FROM listacategorias";
    $res = $conexion->query($sql);

    //Obtengo todas las categorías a las que pertenece la receta que se va a insertar
    foreach ($res as $cat) {
        $nombre = $cat['nombre'];
        $idcategoria = $cat['id'];

        if (isset($_POST[$nombre])) {
            //Inserto las categorias asociadas a la receta
            $sql = "INSERT INTO categorias VALUES ($idreceta,$idcategoria)";
            $res = $conexion->query($sql);
        }
    }

    //Inserto el evento en el log del sistema
    $descripcion = "'El usuario $idautor ha insertado la receta " . $_POST["titulo"] . "'";
    $date = date('Y-m-d H:i:s');
    $sql = "INSERT INTO log VALUES (null,'$date',$descripcion)";
    $res = $conexion->query($sql);
}

    echo("<script>
         alert('La receta, $titulo, se ha añadido correctamente.');
         window.location.replace('../index_privado.php');
         </script>");
}

else{
    echo("<script>javascript:
    alert('No hemos podido añadir la receta, por favor intentalo más tarde.');
    window.location.replace('../index_privado.php');
     </script>");
}

?>