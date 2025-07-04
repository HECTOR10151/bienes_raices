<?php 
    require 'includes/funciones.php';
    incluirTemplate('header');
?>
    <main class="contenedor seccion contenido-centrado">
        <h1>Nuestro Blog</h1>
     <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp"><!-- aqui nos ayuda a que el navegador cargue la imagen en formato webp si es compatible -->
                        <source srcset="build/img/blog1.jpg" type="image/jpg">
                        <img src="build/img/blog1.jpg" alt="Texto Entrada al blog" loading="lazy">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2025</span> por: <span>Admin</span></p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</p>
                    </a>
                </div>
            </article>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp"><!-- aqui nos ayuda a que el navegador cargue la imagen en formato webp si es compatible -->
                        <source srcset="build/img/blog2.jpg" type="image/jpg">
                        <img src="build/img/blog1.jpg" alt="Texto Entrada al blog" loading="lazy">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Guia para la decoracion de tu hogar</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2025</span> por: <span>Admin</span></p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</p>
                    </a>
                </div>
            </article>

     <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog3.webp" type="image/webp"><!-- aqui nos ayuda a que el navegador cargue la imagen en formato webp si es compatible -->
                        <source srcset="build/img/blog3.jpg" type="image/jpg">
                        <img src="build/img/blog3.jpg" alt="Texto Entrada al blog" loading="lazy">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2025</span> por: <span>Admin</span></p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</p>
                    </a>
                </div>
            </article>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog4.webp" type="image/webp"><!-- aqui nos ayuda a que el navegador cargue la imagen en formato webp si es compatible -->
                        <source srcset="build/img/blog4.jpg" type="image/jpg">
                        <img src="build/img/blog4.jpg" alt="Texto Entrada al blog" loading="lazy">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Guia para la decoracion de tu hogar</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2025</span> por: <span>Admin</span></p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</p>
                    </a>
                </div>
            </article>
    </main>
<?php 
     incluirTemplate('footer');
?>