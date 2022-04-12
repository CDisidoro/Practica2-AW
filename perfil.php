<?php namespace es\fdi\ucm\aw\gamersDen;
	require('includes/config.php');
    $tituloPagina = "Mi perfil";
    if(isset($_SESSION['login'])){
        $username = $_SESSION['Usuario'];
        $id = $_SESSION['ID'];    
        $usuario = Usuario::buscarUsuario($username);
        $bio = $usuario->getBio();

        function generaAmigos($usuario){
            $htmlAmigos = '';
            $amigos = $usuario->getfriendlist();
            if(sizeof($amigos) == 0){ //Si no tiene amigos en su lista, dara un mensaje
                $htmlAmigos = '<p>Tu lista de amigos está vacía! Empieza añadiendo amigos con el botón de la derecha!</p>';
                return $htmlAmigos;
            }
            $index = 0;
            while($index < sizeof($amigos[0])){ //$amigos[0][$index] es el id del amigo
                $formulario = new FormularioEliminarAmigos($amigos[2][$index]);
                $formHTML = $formulario->gestiona();

                $srcAvatar = 'img/Avatar';
                $srcAvatar .= $amigos[1][$index];
                $srcAvatar .= '.jpg';

                $htmlAmigos .= '<div class = "amigolista">';
                $htmlAmigos .= '<img class = "avatarPerfilUsuario" src = "';
                $htmlAmigos .= $srcAvatar;
                $htmlAmigos .= '">';
                $htmlAmigos .= '<p class = "nombreamigo">';
                $htmlAmigos .= $amigos[0][$index];
                $htmlAmigos .= '</p>';
                $htmlAmigos .= $formHTML;
                $htmlAmigos .= '</div>';
                $index++;
            }        
            return $htmlAmigos;
        }

        function generaAvatar($usuario){
            $srcAvatar = 'img/Avatar';
            $srcAvatar .= $usuario->getAvatar();
            $srcAvatar .= '.jpg';
    
            $htmlAvatar = '';
            $htmlAvatar .= '<img class = "avatarPerfilUsuario" src = "';
            $htmlAvatar .= $srcAvatar;
            $htmlAvatar .= '">';
            return $htmlAvatar;
        }

        $htmlAvatar = generaAvatar($usuario);
        $htmlAmigos = generaAmigos($usuario);

        $contenidoPrincipal=<<<EOS
            <section class = "content">
                <article class = "avatarydatos">
                    <div class = "cajagrid">
                        <div class = "cajagrid">
                            <a href="cambiarAvatar.php" title="Cambiar de Avatar">{$htmlAvatar}</a>
                        </div>
                        <div class = "cajagrid">
                            <div class = "flexcolumn">
                                <div class = "cajaflex">
                                    <p class = "nombreusuario">{$username}</p>
                                </div>
                                <div class = "cajaflex">
                                    <p class = "descripcion">{$bio}</p>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class = "flexcolumn">
                        <div class = "cajaflex">
                            <p class = "nId">Id#{$id}</p>
                        </div>
                        <div class = "cajaflex">
                            <a href = "chat.php" class = "inbox" > Inbox</a>
                        </div>
                        <div class="cajaflex">
                            <a href = "cambiarBio.php" class = "inbox" > Cambiar Biografia</a>
                        </div>
                    </div>
                </article>
                <article class = "listadeseados">
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
                <article class = "listadeamigos">
                    <h2> Lista de amigos</h2>
                    <div class = "addAmigo">
                        <a href = "addAmigo.php" class = "inbox" > Añadir amigos</a>
                    </div>
                    <div class = "flexrow">
                        {$htmlAmigos}                       
                    </div>
                </article>
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
