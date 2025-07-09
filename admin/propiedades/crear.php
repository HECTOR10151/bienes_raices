<?php 
    require '../../includes/funciones.php';
    $auth = estaAuntenticado(); //verificar si el usuario esta autenticado
    $auth = $_SESSION['login']; //verificar si la sesion login esta iniciada y es verdadera
    if(!$auth){//verificar si la sesion login esta iniciada y es verdadera
        header('Location: /');//redireccionar al usuario a la pagina de inicio
    }

     session_start();//iniciar la sesion
    //Validar si el usuario esta autenticado
    $auth = $_SESSION['login']; //verificar si la sesion login esta iniciada y es verdadera
    if(!$auth){//verificar si la sesion login esta iniciada y es verdadera
        header('Location: /');//redireccionar al usuario a la pagina de inicio
    }

    //-----BASE DE DATOS-----
    require '../../includes/config/database.php';
    $db=conectarDB();
    //var_dump($db);
    // echo "<pre>";
    // var_dump($_SERVER);
    // echo "</pre>";

    //-----Consultar para obtener los vendedores-----
    $consulta="SELECT * FROM vendedores";
    $resultado=mysqli_query($db, $consulta);

    $errores=[];

    //-----variables para almacenar los datos del formulario-----
    $TITULO ='';
    $PRECIO = '';
    $DESCRIPCION = '';
    $HABITACIONES = '';
    $WC = '';
    $ESTACIONAMIENTO = '';
    $VENDEDORID ='';    
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";

        // echo "<pre>";
        // var_dump($_FILES);//esto nos permite ver los datos que se envian por el formulario 
        // echo "</pre>";

        //-----Santizar los datos sive para limpiar los datos que se envian por el formulario-----
        //-----aqui se procesan los datos del formulario-----
        $TITULO = mysqli_real_escape_string($db, $_POST['titulo']);
        $PRECIO = mysqli_real_escape_string($db, $_POST['precio']);
        $DESCRIPCION = mysqli_real_escape_string($db, $_POST['descripcion']);
        $HABITACIONES = mysqli_real_escape_string($db, $_POST['habitaciones']);
        $WC = mysqli_real_escape_string($db, $_POST['wc']);
        $ESTACIONAMIENTO = mysqli_real_escape_string($db, $_POST['estacionamiento']);
        $VENDEDORID = mysqli_real_escape_string($db, $_POST['vendedor']);
        $CREADO = date('Y-m-d');//fecha de creacion en formato MySQL

        //Asignar files hacia una variable
        $IMAGEN = $_FILES['imagen'];//nombre de la imagen

        
        
        //-----validar los datos-----
        if(!$TITULO){
            $errores[]="El titulo es obligatorio";
        }
        if(!$PRECIO){
            $errores[]="El precio es obligatorio";
        }
        if(strlen($DESCRIPCION) < 50){
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
        if(!$IMAGEN['name'] || $IMAGEN['error']){//verificar si la imagen fue seleccionada 
            $errores[]="La imagen es obligatoria";
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

            //Generar un nombre unico para la imagen
            $nombreImagen=md5(uniqid(rand(), true)).'.jpg';//md5 genera un hash unico y uniqid genera un id unico basado en el tiempo actual

            //Subir imagen
            //move_uploaded_file() mueve el archivo subido a la carpeta especificada la cual es carpetaImagenes
            move_uploaded_file($IMAGEN['tmp_name'], $carpetaImagenes.$nombreImagen);//tmp_name es el nombre temporal del archivo subido
            
            //insertar en la base de datos usando prepared statements
            $query = "INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedores_id) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($db, $query);
            mysqli_stmt_bind_param($stmt, 'sdssiissi', $TITULO, $PRECIO, $nombreImagen, $DESCRIPCION, $HABITACIONES, $WC, $ESTACIONAMIENTO, $CREADO, $VENDEDORID);
            $resultado = mysqli_stmt_execute($stmt);
            
            if($resultado){
                // Redireccionar al usuario
                header('Location: /admin?resultado=1');//redireccionar a la pagina de admin
            } else {
                $errores[] = "Error al insertar en la base de datos: " . mysqli_error($db);
            }  
        }else{

        }

    }
    incluirTemplate('header');
?>
    <main class="contenedor seccion">
        <h1>Nueva Propiedad</h1>
        <a href="/admin" class="boton boton-verde">Volver</a>
        
        <?php foreach($errores as $error): ?><!-- Mostrar errores -->   
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?> <!--Fin de mostrar errores -->  
         
        <form action="" class="formulario" method="POST" enctype="multipart/form-data"><!-- enctype permite enviar archivos al servidor -->
            <!-- enctype="multipart/form-data" permite enviar archivos al servidor -->
            <fieldset>
                <legend>Informacion General</legend>
                <label for="titulo">Titulo:</label><!-- value=php echo $TITULO; esto nos sirve para reimprimir su valor -->
                <input type="text" id="titulo" placeholder="Titulo de la propiedad" name="titulo" value="<?php echo $TITULO; ?>">

                <label for="precio">Precio:</label>
                <input type="number" id="precio" placeholder="Precio  propiedad" name="precio" value="<?php echo $PRECIO; ?>">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

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
            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>
    </main>
<?php 
     incluirTemplate('footer');
?>