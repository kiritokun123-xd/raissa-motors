document.addEventListener("DOMContentLoaded", function() {
    mostrarSubmenu('.navlink','.caja-query','.bx-arrow');

    mostrarPerfil('nav-link-li','caja-perfil','content');

    mostrarMensajes('nav-mensaje','mensajes','content');
    
    ocultarNav('menu','navbar-nav','mensajes');

    ocultarNavLat('lateral','navbar-nav');

    ampliarArticulo('.img-articulo','.contenido-img','.popup-img');

    verStock('.td-info-stock','popup-stock');

    verEspe('.especi', 'popupespe');
});
function functionsAjax() {
    invArticuloAjaxId()
    invArticuloAjax()    
    stockArticuloAjax()     
    
    invMotosAjaxId()
    invMotosAjax()
    
    invPlacasAjaxP()
    invPlacasAjaxN()

    invPedidosAjaxC()
    invPedidosAjaxF()

    invtienda()
    invtiendaN()

    invensamblaje()
    invensamblajeN()

    invsoldadura()
    invsoldaduraN()

    invUsuariosAjaxId()
    invUsuariosAjaxN() 
    
    indicador1Ajax()
    indicador1AjaxG()

    indicador2Ajax()
    indicador2AjaxG()
}
function mensajeAlerta(titulo,texto,icono,boton){
    Swal.fire({
        title: titulo,
        text: texto,
        icon: icono,
        confirmButtonText: boton
    })
}
function indicador2AjaxG(){
    $('#verindicador2').on('change',function(){
        var filtro = $(this).val();
        $.post("/ajax/indicador2AjaxG", { filtro: filtro }, function(data) {
            $("#myChart2").html(data);
            
        });  
    })            
}
function indicador2Ajax(){
    $('#buscarindicador2').on('change',function(){
        var filtro = $(this).val();
        $.post("/ajax/indicador2Ajax", { filtro: filtro }, function(data) {
            $("#invindicador2-body").html(data);
            
        });  
    })            
}
function indicador1AjaxG(){
    $('#verindicador').on('change',function(){
        var filtro = $(this).val();
        $.post("/ajax/indicador1AjaxG", { filtro: filtro }, function(data) {
            $("#myChart").html(data);
            
        });  
    })            
}
function indicador1Ajax(){
    $('#buscarindicador').on('change',function(){
        var filtro = $(this).val();
        $.post("/ajax/indicador1Ajax", { filtro: filtro }, function(data) {
            $("#invindicador1-body").html(data);
            
        });  
    })            
}
function invUsuariosAjaxId(){
    $('#buscarid').on('input',function(){
        var filtro = $(this).val();
        $.post("/ajax/invusuarioAjaxId", { filtro: filtro }, function(data) {
            $("#usuario-body").html(data);
            
        });  
    })            
}
function invUsuariosAjaxN(){
    $('#buscarnombre').on('input',function(){
        var filtro = $(this).val();
        $.post("/ajax/invusuarioAjaxN", { filtro: filtro }, function(data) {
            $("#usuario-body").html(data);
            
        });  
    })            
}
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
function invPedidosAjaxC(){
    $('#buscarcl').on('input',function(){
        var filtro = $(this).val();
        $.post("/ajax/invpedidoAjaxC", { filtro: filtro }, function(data) {
            $("#invpedido-body").html(data);
            
        });  
    })            
}
function invPedidosAjaxF(){
    $('#buscarfec').on('input',function(){
        var filtro = $(this).val();
        $.post("/ajax/invpedidoAjaxF", { filtro: filtro }, function(data) {
            $("#invpedido-body").html(data);
            
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
function invensamblaje(){
    $('#buscarid').on('input',function(){
        var filtro = $(this).val();
        $.post("/ajax/invensamblaje", { filtro: filtro }, function(data) {
            $("#invensamblaje-body").html(data);
            
        });  
    })            
}
function invsoldadura(){
    $('#buscarid').on('input',function(){
        var filtro = $(this).val();
        $.post("/ajax/insoldadura", { filtro: filtro }, function(data) {
            $("#invsoldadura-body").html(data);
            
        });  
    })            
}
function invsoldaduraN(){
    $('#buscararticulo').on('input',function(){
        var filtro = $(this).val();
        $.post("/ajax/insoldaduraN", { filtro: filtro }, function(data) {
            $("#invsoldadura-body").html(data);
            
        });  
    })            
}
function invensamblajeN(){
    $('#buscararticulo').on('input',function(){
        var filtro = $(this).val();
        $.post("/ajax/invensamblajeN", { filtro: filtro }, function(data) {
            $("#invensamblaje-body").html(data);
            
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

const verEspe = (verespeid,popupmotoid) => {
    const verespe = document.querySelectorAll(verespeid),
    popupespe = document.getElementById(popupmotoid)
    
    if(verespe && popupespe){
        console.log("hola")
        verespe.forEach( stock => {
            stock.addEventListener('click', (e) => {
                e.preventDefault()
                popupespe.classList.add('active')
    
                popupespe.onclick = function(){
                    popupespe.classList.remove('active')

                }
                
            })
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
                    // const stockimg = document.querySelector('.stock-img'),
                    // stockinfo = document.querySelector('.stock-info')

                    // contenidostock.removeChild(stockimg)
                    // contenidostock.removeChild(stockinfo)

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
