<?php 
    require 'includes/funciones.php';
    incluirTemplate('header');
?>
    <main class="contenedor seccion">
        <h1>Conoce sobre nosotros</h1>
        <div class="contenedor-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre nosotros">
                </picture>
            </div>
            <div class="texto-nosotros">
                <blockquote>
                    25 Años de experiencia
                </blockquote>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, voluptatum. 
                    Quisquam, cumque. Doloribus, voluptatum. Quisquam, cumque.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, voluptatum. 
                    Quisquam, cumque. Doloribus, voluptatum. Quisquam, cumque.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, voluptatum. 
                    Quisquam, cumque. Doloribus, voluptatum. Quisquam, cumque.
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, voluptatum. 
                    Quisquam, cumque. Doloribus, voluptatum. Quisquam, cumque.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                </p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
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
    </section>
<?php 
    incluirTemplate('footer');
?>