<?php /*TODO NUESTRO HEADER FUE CAMBIADO POR PHP YA QUE AQUI 
    LO CONTIENE TODO "include 'includes/templates/header.php';"*/
    
    require 'includes/funciones.php'; //Requiere el archivo funciones.php que contiene la funcion incluirTemplate

    //$inicio=true; //Variable para indicar que estamos en la pagina de inicio
    //include 'includes/templates/header.php'; se sistituye por la funcion incluirTemplate
    incluirTemplate('header', $inicio=true);
?>
    <main class="contenedor seccion">
        <h1>Mas sobre nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Iciono Seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sint recusandae qui officiis. 
                    Doloremque reiciendis nobis hic cupiditate, eius ea sed assumenda nulla! Itaque.</p>
            </div><!--Icono 1-->

            <div class="icono">
                <img src="build/img/icono2.svg" alt="Iciono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sint recusandae qui officiis. 
                    Doloremque reiciendis nobis hic cupiditate, eius ea sed assumenda nulla! Itaque.</p>
            </div><!--Icono 2-->

            <div class="icono">
                <img src="build/img/icono3.svg" alt="Iciono Tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sint recusandae qui officiis. 
                    Doloremque reiciendis nobis hic cupiditate, eius ea sed assumenda nulla! Itaque.</p>
            </div><!--Icono 3-->
        </div>
    </main>
    <section class="seccion contenedor">
        <h2>Casas y Depas En Ventas</h2>
            <?php
                $limite = 3; //Limite de propiedades a mostrar
                include 'includes/templates/anuncios.php'; //Incluye el archivo anuncios.php que contiene los anuncios de propiedades
            ?>
        <div class="alinear-derecha">
            <a href="anuncios.php" class="boton-verde">Ver Todas</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pondra en contacto contigo lo mas pronto posible</p>
        <a href="contacto.php" class="boton-amarillo">Contactanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp"><!-- aqui nos ayuda a que el navegador cargue la imagen en formato webp si es compatible -->
                        <source srcset="build/img/blog1.jpg" type="image/jpg">
                        <img src="build/img/blog1.jpg" alt="Texto Entrada al blog" loading="lazy">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
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
                    <a href="entrada.php">
                        <h4>Guia para la decoracion de tu hogar</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2025</span> por: <span>Admin</span></p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</p>
                    </a>
                </div>
            </article>
        </section>

        <section class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    El personal se porto excelente, me ayudaron a encontrar la casa de mis sueños,
                    estoy muy agradecido con ellos, los recomiendo ampliamente.
                </blockquote>
                <p>- Hector Ruiz</p>
            </div>
        </section>
    </div>
<?php 
    //include 'includes/templates/footer.php'; se sistituye por la funcion incluirTemplate
    incluirTemplate('footer');
?>