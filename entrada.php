<?php 
    require 'includes/funciones.php';
    incluirTemplate('header');
?>
    <main class="contenedor seccion contenido-centrado">
        <h1>Decoracion de tu hogar</h1>
        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada.jpg" alt="Anuncio Casa en Venta">
        </picture>
        <p class="informacion-meta">Escrito el <span>20/10/2025</span> por: <span>Hector</span></p>
        <div class="resumen-propiedad">
                 
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, cumque. Quisquam, 
                voluptatum. Quos, cumque. Quisquam, voluptatum. Quos, cumque. Quisquam, voluptatum. 
                Quos, cumque. Quisquam, voluptatum. Quos, cumque.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, cumque. Quisquam, 
                voluptatum. Quos, cumque. Quisquam, voluptatum. Quos, cumque. Quisquam, voluptatum. 
                Quos, cumque. Quisquam, voluptatum. Quos, cumque.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, cumque. Quisquam, 
                voluptatum. Quos, cumque. Quisquam, voluptatum. Quos, cumque. Quisquam, voluptatum. 
                Quos, cumque. Quisquam, voluptatum. Quos, cumque.
            </p>         
        </div>
    </main>
<?php 
    incluirTemplate('footer');
?>