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


$titulo = $_GET['titulo'];

$sql1 =  "SELECT * FROM recetas WHERE titulo=\"$titulo\" ";
$filas1 = $conexion->query( $sql1);
foreach ($res = $conexion->query($sql1) as $fila) {
    $autor = $fila['autor'];
    $categoria = $fila['categoria'];
    $descripcion = $fila['descripcion'];
    $ingredientes = $fila['ingredientes'];
    $preparacion = $fila['preparacion'];
}

?>

    <div id="contenido_contacto">
        <main id="c_izq">
            <h1>Edita la receta</h1>

            <form method="POST" id="formulario_receta" action="editareceta.php">
                <fieldset>

                    <label>Titulo:
                        <input type='text' name='titulo' id='l2'>
                            <?php if (isset($titulo)) echo " value='".$titulo."'"; ?>
                    </label>
                    <br><br>

                    <label>Autor:
                        <input type="text" name="autor" id='l2'>
                            <?php if (isset($autor)) echo " value='".$autor."'"; ?>
                    </label>
                    <br><br>

                    <label>Categoria:
                        <input type="text" name="categoria" id='l2'>
                            <?php if (isset($categoria)) echo " value='".$categoria."'"; ?>
                    </label>
                    <br><br>

                    <label>Descripción:<br>
                        <textarea id="comentario" name="descripcion" rows="4" cols="80">
                                 <?php if (isset($descripcion)) echo $descripcion; ?>
                               </textarea>
                    </label><br><br>

                    <label>Ingredientes:<br>
                        <textarea id="comentario" name="ingredientes" rows="4" cols="80">
                                    <?php if (isset($ingredientes)) echo $ingredientes; ?>
                               </textarea>
                    </label><br><br>

                    <label>Preparación:<br>
                        <textarea id="comentario" name="preparacion" rows="8" cols="80">
                                    <?php if (isset($preparacion)) echo $preparacion; ?>
                               </textarea>
                    </label><br><br>


                    <input type="submit" value="Modificar"id="btnenviar" name="submit" >


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
