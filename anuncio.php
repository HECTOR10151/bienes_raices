<?php 
    //-----Validar el id de la propiedad a actualizar-----
    $id= $_GET['id'] ?? NULL; //obtener el id de la propiedad a actualizar
    $id = filter_var($id, FILTER_VALIDATE_INT);//validar que el id sea un entero
    if(!$id){//si el id no es valido
        header('Location: /admin');//redireccionar a la pagina de admin
    }

    //-----BASE DE DATOS-----
     require __DIR__.'/includes/config/database.php';//ruta al archivo de configuracion de la base de datos
    $db=conectarDB();//funcion que conecta a la base de datos

    //Obtener los datos de la propiedad a actualizar
    $consulta = "SELECT * FROM propiedades WHERE id = ${id}";//seleccionar la propiedad por su id
    $resultado= mysqli_query($db, $consulta);//ejecutar la consulta a la base de datos

    if(!$resultado->mysqli_num_rows){//si no se encuentra la propiedad
        header('Location: /');//redireccionar a la pagina de inicio
    }

    $propiedad=mysqli_fetch_assoc($resultado);//obtener los datos de la propiedad



    require 'includes/funciones.php';
    incluirTemplate('header');
?>
    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en Venta frente al bosque</h1>
        <img loading="lazy" src="/imagenes/<?php echo $propiedad['imagen'];?>" alt="Anuncio">
        <div class="resumen-propiedad">
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
            <p><?php echo $propiedad['descripcion']?></p>         
        </div>
    </main>
<?php 
     incluirTemplate('footer');
?>