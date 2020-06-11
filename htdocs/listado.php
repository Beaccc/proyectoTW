<?php
    require "contenido_comun.php";
    require "conectaDB.php";

    //Obtengo el número total de recetas almacenado en la BBDD
    $sql = "SELECT * FROM recetas ";
    $filas = $conexion->query( $sql);
    $numrecetas = $filas->num_rows;

    if(!isset($_SESSION)) session_start();
    if(isset($_SESSION['nameuser'])) $usuario=$_SESSION['nameuser'];

    if (isset($_GET['res'])) {
        $res = $_GET['res'];
        $res = base64_decode($_GET['res']);
        $res = unserialize($res);
    }

    if (isset($_GET['palabraclave'])) {
        $palabraclave = $_GET['palabraclave'];
    }

    if (isset($_GET['orden'])) {
        $orden = $_GET['orden'];
    }

    HTMLInicio();
    HTMLHeader();

    if(isset($usuario) && $usuario != "")
        HTMLNavPrivado();
    else
        HTMLNavPublic();
?>

    <div id="contenido_listado">
        <main id="c_izq">
            <h1>Esta es la pagina del listado de recetas</h1>
            <form method="POST" action="buscareceta.php">
            <label>Buscar recetas por título</label>
            <input type='text' name='palabraclave'
                <?php if (isset($palabraclave)) echo " value='".$palabraclave."'"; ?>/>
                </label>
            <input type="submit" class="button4" value="Buscar"><br>
            
            <label>Ordenar los resultados alfabéticamente:</label>
            <input type="radio" name="ordenacion" value="ASC" <?php if (isset($orden) && $orden=='ASC') echo "checked" ?>> Ascendente
            <input type="radio" name="ordenacion" value="DESC" <?php if (isset($orden) && $orden=='DESC') echo "checked" ?>> Descendente
             </form>
             <br>
            <?php
            if(isset($res)){
            foreach ($res as $receta){
                $titulo = $receta['titulo'];
                echo '<div class="receta"><h3>';
                echo $receta['titulo'];
                echo'</h3>';
                echo'<a href="vista_receta.php?titulo='; echo $titulo; echo'" class="button3">Ver receta</a>';
                if(isset($usuario) && $usuario != "") {
                    echo '<a href="edicion_receta.php?titulo=';
                    echo $titulo;
                    echo '"class="button3">Editar receta</a>';
                    echo '<a href="eliminareceta.php?titulo=';
                    echo $titulo;
                    echo '" class="button3">Borrar receta</a>';
                }
                echo'</div>';
            }}?>
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