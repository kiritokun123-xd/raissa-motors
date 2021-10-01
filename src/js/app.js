document.addEventListener("DOMContentLoaded", function() {
    mostrarSubmenu('.navlink','.caja-query','.bx-arrow');

    mostrarPerfil('nav-link-li','caja-perfil','content');

    mostrarMensajes('nav-mensaje','mensajes','content');
    
    ocultarNav('menu','navbar-nav');

    ocultarNavLat('lateral','navbar-nav');
});

const mostrarMensajes = (navmensajeid,mensajeid,contentid) => {
    const navmensaje = document.getElementById(navmensajeid),
    mensaje = document.getElementById(mensajeid),
    content = document.getElementById(contentid)

    if(navmensaje && mensaje && content){
        navmensaje.addEventListener('click', (e)=>{
            e.preventDefault();
            // show navbar
            mensaje.classList.toggle('mostrar')
        })

        content.addEventListener('click', (e) =>{
            let hijos = e.target.parentElement;
            let padre = e.target;
            if(hijos != navmensaje && padre != navmensaje){
                mensaje.classList.remove('mostrar')
            }
        })
    }

}
const ocultarNavLat = (lateralid,navbarid) => {
    const lateral = document.getElementById(lateralid),
    navbarnav = document.getElementById(navbarid)
    if(lateral && navbarnav){
        lateral.addEventListener('click', (e)=>{
            e.preventDefault();
            // show navbar
            navbarnav.classList.toggle('small')
        })
    }

}
const ocultarNav = (menuid, navbarid) =>{
    const menu = document.getElementById(menuid),
    navbar = document.getElementById(navbarid)

    if(menu && navbar){
        menu.addEventListener('click', (e)=>{
            e.preventDefault();

            if(navbar.classList.contains("small")){
                navbar.classList.remove("small");
                navbar.classList.add('ocultar')
            }else{
               // show navbar
                navbar.classList.toggle('ocultar') 
            }
            
        })
    }
}

const mostrarSubmenu = (navlinkid, navcajaid, boxarrowid) =>{
    const navlink = document.querySelectorAll(navlinkid),
    navcaja = document.querySelectorAll(navcajaid),
    boxarrow = document.querySelectorAll(boxarrowid)

    let i=0;
    let ultimoi;
    navlink.forEach((nav => {
        let elemento;
        
        nav.addEventListener('click', (e) =>{
            e.preventDefault();

            if(e.target != nav){
                elemento = e.target.parentElement;
            }else{
                elemento = e.target;
            }
            i = parseInt(elemento.dataset.paso);
            if(ultimoi >=0 && ultimoi != i){
                navcaja[ultimoi].classList.remove('mostrar');
                boxarrow[ultimoi].classList.remove('girar');
                navcaja[i].classList.toggle('mostrar'); 
                boxarrow[i].classList.toggle('girar');
            }else{
                navcaja[i].classList.toggle('mostrar'); 
                boxarrow[i].classList.toggle('girar');
            }
            
            ultimoi = i;
        })
    }))

}



//===MOSTRAR PERFIL CONFIGURACION===//

const mostrarPerfil = (navlinkliid,cajaperfilid,contentid) =>{
    const navlinkli = document.getElementById(navlinkliid),
    cajaperfil = document.getElementById(cajaperfilid),
    content = document.getElementById(contentid)
    // Validate that all variables exist
    if(navlinkli && cajaperfil && content){
        
        navlinkli.addEventListener('click', (e)=>{
            e.preventDefault();
            // show navbar
            cajaperfil.classList.toggle('mostrar')
        })

        content.addEventListener('click', (e) =>{
            let hijos = e.target.parentElement;
            let padre = e.target;
            if(hijos != navlinkli && padre != navlinkli){
                cajaperfil.classList.remove('mostrar')
            }
        })
        
    }
}



// function darkMode(){
//     const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');

//     // if(prefiereDarkMode.matches){
//     //     document.body.classList.add("dark-mode");
//     // }else{
//     //     document.body.classList.remove("dark-mode");
//     // }

//     prefiereDarkMode.addEventListener("change", function(){
//         if(prefiereDarkMode.matches){
//             document.body.classList.add("dark-mode");
//         }else{
//             document.body.classList.remove("dark-mode");
//         }
//     });

//     const botonDarkMode = document.querySelector(".dark-mode-boton");

//     botonDarkMode.addEventListener("click", function(){
//         document.body.classList.toggle("dark-mode");
//     });
// }

// function evenListeners(){
//     const mobileMenu = document.querySelector(".mobile-menu");
//     if(mobileMenu){
//         mobileMenu.addEventListener("click", navegacionResponsive);
//     }
// }

// function navegacionResponsive(){
//     const navegacion = document.querySelector(".navegacion");
//     if(navegacion.classList.contains("mostrar")){
//         navegacion.classList.remove("mostrar");
//     }else{
//         navegacion.classList.add("mostrar");
//     }
// }

//===MOSTRAR SUBMENU===//

