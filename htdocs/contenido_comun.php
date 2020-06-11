<?php

function HTMLInicio(){
    echo '
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8" />
        <title>Recetas BCC</title>
        <link rel = "stylesheet" type = "text/css" href = "/css/receta.css" media="(min-width: 800px)"/>
        <link href="/css/small.css" rel="stylesheet" media="(max-width: 799px)">
        <meta name="viewport" content="width=device-width">
    
    </head>
    <body>';
}

function HTMLFin(){
    echo'
    </body>
    </html>';
}

function HTMLHeader(){
    echo'
    <header>
    <img src="/img/logo.svg" alt="Logo de la página de recetas" width="50px" id="logo1"/>
    <img src="/img/logo.svg" alt="Logo de la página de recetas" width="50px" id="logo2"/>
    <img src="/img/logo.svg" alt="Logo de la página de recetas" width="50px" id="logo3"/>
    <h1>Comida sana para todos los días</h1>
    </header>';
}

function HTMLFooter(){
    echo '
     <footer>
        <nav class="infofooter">
            <ul>
                <li>
                    <span>&copy; 2020 Tecnologías Web</span>
                    <span class="separacion">|</span>
                </li>

                <li>
                    <a href="#">
                        <span>Mapa del sitio</span>
                    </a>
                    <span class="separacion">|</span>
                </li>

                <li>
                    <a href="contacto.php">
                        <span>Contacto</span>
                    </a>
                </li>

            </ul>
        </nav>
    </footer>';
}

function HTMLNavPublic(){
    echo '
    <nav>
    <ul class="menu-nav">
        <li><a href="../index.php">Inicio</a></li>
        <li><a href="listado.php">Listado de recetas</a></li>
        <li><a href="contacto.php">Contacto</a></li>
    </ul>
    </nav>';
}

function HTMLNavPrivado(){
    echo '
    <nav>
        <ul class="menu-nav">
            <li><a href="../index_privado.php">Inicio</a></li>
            <li><a href="listado.php">Listado de recetas</a></li>
            <li><a href="contacto.php">Contacto</a></li>
            <li><a href="receta.php">Añadir receta</a></li>
        </ul>
    </nav>  ';
}

function HTMLAsidePublic($numrecetas){
    
    $url = $_SERVER["REQUEST_URI"];
   
    echo '
       <div id="c_der">
        <section class="b_der" id="bloquelogin">
            <h1>Login</h1>';


                echo '<form action="login.php" method="post" id="login">
               <label for="nameuser">Usuario</label>
                <input type = "text" id = "nameuser" name="nameuser" required/>

                <label for="passuser">Clave</label>
                <input type = "password" id = "passuser" name="passuser"/>

                <input type="submit" value="Login" class="button1" required>
            </form>
        </section>

        <section class="b_der" id="masvaloradas">
            <h1>Más valoradas</h1>
            <p>1 Risotto de calabaza y champiñones</p>
            <p>2 Pollo al salmorejo</p>
            <p>3 Ensalada de espinacas y mango</p>
        </section>

        <section class="b_der" id="numrecetas">
            <h1>Número de recetas</h1>
            <p>El sitio contiene '; echo $numrecetas; echo' recetas diferentes</p>
        </section>
    </div>';
}

function HTMLAsidePrivado($numrecetas){
    
    if(!isset($_SESSION))  session_start();
    
    if(isset($_SESSION['nameuser']))
        $usuario=$_SESSION['nameuser'];

    echo '
    <div id="c_der">

        <section class="b_der" id="bloquelogin">

            <h1>Tu cuenta</h1>';

            echo '<form action="logout.php" method="post" id="logout">';
            echo '<h3>'; echo $usuario; echo '</h3>
                <input type="submit" value="Cerrar sesion" class="button2" required>
            </form>
        </section>

        <section class="b_der" id="masvaloradas">
            <h1>Más valoradas</h1>
            <p>1 Risotto de calabaza y champiñones</p>
            <p>2 Pollo al salmorejo</p>
            <p>3 Ensalada de espinacas y mango</p>
        </section>

        <section class="b_der" id="numrecetas">
            <h1>Número de recetas</h1>
            <p>El sitio contiene '; echo $numrecetas; echo' recetas diferentes</p>
        </section>
    </div>';
}


function HTMLpag_inicio(){
    echo '
    <div id="contenido">
    <main id="c_izq">
        <article class="post_receta">

            <div class="titulo_receta">
                    <h2>Risotto de calabaza y champiñones</h2>
                   <img src="../img/estrellas.png"  alt="Valoracion de la receta" width="200px" id="valoracion"/>
            </div>

           <div class="etiquetas">
               <div class="palabras_clave">Arroz, Cena, Queso, Fácil</div>
               <div class="autor">Autor: el cocinillas</div>
           </div>

           <div class="encabezado">
               <p>El risotto es una técnica culinaria italiana que tiene su origen en el noroeste del país, concretamente en el Piamonte, donde tradicionalmente había abundancia de arroz. Cuando se cocina el risotto, el arroz cuece poco a poco con el resto de ingredientes del plato, no por separado. Verás como en este risotto de calabaza y champiñones uno de los distintivos es el queso parmesano, fundamental en cualquier variedad de risotto.</p>
               <img src="../img/risotto.png" alt="Foto del Risotto de calabaza"/>
           </div>

           <div class="contenido">

               <div class="ingredientes">
                   <ul>
                       <li>1 kilogramo de calabaza</li>
                       <li>1 Cebolleta</li>
                       <li>120 gramos de champiñón</li>
                       <li>60 gramos de Parmesano</li>
                       <li>1 chorro de Aceite de oliva</li>
                       <li>150 gramos de arroz blanco</li>
                       <li>1 pizca de Sal</li>
                       <li>1 pizca de Pimienta negra</li>
                       <li>700 mililitros de caldo de verduras</li>
                   </ul>
               </div>

               <section class="pasos">
                    <p id="p1">1. - Si no tienes caldo de verduras, puedes preparar uno mientras elaborados el resto de la receta. Para ello, pon a hervir unas verduras en abundante agua. Puedes incluir cebolla, puerro, apio y zanahoria. Deja hervir durante media hora y pon un poco de sal.</p>
                    <!--<p id="enlaceoculto"><a href="">Mostrar pasos completos</a></p>-->
                    <p id="p2">2. - Mientras se hace el caldo de verduras, hamos un sofrito con la cebolleta picada y un poco de aceite de oliva. Dejamos que se cocine durante 4 minutos.</p>
                    <p id="p3">3. - Agregamos la calabaza pelada y cortada en cuadraditos. Cuanto más pequeña la cortes antes se cocinará. Ponemos un poco de sal y pimiento negra molida y dejamos cocinar hasta que comience a ablandarse un poco, unos 20 minutos.</p>
                    <p id="p4">4. - Es el momento de incorporar los champiñones fileteados y limpios a este risotto de calabaza. Dejamos cocinar durante 2-3 minutos.</p>
                    <p id="p5">5. - Echamos el arroz, rehogamos mezclando bien con el resto de ingredientes y cubrimos con el caldo de verduras. Vamos moviendo el risotto de calabaza y champiñones poco a poco y dejamos que reduzca el agua.</p>
                    <p id="p6">6. - Lo importante del risotto es ir incorporando el caldo poco a poco y dejar que el arroz suelte el almidón y se cocine a fuego lento, pero siempre con líquido, sin que quede seco. El tiempo de cocción es de unos 20-22 minutos, dependiendo del tipo de arroz.</p>
                    <p id="p7">7. - Cuando tengamos el arroz casi listo, ponemos un poco de parmesano rallado y movemos para que se integre su sabor.</p>
                    <p id="p8">8. - Servimos el risotto de calabaza y champiñones con un poco más de parmesano rallado por encima.</p>
               </section>

               <section class="imagenes-pasos">
                   <img src="../img/paso1.png" alt="paso1" width="180px"/>
                   <img src="../img/paso2.png" alt="paso2" width="180px"/>
                   <img src="../img/paso3.png" alt="paso3" width="180px"/>
                   <img src="../img/paso4.png" alt="paso4" width="180px"/>
                   <img src="../img/paso5.png" alt="paso5" width="180px"/>
                   <img src="../img/paso6.png" alt="paso6" width="180px"/>
                   <img src="../img/paso7.png" alt="paso7" width="180px"/>
                   <img src="../img/paso8.png" alt="paso8" width="180px"/>
               </section>

               <section class="comentarios">
                   <div class="coment">
                       <p><span class="comentariospan" >10/07/2020  Juanita Pérez</span></p>
                       <p>Hmmmmm ... ¡ qué buena pinta tiene !</p>
                   </div>

                   <div class="coment">
                       <p><span class="comentariospan">12/07/2020  Anónimo</span></p>
                       <p>Sí, mañana lo voy a probar y ya os contaré</p>
                   </div>

               </section>

               <div id="siguientes_paginas">
                   <div class="boton"><a href="#">1</a></div>
                   <div class="boton"><a href="#">2</a></div>
                   <div class="boton"><a href="#">3</a></div>
                   <div class="boton"><a href="#">4</a></div>
                   <div class="boton"><a href="#">5</a></div>
                   <a href="#"><img src="../img/escribir.svg"  alt="nuevo post" width="50px" id="img-escribir"
                        onmouseover = "this.src="../img/escribir1.svg";"
                        onmouseout = "this.src="../img/escribir.svg";"/></a>

                   <a href="#"><img src="img/comentar.svg" alt="comentar" width="50px"
                        onmouseover = "this.src="../img/comentar1.svg";"
                        onmouseout = "this.src="../img/comentar.svg";"/></a>

                   <a href="#"><img src="../img/salir.svg" alt="salir" width="50px"
                        onmouseover = "this.src="../img/salir1.svg";"
                        onmouseout = "this.src="../img/salir.svg";"/></a>
               </div>
             </div>

           </article>
    </main> 
    </div>';
}

?>