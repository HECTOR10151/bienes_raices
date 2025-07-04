<?php 
    require 'includes/funciones.php';
    incluirTemplate('header');
?>
    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en Venta frente al bosque</h1>
        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada.jpg" alt="Anuncio Casa en Venta">
        </picture>
        <div class="resumen-propiedad">
            <p class="precio">$3,000,000</p>
                <ul class="iconos-caracteristicas">
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                            <p>3</p>
                        </li><!-- Icono wc -->

                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono es">
                            <p>3</p>
                        </li><!-- Icono estacionamiento -->

                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                            <p>3</p><!-- Icono dormitorio -->
                        </li>
                </ul>   
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