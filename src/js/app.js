// document.addEventListener("DOMContentLoaded", function() {
//     evenListeners();

//     darkMode();
// });

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


/*===== SHOW NAVBAR  =====*/ 
const showNavbar = (toggleId, navId, bodyId, headerId) =>{
    const toggle = document.getElementById(toggleId),
    nav = document.getElementById(navId),
    bodypd = document.getElementById(bodyId),
    headerpd = document.getElementById(headerId)
    // Validate that all variables exist
    if(toggle && nav && bodypd && headerpd){
        
        toggle.addEventListener('click', ()=>{
            // show navbar
            nav.classList.toggle('show')
            // change icon
            toggle.classList.toggle('bx-x')
            // add padding to body
            bodypd.classList.toggle('body-pd')
            // add padding to header
            headerpd.classList.toggle('body-pd')
        })
    }else{
        console.log("no hay")
    }
}

showNavbar('header-toggle','nav-bar','body-pd','header')

/*===== LINK ACTIVE  =====*/ 
const linkColor = document.querySelectorAll('.nav__link')

function colorLink(){
    if(linkColor){
        linkColor.forEach(l=> l.classList.remove('active'))
        this.classList.add('active')
    }
}
linkColor.forEach(l=> l.addEventListener('click', colorLink))