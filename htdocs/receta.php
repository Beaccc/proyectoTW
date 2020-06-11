<?php
    require "contenido_comun.php";
    require "conectaDB.php";

    //Obtengo el número total de recetas almacenado en la BBDD
    $sql =  "SELECT * FROM recetas ";
    $filas = $conexion->query( $sql);
    $numrecetas = $filas->num_rows;

    //Obtengo todas las categorías a las que puede pertenecer una receta
    $sql1 = "SELECT nombre FROM listacategorias";
    $categorias =  $conexion->query( $sql1);


    if(isset($_GET['titulo'])) $titulo= $_GET["titulo"];
    if(isset($_GET['descripcion']))  $descripcion = $_GET["descripcion"];
    if(isset($_GET['ingredientes'])) $ingredientes = $_GET["ingredientes"];
    if(isset($_GET['preparacion'])) $preparacion = $_GET["preparacion"];
    if(isset($_GET['error'])) {
        $error = $_GET["error"];
        $error = base64_decode($_GET["error"]);
        $error = unserialize($error);
    }
    if(isset($_GET['categorias'])){
        $categ = $_GET["categorias"];
        $categ = base64_decode($_GET["categorias"]);
        $categ = unserialize($categ);
    }


    if(isset($_GET['readonly']))  $readonly = $_GET["readonly"];
    if(isset($_GET['repetido']))  $repetido = $_GET["repetido"];
    if(isset($_GET['confirmacion']))  $confirmacion = $_GET["confirmacion"];


    HTMLInicio();
    HTMLHeader();
    HTMLNavPrivado();

?>

    <div id="contenido_contacto">
        <main id="c_izq">
            <h1>Añadir receta</h1>
            <p>Rellena los siguientes campos:</p>
            <?php if (isset($confirmacion)){
                    echo"<h4>";
                    echo $confirmacion;
                    echo"</h4>";
                } ?>

            <form method="POST"
                  <?php if (isset($readonly) && $readonly == 1) echo'action="insertareceta.php"';
                  else  echo'action="procesareceta.php"';?>
                  id="formulario_receta">
                <fieldset>
                    <p><?php if (isset($repetido)) echo $repetido;?></p>
                    <label>Titulo:
                        <input type='text' name='titulo' id='l2'
                        <?php if (isset($titulo)){ echo 'value="'; echo$titulo; echo'"';}
                        if (isset($readonly) && $readonly == 1) echo "readonly"?> />
                        <?php if(isset($error['titulo'])){
                        echo $error['titulo']; }
                        ?>
                    </label>
                    <br><br>

                    <label>Descripción:<br>
                        <textarea id="comentario" name="descripcion" rows="4" cols="80" <?php if (isset($readonly) && $readonly == 1) echo "readonly"?>>
                         <?php if (isset($descripcion)) echo $descripcion; ?>
                       </textarea>
                        <?php if(isset($error['descripcion'])){
                            echo $error['descripcion']; }?>
                    </label><br><br>

                    <label>Ingredientes:<br>
                        <textarea id="comentario" name="ingredientes" rows="4" cols="80" <?php if (isset($readonly) && $readonly == 1) echo "readonly"?>>
                            <?php if (isset($ingredientes)) echo $ingredientes; ?>
                       </textarea>
                        <?php if(isset($error['ingredientes'])){
                            echo $error['ingredientes']; }?>
                    </label><br><br>

                    <label>Preparación:<br>
                        <textarea id="comentario" name="preparacion" rows="8" cols="80" <?php if (isset($readonly) && $readonly == 1) echo "readonly"?>>
                            <?php if (isset($preparacion)) echo $preparacion; ?>
                       </textarea>
                        <?php if(isset($error['preparacion'])){
                            echo $error['preparacion']; }?>
                    </label><br><br>

                    <label class="categoria">Elige una o varias categorías para la receta:<br>
                    <?php
                    foreach ($categorias as $cat) {
                        ?><input type="checkbox" name="<?php echo $cat['nombre'];?>" value="<?php echo $cat['nombre'];?>" <?php if(isset($readonly) && $readonly == 1 && in_array($cat['nombre'], $categ) ) echo "checked"?>><?php echo $cat['nombre'];?><br>
                    <?php } ?>
                    </label><br>
                    <?php
                    if (isset($readonly) && $readonly == 1)
                        echo '<input type="submit" value="Confirmar"id="btnenviar" name="submit" >';
                    else
                        echo '<input type="submit"  value="Añadir receta" id="btnenviar" name="submit" >';
                    ?>
                </fieldset>
            </form>
        </main>
    </div>

<?php

    HTMLAsidePrivado($numrecetas);
    HTMLFooter();
    HTMLFin();
?>
