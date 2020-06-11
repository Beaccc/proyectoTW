<?php

    require "contenido_comun.php";
    require "conectaDB.php";

    if(!isset($_SESSION)) session_start();
    if(isset($_SESSION['nameuser'])) $usuario=$_SESSION['nameuser'];

    $titulo = $_GET['titulo'];

    //Obtengo el número total de recetas almacenado en la BBDD
    $sql =  "SELECT * FROM recetas ";
    $filas = $conexion->query( $sql);
    $numrecetas = $filas->num_rows;

    $sql1 =  "SELECT * FROM recetas WHERE titulo=\"$titulo\" ";
    $filas1 = $conexion->query( $sql1);
    foreach ($res = $conexion->query($sql1) as $fila) {
        $autor = $fila['autor'];
        $categoria = $fila['categoria'];
        $descripcion = $fila['descripcion'];
        $ingredientes = $fila['ingredientes'];
        $preparacion = $fila['preparacion'];
    }

    HTMLInicio();
    HTMLHeader();

    if(isset($usuario) && $usuario != "")
        HTMLNavPrivado();
    else
        HTMLNavPublic();

?>

    <div id="contenido">
        <main id="c_izq">
            <article class="post_receta">

                <div class="titulo_receta">
                    <h2><?php echo $titulo;?></h2>
                    <p>Autor: <?php echo$autor;?></p>
                </div>


                <div class="encabezado">
                    <p><?php echo $descripcion;?></p>
                    <img src="../img/recipe.png" alt="Foto o logo de la receta"/>
                </div>

                <div class="contenido">

                    <div class="ingredientes">
                        <ul><?php
                            /*Separo la lista de ingredientes por comas*/
                            $tmp = explode( ',', $ingredientes);
                            $longitud = count($tmp);
                            //Recorro todos los ingredientes
                            for($i=0; $i<$longitud; $i++) {
                                echo"<li>";
                                echo $tmp[$i];
                                echo"</li>";
                            }?>
                        </ul>
                    </div>

                    <section class="pasos">
                        <?php
                        /*Separo los diferentes pasos a seguir por puntos*/
                        $pasos = explode( '.', $preparacion);
                        $size = count($pasos);
                        //Recorro todos los pasos
                        for($i=0; $i<$size; $i++) {
                            echo"<p>";
                            echo $i+1;
                            echo ". -";
                            echo $pasos[$i];
                            echo"</p>";
                        }?>
                    </section>

                    <div id="siguientes_paginas">

                        <a href="#"><img src="../img/escribir.svg"  alt="nuevo post" width="50px" id="img-escribir"
                                         onmouseover = "this.src='../img/escribir1.svg';"
                                         onmouseout = "this.src='../img/escribir.svg';"/></a>

                        <?php  if(isset($usuario) && $usuario != ""){
                            echo "<a href=\"edicion_receta.php?titulo=$titulo\"><img src=\"../img/comentar.svg\" alt=\"comentar\" width=\"50px\"
                                    onmouseover = \"this.src='../img/comentar1.svg';\"
                                    onmouseout = \"this.src='../img/comentar.svg';\"/></a>";
                            echo "<a href=\"eliminareceta.php?titulo=$titulo\"><img src=\"../img/salir.svg\" alt=\"salir\" width=\"50px\"
                                     onmouseover = \"this.src='../img/salir1.svg';\"
                                     onmouseout = \"this.src='../img/salir.svg';\"/></a>";
                        }?>
                    </div>
                </div>
            </article>
        </main>
    </div>

<?php

if(isset($usuario) && $usuario != "")
    HTMLAsidePrivado($numrecetas);
else
    HTMLAsidePublic($numrecetas);

HTMLFooter();
HTMLFin();
?>
