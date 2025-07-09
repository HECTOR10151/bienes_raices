<?php 
    require '../../includes/funciones.php';
    $auth = estaAuntenticado(); //verificar si el usuario esta autenticado
    $auth = $_SESSION['login']; //verificar si la sesion login esta iniciada y es verdadera
    if(!$auth){//verificar si la sesion login esta iniciada y es verdadera
        header('Location: /');//redireccionar al usuario a la pagina de inicio
    }

    //-----Validar el id de la propiedad a actualizar-----
    $id= $_GET['id'] ?? NULL; //obtener el id de la propiedad a actualizar
    $id = filter_var($id, FILTER_VALIDATE_INT);//validar que el id sea un entero
    if(!$id){//si el id no es valido
        header('Location: /admin');//redireccionar a la pagina de admin
    }

    //-----BASE DE DATOS-----
    require '../../includes/config/database.php';
    $db=conectarDB();

    //Obtener los datos de la propiedad a actualizar
    $consulta = "SELECT * FROM propiedades WHERE id = ${id}";//seleccionar la propiedad por su id
    $resultado= mysqli_query($db, $consulta);//ejecutar la consulta a la base de datos
    $propiedad=mysqli_fetch_assoc($resultado);//obtener los datos de la propiedad

    //-----Consultar para obtener los vendedores-----
    $consulta="SELECT * FROM vendedores";
    $resultado=mysqli_query($db, $consulta);

    $errores=[];
    //-----variables para con sus datos cargados para que sean visualizados-----
    $TITULO =$propiedad['titulo'];
    $PRECIO = $propiedad['precio'];
    $DESCRIPCION = $propiedad['descripcion'];
    $HABITACIONES = $propiedad['habitaciones'];
    $WC = $propiedad['wc'];
    $ESTACIONAMIENTO = $propiedad['estacionamiento'];
    $VENDEDORID = $propiedad['vendedores_id']; 
    $imagenPropiedad = $propiedad['imagen'];//obtener la imagen de la propiedad 

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        //-----Santizar los datos sive para limpiar los datos que se envian por el formulario-----
        //-----aqui se procesan los datos del formulario-----
        $TITULO = mysqli_real_escape_string($db, $_POST['titulo']);
        $PRECIO = mysqli_real_escape_string($db, $_POST['precio']);
        $DESCRIPCION = mysqli_real_escape_string($db, $_POST['descripcion']);
        $HABITACIONES = mysqli_real_escape_string($db, $_POST['habitaciones']);
        $WC = mysqli_real_escape_string($db, $_POST['wc']);
        $ESTACIONAMIENTO = mysqli_real_escape_string($db, $_POST['estacionamiento']);
        $VENDEDORID = mysqli_real_escape_string($db, $_POST['vendedor']);
        $CREADO = date('Y/m/d');//fecha de creacion
        //Asignar files hacia una variable
        $IMAGEN = $_FILES['imagen'];//nombre de la imagen
        //-----validar los datos-----
        if(!$TITULO){
            $errores[]="El titulo es obligatorio";
        }
        if(!$PRECIO){
            $errores[]="El precio es obligatorio";
        }
        if($DESCRIPCION < 50){
            $errores[]="La descripcion debe tener al menos 50 caracteres";
        }
        if(!$HABITACIONES){
            $errores[]="El numero de habitaciones es obligatorio";
        }
        if(!$WC){
            $errores[]="El numero de baños es obligatorio";
        }
        if(!$ESTACIONAMIENTO){
            $errores[]="El numero de estacionamientos es obligatorio";
        }
        if(!$VENDEDORID){
            $errores[]="El vendedor es obligatorio";
        }
        
        //Validar por tamaño de imagen (1000Kb)
        $medida= 1000 * 1000; //1000Kb = 1Mb
        if($IMAGEN['size'] > $medida){
            $errores[]="La imagen es muy grande";
        }
        //verificar que el array de errores este vacio
        if(empty($errores)){

            //-----Subida de archivos-----
            //Crear carpeta
            $carpetaImagenes='../../imagenes/';
            if(!is_dir($carpetaImagenes)){
               mkdir($carpetaImagenes); 
            }
            $nombreImagen='';//inicializar la variable nombreImagen

            //Borrar la imagen previa si el usuario sube una nueva
            if($IMAGEN['name']){
               //Eliminar la imagen previa
                unlink($carpetaImagenes.$imagenPropiedad);//unlink() elimina el archivo de la carpeta especificada

                //Generar un nombre unico para la imagen
                $nombreImagen=md5(uniqid(rand(), true)).'.jpg';//md5 genera un hash unico y uniqid genera un id unico basado en el tiempo actual
                //Subir imagen
                //move_uploaded_file() mueve el archivo subido a la carpeta especificada la cual es carpetaImagenes
                move_uploaded_file($IMAGEN['tmp_name'], $carpetaImagenes.$nombreImagen);//tmp_name es el nombre temporal del archivo subido
            }else{
                //Si no se sube una nueva imagen, se mantiene la imagen previa
                $nombreImagen=$imagenPropiedad;//mantener la imagen previa
            }
            

            
           
            //Actualizar en la base de datos
            $query = "UPDATE propiedades SET titulo = '${TITULO}',
            precio = ${PRECIO}, imagen = '${nombreImagen}',
            descripcion = '${DESCRIPCION}',
            habitaciones = ${HABITACIONES},
            wc = ${WC},
            estacionamiento = ${ESTACIONAMIENTO},
            vendedores_id = ${VENDEDORID}
            WHERE id = ${id}";//actualizar la propiedad por su id WHERE id = ${id}
            $resultado= mysqli_query($db, $query);//ejecutar la consulta a la base de datos
            //verificar que se inserto correctamente
            if($resultado){
                // Redireccionar al usuario
                header('Location: /admin?resultado=2');//redireccionar a la pagina de admin
            }  
        }else{
            
        }

    }
    incluirTemplate('header');
?>
    <main class="contenedor seccion">
        <h1>Actualizar Propiedad</h1>
        <a href="/admin" class="boton boton-verde">Volver</a>
        
        <?php foreach($errores as $error): ?><!-- Mostrar errores -->   
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?> <!--Fin de mostrar errores -->  
         
        <form class="formulario" method="POST" enctype="multipart/form-data"><!-- enctype permite enviar archivos al servidor -->
            <!-- enctype="multipart/form-data" permite enviar archivos al servidor -->
            <fieldset>
                <legend>Informacion General</legend>
                <label for="titulo">Titulo:</label><!-- value=php echo $TITULO; esto nos sirve para reimprimir su valor -->
                <input type="text" id="titulo" placeholder="Titulo de la propiedad" name="titulo" value="<?php echo $TITULO; ?>">

                <label for="precio">Precio:</label>
                <input type="number" id="precio" placeholder="Precio  propiedad" name="precio" value="<?php echo $PRECIO; ?>">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

                <img src="/imagenes/<?php echo $imagenPropiedad?>" alt="Imagen de la propiedad" class="imagen-small">

                <label for="descripcion">Descripcion</label>
                <textarea id="descripcion" placeholder="Descripcion de la propiedad" name="descripcion"><?php echo $DESCRIPCION; ?></textarea>
            </fieldset>

            <fieldset>
                <legend>Informacion Propiedad</legend>
                <label for="habitaciones">Habitaciones:</label>
                <input type="number" id="habitaciones" placeholder="Ej: 3" max="9" min="1" name="habitaciones" value="<?php echo $HABITACIONES; ?>">

                <label for="wc">Baños:</label>
                <input type="number" id="wc" placeholder="Ej: 3" max="9" min="1" name="wc" value="<?php echo $WC; ?>">

                <label for="estacionamiento">Estacionamiento:</label>
                <input type="number" id="estacionamiento" placeholder="Ej: 3" max="9" min="1" name="estacionamiento" value="<?php echo $ESTACIONAMIENTO; ?>">
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>
                <select name="vendedor" id="">
                    <option value="" disabled selected>-- Seleccione --</option>
                    <!-- Mostrar los vendedores aqui nos ayuda mysqli_fetch_assoc a meterse al arrego de
                     resultado para validar su contenido-->
                    <?php while($vendedor=mysqli_fetch_assoc($resultado)):?>
                        <option <?php echo $VENDEDORID===$vendedor['id'] ? 'selected' : ''; ?>  value="<?php echo $vendedor['id'];?>">
                            <?php echo $vendedor['nombre']." ".$vendedor['apellido'];?>
                        </option>
                    <?php endwhile;?>
                </select>
            </fieldset>
            <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
        </form>
    </main>
<?php 
     incluirTemplate('footer');
?>