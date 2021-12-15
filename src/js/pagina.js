//console.log("hola mundoxd");

document.addEventListener("DOMContentLoaded", function() {  
    //LAMAR FUNCIOES AQUI
    vermenu('hamburger', 'navegador');
    vermenu('hamburger2', 'navegador2');

});

const vermenu = (hamburgerid,navegadorid) =>{
    const hamburger = document.getElementById(hamburgerid),
    navegador = document.getElementById(navegadorid)
    // Validate that all variables exist
    if(hamburger && navegador){
   
        hamburger.addEventListener('click', (e)=>{
            e.preventDefault();
            // show navbar
            navegador.classList.toggle('mostrar-nav');
        })
        
    }
}
const vermenu2 = (hamburgerid,navegadorid) =>{
    const hamburger = document.getElementById(hamburgerid),
    navegador = document.getElementById(navegadorid)
    // Validate that all variables exist
    if(hamburger && navegador){
   
        hamburger.addEventListener('click', (e)=>{
            e.preventDefault();
            // show navbar
            navegador.classList.toggle('mostrar-nav');
        })
        
    }
}