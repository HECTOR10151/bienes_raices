<?php 
    require 'includes/funciones.php';
    incluirTemplate('header');
?>
    <main class="contenedor seccion">
        <section class="seccion contenedor">
            <h2>Casas y Depas En Ventas</h2>
                <?php
                    $limite = 10; //Limite de propiedades a mostrar
                    include 'includes/templates/anuncios.php'; //Incluye el archivo anuncios.php que contiene los anuncios de propiedades
                ?>
        </section>
    </main>
<?php 
     incluirTemplate('footer');
?>