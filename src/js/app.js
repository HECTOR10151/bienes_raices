document.addEventListener('DOMContentLoaded', function(){

    eventListeners();//aqui llamamos a la funcion eventListeners para que se ejecute cuando se cargue el DOM
    darkMode(); //llamamos a la funcion darkMode para que se ejecute cuando se cargue el DOM
});

function darkMode(){
    
    const prefiereDarkMode=window.matchMedia('(prefers-color-scheme: dark)'); //aqui comprobamos si el usuario tiene configurado el modo oscuro en su sistema operativo
    if(prefiereDarkMode.matches){//si el usuario tiene configurado el modo oscuro, añadimos la clase darkMode al body
        document.body.classList.add('darkMode');//aqui añadimos la clase darkMode al body
    }else{
        document.body.classList.remove('darkMode');//si no tiene configurado el modo oscuro
    }
    
    prefiereDarkMode.addEventListener('change',function(){//aqui le decimos que cuando el usuario cambie la configuracion del modo oscuro, se ejecute la funcion
        if(prefiereDarkMode.matches){//si el usuario tiene configurado el modo oscuro
            document.body.classList.add('darkMode');//añadimos la clase darkMode al body
        }else{
            document.body.classList.remove('darkMode');//si no tiene configurado el modo oscuro, eliminamos la clase darkMode del body
        }
    });

    const botonDarkMode = document.querySelector('.dark-mode-boton');//aqui seleccionamos el icono del modo oscuro
    botonDarkMode.addEventListener('click',function(){//funcion para al dar click en el icono del modo oscuro
        document.body.classList.toggle('darkMode');//aqui alternamos la clase dark-mode en el documento, si la tiene la elimina, si no la tiene la añade

    });
}
function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');//aqui seleccionamos el icono de menu de hamburguesa
    
    mobileMenu.addEventListener('click', navegacionResponsive);//aqui le decimos que cuando se haga click en el icono de menu de hamburguesa, se ejecute la funcion navegacionResponsive
}

function navegacionResponsive(){
    const navegacion=document.querySelector('.navegacion'); //aqui seleccionamos la barra de navegacion del sitio web
  
/*    
    if(navegacion.classList.contains('mostrar')){ //aqui comprobamos si la barra de navegacion tiene la clase mostrar
        navegacion.classList.remove('mostrar'); //si la tiene, la eliminamos, classList funciona para añadir o eliminar clases de un elemento
    }else{
        navegacion.classList.add('mostrar'); //si no la tiene, la añadimos
    }
*/
//HACE TODO ESTO LO DE ARRIBA EN UNA SOLA LINEA
    navegacion.classList.toggle('mostrar');//aqui alternamos la clase mostrar, si la tiene la elimina, si no la tiene la añade


}