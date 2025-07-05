<?php
    //Importar la base de datos
    require __DIR__.'/../config/database.php';//ruta al archivo de configuracion de la base de datos
    $db=conectarDB();//funcion que conecta a la base de datos
    
    //Consultar la base de datos
    $consulta = "SELECT * FROM propiedades LIMIT ${limite}";//seleccionar todas las propiedades y limitar el numero de resultados a 3

    //Obtener los resultados
    $resultado = mysqli_query($db, $consulta);//ejecutar la consulta a la base de datos
?>        
        <div class="contenedor-anuncios">
        <?php while($propiedad=mysqli_fetch_assoc($resultado)):?>    
            <div class="anuncio">
                <img loading="lazy" src="/imagenes/<?php echo $propiedad['imagen'];?>" alt="Anuncio">
                <div class="contenido-anuncio">
                    <h3><?php echo $propiedad['titulo']?></h3>
                    <p><?php echo $propiedad['descripcion']?></p>
                    <p class="precio">$<?php echo $propiedad['precio']?></p>
                    <ul class="iconos-caracteristicas">
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                            <p><?php echo $propiedad['wc']?></p>
                        </li><!-- Icono wc -->

                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono es">
                            <p><?php echo $propiedad['estacionamiento']?></p>
                        </li><!-- Icono estacionamiento -->

                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                            <p><?php echo $propiedad['habitaciones']?></p><!-- Icono dormitorio -->
                        </li>
                    </ul>
                    <a href="anuncio.php?id=<?php echo $propiedad['id']?>" class="boton-amarillo-block">
                        Ver Propiedad
                    </a>
                </div><!-- .Contenido anuncio -->
            </div><!-- Anuncios -->
            <?php endwhile; ?>        
        </div><!-- .Contenedor anuncios -->
<?php
    //Cerrar la conexion a la base de datos
    mysqli_close($db);
?>