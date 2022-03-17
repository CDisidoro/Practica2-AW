<?php namespace es\fdi\ucm\aw\gamersDen;?>
<!DOCTYPE html>
<html>
    <head>  
        <link rel="stylesheet" type="text/css" href="css/estiloperfil.css"/>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Mi perfil</title>
    </head>
    <body>
        <div id = "container"> 
            <header><?php require ('includes/vistas/comun/cabecera.php');?></header>
            <div class = "clearfix"> </div>
            <nav><?php require ('includes/vistas/comun/sidebar.php');?></nav>
            <div class = "clearfix"></div>
            <section id = "content">
                <?php
                    session_start();
                    if(!isset($_SESSION['name'])){
                        echo "<p>No has iniciado sesión. Por favor, logueate para poder ver tu perfil</p>";
                    }else{
                        echo <<<EOS
                            <article id = "avatarydatos">
                            <div class = "cajagrid">
                                <div class = "cajagrid">
                                    <img src = "img/Logo.jpg" class = "avatar"> 
                                </div>
                                <div class = "cajagrid">
                                    <div class = "flexcolumn">
                                        <div class = "cajaflex">
                                            <p id = "nombreusuario">Nombre usuario</p>           
                                        </div>
                                        <div class = "cajaflex">
                                            <p id = "descripcion">Lorem ipsum</p>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class = "flexcolumn">
                                <div class = "cajaflex">
                                    <p class = "nId">Id#594572045</p>
                                </div>
                                <div class = "cajaflex">
                                    <button type="submit" class = "inbox">Inbox</button>
                                </div>
                            </div>
                        </article>
                        <article id = "listadeseados">
                            <h2> Lista de deseos</h2>
                            <div class = "flexrow">
                                <div class = "juegolista">
                                    <img class = "imagenJuegoDeseados" src = "img/Logo.jpg">
                                    <p> Nombre Juego </p>
                                </div>
                                <div class = "juegolista">
                                    <img class = "imagenJuegoDeseados" src = "img/Logo.jpg">
                                    <p> Nombre Juego </p>
                                </div>
                                <div class = "juegolista">
                                    <img class = "imagenJuegoDeseados" src = "img/Logo.jpg">
                                    <p> Nombre Juego </p>                      
                                </div>
                            </div>
                        </article>
                        <article id = "listadeamigos">
                            <h2> Lista de amigos</h2>
                            <div class = "cajaflex">
                                <button type="submit" class = "inbox">Añadir Amigo</button>
                            </div>
                            <div class = "flexrow">
                                <div class = "amigolista">
                                    <img class = "avatar" src = "img/Logo.jpg">
                                    <p class = "nombreamigo"> Nombre Amigo </p>
                                </div>
                                <div class = "amigolista">
                                    <img class = "avatar" src = "img/Logo.jpg">
                                    <p class = "nombreamigo"> Nombre Amigo </p>
                                </div>
                                <div class = "amigolista">
                                    <img class = "avatar" src = "img/Logo.jpg">
                                    <p class = "nombreamigo"> Nombre Amigo </p>                     
                                </div>
                            </div>
                        </article>
                        EOS;
                    }
                ?>
            </section>
            <footer><?php require ('includes/vistas/comun/pie.php');?></footer>
        </div>              	
    </body>
</html>
