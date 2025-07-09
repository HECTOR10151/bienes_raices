<?php
    //Importar la conexion a la base de datos
    require 'includes/config/database.php';
    $db = conectarDB();

    $errores=[];

    //Autentifcar el usuario
    if($_SERVER['REQUEST_METHOD']==='POST'){
        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";

        //Asignar los valores de email y sanitizamos 
        $email= mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
        $password= mysqli_real_escape_string($db,$_POST['password']);
        if(!$email){
            $errores[]="El email es obligatorio";
        }
        if(!$password){
            $errores[]="El password es obligatorio";
        }
        if(empty($errores)){
            //Revisar si el usuario existe
            $query = "SELECT * FROM usuarios WHERE email = '${email}'";
            $resultado = mysqli_query($db, $query);
            if($resultado->num_rows){//utilizamos esto $resultado->num_rows porque es un objet resultado
                //revisar si el password es correcto
                $usuario = mysqli_fetch_assoc($resultado);//obtenemos el usuario
                //verificar si el password es correcto
                $auth= password_verify($password, $usuario['password']);
                var_dump($auth);
                if($auth){
                    //El usuario a sido autenticado
                    session_start();//iniciar la sesion
                    $_SESSION['usuario'] = $usuario['email'];//asignar el email del usuario a la sesion
                    $_SESSION['login'] = true;//asignar el login a true
                    header('Location: /admin');//redireccionar al usuario a la pagina de admin
                }else{
                    $errores[]="El password es incorrecto";
                }
            }else{
                $errores[]="El usuario no existe";
            }
        }
    }



    //Incluye el header
    require 'includes/funciones.php';
    incluirTemplate('header');
?>
    <main class="contenedor seccion contenido-centrado" novalidate>
        <h1>Iniciar Sesion</h1>
        <?php foreach($errores as $error):?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach;?>
        <form class="formulario" method="POST">
            <fieldset>
                <legend>Email y Password</legend>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Tu Email" >

                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Tu Password">
            </fieldset>
            <input type="submit" value="Iniciar Sesion" class="boton boton-verde">
    </main>
<?php 
     incluirTemplate('footer');
?>