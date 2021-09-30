document.addEventListener("DOMContentLoaded", function() {
    showNavbar('nav-link','nav-caja');

    mostrarPerfil('nav-link-li','caja-perfil','content');
});
const showNavbar = (navlinkid, navcajaid) =>{
    const navlink = document.getElementById(navlinkid),
    navcaja = document.getElementById(navcajaid)
    // Validate that all variables exist
    if(navlink && navcaja){
        
        navlink.addEventListener('click', (e)=>{
            e.preventDefault();
            // show navbar
            navcaja.classList.toggle('mostrar')
        })
        
    }else{
        console.log("no hay")
    }
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
            var click = e.target;
            if(click != cajaperfil){
                console.log("Hola")
                cajaperfil.classList.remove('mostrar')
            }
            
        })
        
    }else{
        console.log("no hay")
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

