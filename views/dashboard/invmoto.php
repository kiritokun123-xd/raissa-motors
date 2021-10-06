<main class="main">
    <h2 class="main-titulo">Inventario Motos</h2>

    <div class="gestion-articulo">
        <div class="gestion-titulo">
            <h3>Gestionar Artículos</h3>
        </div>
        <div class="gestion-caja">
            <div class="nuevo-articulo" id="nuevo-articulo">
                <a href="">Nuevo Artículo</a>
            </div>
            <div class="buscar-articulo">
                <label for="buscarid">Buscar Artículo:</label>
                <input type="text" id="buscarid">
            </div>
        </div>
    </div>

    <div class="contenedor-tabla">
        <table class="table">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Modelo</th>
                    <th>Descripción</th>
                    <th>Vim</th>
                    <th>Nº Motor</th>
                    <th>Dua</th>
                    <th>Color</th>
                    <th>Peso</th>
                    <th>Acciones</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="td-img" >
                        <img class="img-articulo"  src="/imagenes/rtmg1.webp" alt="">
                    </td>
                    <td>RTMG1</td>
                    <td>MotoLineal 150cc casco kit de herramientas tarjeta de propiedad placa</td>
                    <td>LCS0GC200213</td>
                    <td>162FMC200213</td>
                    <td>2021-10-08545</td>
                    <td>Rojo</td>
                    <td>250KG</td>
                    <td class="td-acciones"> 
                        <div class="div-acciones">
                            <a href="" class="accion-actualizar"><i class='bx bxs-pencil'></i></a>
                            <form  method="POST" class="" action="">
                                <input type="hidden" value="" name="id">
                                <input type="hidden" value="propiedad" name="tipo">
                                <i class='bx bxs-trash-alt bx-eliminar'><input class="input-eliminar" type="submit" value="" class=""></i>
                            </form>
                        </div>
                    </td>
                    <td>En Stock</td>
                </tr>
                <tr>
                    <td class="td-img" >
                        <img class="img-articulo"  src="/imagenes/rtmg2.webp" alt="">
                    </td>
                    <td>RTMG1</td>
                    <td>MotoLineal 150cc casco kit de herramientas tarjeta de propiedad placa</td>
                    <td>LCS0GC200213</td>
                    <td>162FMC200213</td>
                    <td>2021-10-08545</td>
                    <td>Rojo</td>
                    <td>250KG</td>
                    <td class="td-acciones"> 
                        <div class="div-acciones">
                            <a href="" class="accion-actualizar"><i class='bx bxs-pencil'></i></a>
                            <form  method="POST" class="" action="">
                                <input type="hidden" value="" name="id">
                                <input type="hidden" value="propiedad" name="tipo">
                                <i class='bx bxs-trash-alt bx-eliminar'><input class="input-eliminar" type="submit" value="" class=""></i>
                            </form>
                        </div>
                    </td>
                    <td>En Stock</td>
                </tr>
                <tr>
                    <td class="td-img" >
                        <img class="img-articulo"  src="/imagenes/rtm200.webp" alt="">
                    </td>
                    <td>RTMG1</td>
                    <td>MotoLineal 150cc casco kit de herramientas tarjeta de propiedad placa</td>
                    <td>LCS0GC200213</td>
                    <td>162FMC200213</td>
                    <td>2021-10-08545</td>
                    <td>Rojo</td>
                    <td>250KG</td>
                    <td class="td-acciones"> 
                        <div class="div-acciones">
                            <a href="" class="accion-actualizar"><i class='bx bxs-pencil'></i></a>
                            <form  method="POST" class="" action="">
                                <input type="hidden" value="" name="id">
                                <input type="hidden" value="propiedad" name="tipo">
                                <i class='bx bxs-trash-alt bx-eliminar'><input class="input-eliminar" type="submit" value="" class=""></i>
                            </form>
                        </div>
                    </td>
                    <td>En Stock</td>
                </tr>
                <tr>
                    <td class="td-img" >
                        <img class="img-articulo"  src="/imagenes/rtmg1.webp" alt="">
                    </td>
                    <td>RTMG1</td>
                    <td>MotoLineal 150cc casco kit de herramientas tarjeta de propiedad placa</td>
                    <td>LCS0GC200213</td>
                    <td>162FMC200213</td>
                    <td>2021-10-08545</td>
                    <td>Rojo</td>
                    <td>250KG</td>
                    <td class="td-acciones"> 
                        <div class="div-acciones">
                            <a href="" class="accion-actualizar"><i class='bx bxs-pencil'></i></a>
                            <form  method="POST" class="" action="">
                                <input type="hidden" value="" name="id">
                                <input type="hidden" value="propiedad" name="tipo">
                                <i class='bx bxs-trash-alt bx-eliminar'><input class="input-eliminar" type="submit" value="" class=""></i>
                            </form>
                        </div>
                    </td>
                    <td>En Stock</td>
                </tr>
             
            </tbody>
        </table>
    </div>

</main>
<div class="popup-img">
    <div class="contenido-img">
        
    </div>
</div>

<div class="popup-stock" id="popup-stock">
    <div class="contenido-stock">
        <div class="stock-img">
            <img id="img-articulo" src="/imagenes/amortiguador.jpg" alt="">
        </div>
        <div class="stock-info">
            <div class="stock-articulo">
                <h4>Amortiguador</h4>
            </div>
            <div class="stock-almacen">
                <div class="stock-cant">
                    <label for="stock-cant-t">Almacén Tienda</label>
                    <input id="stock-cant-t" type="text" value="12">
                </div>
                <div class="stock-cant">
                    <label for="stock-cant-e">Almacén Ensamblaje</label>
                    <input id="stock-cant-e" type="text" value="12">
                </div>
                <div class="stock-cant">
                    <label for="stock-cant-s">Almacén Soldadura</label>
                    <input id="stock-cant-s" type="text" value="12">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="popup-newarticulo" id="popup-newarticulo">
    <div class="contenido-newarticulo">
        <div class="newarticulo-head">
            <h4>Nuevo Artículo</h4>
            <div class="btn-cerrar" id="btn-cerrar">
                <i class='bx bx-x'></i>
            </div>
        </div>
        <div class="newarticulo-info">
            <form class="formulario" method="POST" action="" >
                <div class="form-flex">
                    <label for="articulo-modelo">Modelo:</label>
                    <input type="text" id="articulo-modelo" placeholder="Ingrese modelo moto">
                </div>
                <div class="form-flex">
                    <label for="articulo-descripcion">Descripción:</label>
                    <input type="text" id="articulo-descripcion" placeholder="Ingrese descripción">
                </div>
                <div class="form-flex">
                    <label for="articulo-vim">Vim:</label>
                    <input type="number" id="articulo-vim" placeholder="Ingrese Nº Vim">
                </div>
                <div class="form-flex">
                    <label for="articulo-motor">Motor:</label>
                    <input type="number" id="articulo-motor" placeholder="Ingrese serie motor">
                </div>
                <div class="form-flex">
                    <label for="articulo-dua">Dua:</label>
                    <input type="number" id="articulo-dua" placeholder="Ingrese dua">
                </div>
                <div class="form-flex">
                    <label for="articulo-color">Color:</label>
                    <input type="text" id="articulo-color" placeholder="Ingrese color">
                </div>
                <div class="form-flex">
                    <label for="articulo-peso">Peso:</label>
                    <input type="number" id="articulo-peso" placeholder="Ingrese peso">
                </div>
                <div class="form-flex">
                    <label for="articulo-estado">Estado:</label>
                    <input type="text" id="articulo-estado" placeholder="Ingrese estado">
                </div>
                <div class="form-flex">
                    <label for="imagen">Imagen: </label>
                    <input type="file" id="imagen" accept="image/jpeg, image/png" name="propiedad[imagen]">
                </div>
                

                <div class="btns-form">
                    <input type="submit" value="Agregar" class="btn-guardar" id="btn-guardar">
                    <a href="" class="btn-cancelar" id="btn-cancelar">Cancelar</a>
                </div>

                
            </form>
        </div>
    </div>
</div>

<div class="popup-updarticulo" id="popup-updarticulo">
    <div class="contenido-updarticulo">
        <div class="updarticulo-head">
            <h4>Actualizar Moto</h4>
            <div class="btn-cerrar" id="btn-cerrar-upd">
                <i class='bx bx-x'></i>
            </div>
        </div>
        <div class="updarticulo-info">
            <form class="formulario" method="POST" action="" >
                <label for="articulo-name">Nombre:</label>
                <input type="text" id="articulo-name" placeholder="Ingrese nombre artículo">
                <label for="articulo-descripcion">Descripción:</label>
                <input type="text" id="articulo-descripcion" placeholder="Ingrese descripción">
                <label for="articulo-costo">Costo:</label>
                <input type="number" id="articulo-costo" placeholder="Ingrese precio costo">
                <label for="articulo-venta">Venta:</label>
                <input type="number" id="articulo-venta" placeholder="Ingrese precio venta">

                <label for="imagen">Imagen: </label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="propiedad[imagen]">

                <div class="btns-form">
                    <input type="submit" value="Actualizar" class="btn-guardar" id="btn-guardar">
                    <a href="" class="btn-cancelar" id="btn-cancelar-upd">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>