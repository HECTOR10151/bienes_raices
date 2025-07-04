<?php 
    //BASE DE DATOS
    require '../../includes/config/database.php';
    $db=conectarDB();
    // var_dump($db);

    // echo "<pre>";
    // var_dump($_SERVER);
    // echo "</pre>";


    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";

        $TITULO = $_POST['titulo'];
        $PRECIO = $_POST['precio'];
    }

    require '../../includes/funciones.php';
    incluirTemplate('header');
?>
    <main class="contenedor seccion">
        <h1>Nueva Propiedad</h1>
        <a href="/admin" class="boton boton-verde">Volver</a>
        <form action="" class="formulario" method="POST">
            <fieldset>
                <legend>Informacion General</legend>
                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" placeholder="Titulo de la propiedad" name="titulo">

                <label for="precio">Precio:</label>
                <input type="number" id="precio" placeholder="Precio  propiedad" name="precio">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

                <label for="descripcion">Descripcion</label>
                <textarea id="descripcion" placeholder="Descripcion de la propiedad" name="descripcion"></textarea>
            </fieldset>

            <fieldset>
                <legend>Informacion Propiedad</legend>
                <label for="habitaciones">Habitaciones:</label>
                <input type="number" id="habitaciones" placeholder="Ej: 3" max="9" min="1" name="habitaciones">

                <label for="wc">Baños:</label>
                <input type="number" id="wc" placeholder="Ej: 3" max="9" min="1" name="wc">

                <label for="estacionamiento">Estacionamiento:</label>
                <input type="number" id="estacionamiento" placeholder="Ej: 3" max="9" min="1" name="estacionamiento">
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>
                <select name="" id="">
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="1">HECTOR RUIZ</option>
                    <option value="2">ADI RUIZ</option>
                </select>
            </fieldset>
            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>
    </main>
<?php 
     incluirTemplate('footer');
?>