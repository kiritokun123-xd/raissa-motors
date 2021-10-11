document.addEventListener("DOMContentLoaded", function() {
    mostrarSubmenu('.navlink','.caja-query','.bx-arrow');

    mostrarPerfil('nav-link-li','caja-perfil','content');

    mostrarMensajes('nav-mensaje','mensajes','content');
    
    ocultarNav('menu','navbar-nav','mensajes');

    ocultarNavLat('lateral','navbar-nav');

    ampliarArticulo('.img-articulo','.contenido-img','.popup-img');

    verStock('.td-info-stock','popup-stock');


});
function invMotosAjaxId(){
    $('#buscarid').on('input',function(){
        var filtro = $(this).val();
        $.post("/ajax/invmotoAjaxId", { filtro: filtro }, function(data) {
            $("#invmoto-body").html(data);
            
        });  
    })            
}
function invMotosAjax(){
    $('#buscarvim').on('input',function(){
        var filtro = $(this).val();
        $.post("/ajax/invmotoAjax", { filtro: filtro }, function(data) {
            $("#invmoto-body").html(data);
            
        });  
    })            
}
function invPlacasAjaxP(){
    $('#buscarplaca').on('input',function(){
        var filtro = $(this).val();
        $.post("/ajax/invplacaAjaxP", { filtro: filtro }, function(data) {
            $("#invplaca-body").html(data);
            
        });  
    })            
}
function invPlacasAjaxN(){
    $('#buscarpropietario').on('input',function(){
        var filtro = $(this).val();
        $.post("/ajax/invplacaAjaxN", { filtro: filtro }, function(data) {
            $("#invplaca-body").html(data);
            
        });  
    })            
}
function invArticuloAjaxId(){
    $('#buscarid').on('input',function(){
        var filtro = $(this).val();
        $.post("/ajax/invarticuloAjaxId", { filtro: filtro }, function(data) {
            $("#invarticulo-body").html(data);
            
        });  
    })            
}
function invtienda(){
    $('#buscarid').on('input',function(){
        var filtro = $(this).val();
        $.post("/ajax/invtienda", { filtro: filtro }, function(data) {
            $("#invtienda-body").html(data);
            
        });  
    })            
}
function invtiendaN(){
    $('#buscararticulo').on('input',function(){
        var filtro = $(this).val();
        $.post("/ajax/invtiendaN", { filtro: filtro }, function(data) {
            $("#invtienda-body").html(data);
            
        });  
    })            
}

function invArticuloAjax(){
    $('#buscararticulo').on('input',function(){
        var filtro = $(this).val();
        $.post("/ajax/invarticuloAjax", { filtro: filtro }, function(data) {
            $("#invarticulo-body").html(data);
            
        });  
    })            
}
function stockArticuloAjax(){
    $('.td-info-stock').on('click',function(e){
        var id = $(this).data().paso;
        $.post("/ajax/stockarticuloAjax", { id: id }, function(data) {
            $("#contenido-stock").html(data);
            
        });  
    })            
}


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
const ocultarNav = (menuid, navbarid,mensajesid) =>{
    const menu = document.getElementById(menuid),
    navbar = document.getElementById(navbarid),
    mensajes = document.getElementById(mensajesid)

    if(menu && navbar && mensajes){
        menu.addEventListener('click', (e)=>{
            e.preventDefault();

            if(navbar.classList.contains("small")){
                navbar.classList.remove("small")
                navbar.classList.add('ocultar')
                mensajes.toggle('100-w')
            }else{
               // show navbar
                navbar.classList.toggle('ocultar') 
                mensajes.classList.toggle('w-100')
            }
            
        })
    }
}

const verStock = (verstockid,popupstockid) => {
    const verstock = document.querySelectorAll(verstockid),
    popupstock = document.getElementById(popupstockid)
    
    if(verstock && popupstock){
        verstock.forEach( stock => {
            stock.addEventListener('click', (e) => {
                e.preventDefault()
                popupstock.classList.add('active')
    
                popupstock.onclick = function(){
                    popupstock.classList.remove('active')
                }
                
            })
        })
    }
}

const ampliarArticulo = (imgarticuloid,contenidoimgid,popupimagenid)=>{
    const imgarticulo = document.querySelectorAll(imgarticuloid),
    contenidoimg = document.querySelector(contenidoimgid),
    popupimagen = document.querySelector(popupimagenid)

    if(imgarticulo && contenidoimg && popupimagen){
        imgarticulo.forEach((img =>{
            img.addEventListener('click', (e) =>{
                let nombreimg = img.src.split('/')
                let nombre = nombreimg[nombreimg.length - 1]
                //gererar imagen
                const imagen = document.createElement("IMG")
                imagen.src = "/imagenes/" +  nombre;
                contenidoimg.appendChild(imagen)
                popupimagen.classList.add('active')
                popupimagen.onclick = function(){
                    popupimagen.classList.remove('active')
                    imagen.remove()
                }
            })
        }))
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
