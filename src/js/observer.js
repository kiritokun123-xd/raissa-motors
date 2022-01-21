document.addEventListener("DOMContentLoaded", function() {  
    //LAMAR FUNCIOES AQUI
    const headerf = document.querySelector('.header-flotante');
    const wp = document.querySelector('.wp-flotante');
    const fondo = document.querySelector(".fondo-info");

    if(headerf && wp && fondo){
        //Customs
        const options = {
            //root:
            rootMargin: "0px 0px 0px 0px",
            threshold: 0.1,
        }
    
        //Funcion callback
        function callback(entries, observer){
            if(entries[0].isIntersecting){
                //console.log("intersecta");
                headerf.classList.remove('mostrar-header');
                wp.classList.remove('mostrar-wp');
            }else{
                //console.log("NO intersecta");
                headerf.classList.add('mostrar-header');
                wp.classList.add('mostrar-wp');
            }
        }
        //Creamos nuestro observer
        const observer = new IntersectionObserver(callback, options);
    
        observer.observe(fondo);
        

    }

});