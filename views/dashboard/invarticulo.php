<main class="main">
    <h2 class="main-titulo">Inventario Artículos</h2>

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
                    <th>Artículo</th>
                    <th class="th-descripcion">Descripción</th>
                    <th>Costo</th>
                    <th>Venta</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="td-img" >
                        <img class="img-articulo"  src="/imagenes/cable-freno.jpg" alt="">
                    </td>
                    <td>Cable de freno</td>
                    <td class="td-descripcion">Motion Pro 02-0091 Frente Freno Cable Para Honda AC200M ATC200S ATC200ES ATC185S</td>
                    <td>S/8.00</td>
                    <td>S/10.00</td>
                    <td class="td-stock">
                        <div class="td-info-stock">
                            <a href="" >Ver Stock</a>
                        </div>
                    </td>
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
                </tr>
                <tr>
                    <td class="td-img" >
                        <img class="img-articulo"  src="/imagenes/amortiguador.jpg" alt="">
                    </td>
                    <td>Amortiguador MonoShock</td>
                    <td class="td-descripcion">Suspensión amortiguador de choque 10.236 in 10.25 "Mono Shock reemplazo para SDG SSR Pitster Lifan  200cc 250cc</td>
                    <td>S/8.00</td>
                    <td>S/10.00</td>
                    <td class="td-stock">
                        <div class="td-info-stock">
                            <a href="">Ver Stock</a>
                        </div>
                    </td>
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
                </tr>
                <tr>
                    <td class="td-img" >
                        <img class="img-articulo"  src="/imagenes/cable-freno.jpg" alt="">
                    </td>
                    <td>Cable de freno</td>
                    <td class="td-descripcion">Motion Pro 02-0091 Frente Freno Cable Para Honda AC200M ATC200S ATC200ES ATC185S</td>
                    <td>S/8.00</td>
                    <td>S/10.00</td>
                    <td class="td-stock">
                        <div class="td-info-stock">
                            <a href="">Ver Stock</a>
                        </div>
                    </td>
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
                </tr>
                <tr>
                    <td class="td-img" >
                        <img class="img-articulo"  src="/imagenes/cable-freno.jpg" alt="">
                    </td>
                    <td>Cable de freno</td>
                    <td class="td-descripcion">Motion Pro 02-0091 Frente Freno Cable Para Honda AC200M ATC200S ATC200ES ATC185S</td>
                    <td>S/8.00</td>
                    <td>S/10.00</td>
                    <td class="td-stock">
                        <div class="td-info-stock">
                            <a href="">Ver Stock</a>
                        </div>
                    </td>
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
                    <label for="stock-cant">Almacén Tienda</label>
                    <input id="stock-cant" type="text" value="12">
                </div>
                <div class="stock-cant">
                    <label for="stock-cant">Almacén Ensamblaje</label>
                    <input id="stock-cant" type="text" value="12">
                </div>
                <div class="stock-cant">
                    <label for="stock-cant">Almacén Soldadura</label>
                    <input id="stock-cant" type="text" value="12">
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
            <h4>Actualizar Artículo</h4>
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