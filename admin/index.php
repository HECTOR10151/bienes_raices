<?php 
    require '../includes/funciones.php';
    $auth = estaAuntenticado(); //verificar si el usuario esta autenticado
    $auth = $_SESSION['login']; //verificar si la sesion login esta iniciada y es verdadera
    if(!$auth){//verificar si la sesion login esta iniciada y es verdadera
        header('Location: /');//redireccionar al usuario a la pagina de inicio
    }



    //Importas la conexion a la base de datos
    require '../includes/config/database.php';
    $db=conectarDB();//llamamos a la funcion conectarDB que se encuentra

    //Escribir el Query
    $query="SELECT * FROM propiedades";//seleccionamos todo de la tabla propiedades

    //Consultar la base de datos
    $resultadoConsulta=mysqli_query($db, $query);//ejecutamos la consulta a la base de datos

    $resultado=$_GET['resultado'] ?? NULL;//obtener el resultado de la consulta pero si no existe se asigna NULL

    //-----Eliminar una propiedad-----//
    if($_SERVER['REQUEST_METHOD'] === 'POST'){//validamos que se haya enviado el formulario
        $id=$_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);//validamos que el id sea un entero
        if($id){

            //Eliminar la imagen de la propiedad
            $query = "SELECT imagen FROM propiedades WHERE id = ${id}";//seleccionamos la imagen de la propiedad por su id
            $resultado = mysqli_query($db, $query);//ejecutamos la consulta a la base de datos
            $propiedad = mysqli_fetch_assoc($resultado);//obtenemos los datos de la propiedad
            unlink('../imagenes/' . $propiedad['imagen']);//eliminamos la imagen de la propiedad
           
            //-----Eliminar la propiedad-----//
            $query = "DELETE FROM propiedades WHERE id = ${id}";//eliminar la propiedad por su id
            $resultado = mysqli_query($db, $query);//ejecutar la consulta a la base de datos
            if($resultado){
                header('Location: /admin?resultado=3');//redireccionar a la pagina de admin con el resultado 1
            }
        }
    }

    incluirTemplate('header');
?>
    <main class="contenedor seccion">
        <h1>Administracion de Bienes Raices</h1>
        <!--Mostrar mensaje de resultado de la consulta -->
        <?php if(intval($resultado) === 1):?>
            <p class="alerta exito">Anuncio Creado Correctamente</p>
        <?php elseif(intval($resultado) === 2):?>
            <p class="alerta exito">Anuncio Actualizado Correctamente</p>
        <?php elseif(intval($resultado) === 3):?>
            <p class="alerta exito">Anuncio Eliminado Correctamente</p>
        <?php endif;?>
        <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>

        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody> <!--Mostrar los resultados de la consulta -->
                <?php while($propiedad=mysqli_fetch_assoc($resultadoConsulta)):?>
                    <tr>
                    <td><?php echo $propiedad['id'];?></td>
                    <td><?php echo $propiedad['titulo'];?></td>
                    <td><img src="/imagenes/<?php echo $propiedad['imagen'];?>" 
                    class="imagen-tabla" alt=""></td>
                    <td>$ <?php echo $propiedad['precio'];?></td>
                    <td>
                        <form action="" class="w-100" method="POST">
                            <!-- enviar el id de la propiedad de forma oculta-->
                            <input type="hidden" name="id" value="<?php echo $propiedad['id'];?>">
                            <input type="submit" class="boton-rojo-block" value="Eliminar"> 
                        </form>
                        <a href="admin/propiedades/actualizar.php?id=<?php echo $propiedad['id'];?>"
                         class="boton-amarillo-block">Actualizar</a>
                    </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </main>
<?php 
    //Cerrar la conexion a la base de datos
    mysqli_close($db);//cerramos la conexion a la base de datos

    incluirTemplate('footer');
?>