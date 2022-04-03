<?php namespace es\fdi\ucm\aw\gamersDen;
	require('includes/config.php');
    $tituloPagina = "Noticias";

        $htmlNoticias = '';
        if($_GET['tag'] == null){
            $htmlNoticias .= '<p> Asdasd </p>';
            $htmlNoticias .= $_GET['tag'];
        }
        else{
            $noticias = Noticia::enseñarPorCar($_GET['tag']);
            foreach($noticias as $noticia){
                $htmlNoticias .= '<div class = "noticia">';
                $htmlNoticias .= '<div class = "cajaTitulo">';
                $htmlNoticias .= '<a href ="index.php">';
                $htmlNoticias .= '<img src = "img/Logo.jpg" class = "imagenNoticia">';                                     
                $htmlNoticias .= '</a>';
                $htmlNoticias .= '</div>';                                  
                $htmlNoticias .= '<div class = "cajaTitulo">';
                $htmlNoticias .= '<p class = "tituloNoticia">';
                $htmlNoticias .= $noticia->getTitulo();
                $htmlNoticias .= '</p>';
                $htmlNoticias .= '</div>';
                $htmlNoticias .= '<div class = "cajaTitulo">';
                $htmlNoticias .= '<p class = "descripcionNoticia">';
                $htmlNoticias .= $noticia->getDescripcion();
                $htmlNoticias .='</p>';
                $htmlNoticias .= '</div>';
                $htmlNoticias .= '</div>';
            }
        }

        
    if(isset($_SESSION['login'])){
       
        $contenidoPrincipal=<<<EOS
            <section class = "noticiasPrincipal">
                <div class = "contenedorNoticias">
                    <div class = "noticiaDestacada">
                        <p> NOTICIA DESTACADA </p>
                    </div>
                </div>

                <div  class = "contenedorNoticias">

                    <div class = "noticiasCuadro">
                        <div class = "botones">
                            <div class = "cajaBoton">
                                <a href = "noticas_principal.php?tag=1"> Nuevo </a>
                            </div>

                            <div class = "cajaBoton">
                                <a href = "noticas_principal.php?tag=2"> Destacado </a>
                            </div>

                            <div class = "cajaBoton">
                                <a href = "noticas_principal.php?tag=3"> Popular </a>
                            </div>

                            <div class = "cajaBusqueda">                               
                                <a href = "" > <img src = "img/lupa.png" class = "imagenBusqueda"> </a>
                            </div>

                        </div>

                        <div class = "cuadroNoticias">
                            {$htmlNoticias}                       
                        </div>                            
                    </div>

                </div>
            </section>
        EOS;
    }else{
        $contenidoPrincipal = <<<EOS
            <section class = "content">
                <p>No has iniciado sesión. Por favor, logueate para poder ver tu perfil</p>
            </section>
        EOS;
    }
	include 'includes/vistas/plantillas/plantilla.php';
?>