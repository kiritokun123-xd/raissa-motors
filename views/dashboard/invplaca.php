<main class="main">
    <h2 class="main-titulo">Inventario Placas</h2>

    <div class="gestion-articulo">
        <div class="gestion-titulo">
            <h3>Gestionar Placas</h3>
        </div>
        <div class="gestion-caja">
            <div class="nuevo-articulo" id="nuevo-articulo">
                <a href="">Nueva PLaca</a>
            </div>
            <div class="buscar-articulo">
                <label for="buscarid">Buscar Placa:</label>
                <input type="text" id="buscarid">
            </div>
        </div>
    </div>

    <div class="contenedor-tabla">
        <table class="table">
            <thead>
                <tr>
                    <th>Nº Placa</th>
                    <th>Propietario</th>
                    <th>Vim</th>
                    <th>Motor</th>
                    <th>Nº Titulo</th>
                    <th>Verficación</th>
                    <th>Acciones</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1502-QB</td>
                    <td>LOPEZ SAAVEDRA DAVID ANGEL</td>
                    <td>LCS0GC200213</td>
                    <td>162FMC200213</td>
                    <td>518480</td>
                    <td>062822</td>
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
                    <td>En tienda</td>
                </tr>
                <tr>
                    <td>1502-QB</td>
                    <td>LOPEZ SAAVEDRA DAVID ANGEL</td>
                    <td>LCS0GC200213</td>
                    <td>162FMC200213</td>
                    <td>518480</td>
                    <td>062822</td>
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
                    <td>En tienda</td>
                </tr>
                <tr>
                    <td>1502-QB</td>
                    <td>LOPEZ SAAVEDRA DAVID ANGEL</td>
                    <td>LCS0GC200213</td>
                    <td>162FMC200213</td>
                    <td>518480</td>
                    <td>062822</td>
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
                    <td>En tienda</td>
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
            <h4>Nueva Placa</h4>
            <div class="btn-cerrar" id="btn-cerrar">
                <i class='bx bx-x'></i>
            </div>
        </div>
        <div class="newarticulo-info">
            <form class="formulario" method="POST" action="" >
                <div class="form-flex">
                    <label for="articulo-modelo">Nº Placa:</label>
                    <input type="text" id="articulo-modelo" placeholder="Ingrese Nº Placa">
                </div>
                <div class="form-flex">
                    <label for="articulo-descripcion">Propietario:</label>
                    <input type="text" id="articulo-descripcion" placeholder="Ingrese Propietario">
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
                    <label for="articulo-dua">Título:</label>
                    <input type="number" id="articulo-dua" placeholder="Ingrese Nº Título">
                </div>
                <div class="form-flex">
                    <label for="articulo-color">Verificación:</label>
                    <input type="number" id="articulo-color" placeholder="Ingrese Nº Verificación">
                </div>
                <div class="form-flex">
                    <label for="articulo-peso">Estado:</label>
                    <input type="text" id="articulo-peso" placeholder="Ingrese Estado">
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
            <h4>Actualizar Placa</h4>
            <div class="btn-cerrar" id="btn-cerrar-upd">
                <i class='bx bx-x'></i>
            </div>
        </div>
        <div class="updarticulo-info">
            <form class="formulario" method="POST" action="" >
                <div class="form-flex">
                    <label for="articulo-modelo">Nº Placa:</label>
                    <input type="text" id="articulo-modelo" placeholder="Ingrese Nº Placa">
                </div>
                <div class="form-flex">
                    <label for="articulo-descripcion">Propietario:</label>
                    <input type="text" id="articulo-descripcion" placeholder="Ingrese Propietario">
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
                    <label for="articulo-dua">Título:</label>
                    <input type="number" id="articulo-dua" placeholder="Ingrese Nº Título">
                </div>
                <div class="form-flex">
                    <label for="articulo-color">Verificación:</label>
                    <input type="number" id="articulo-color" placeholder="Ingrese Nº Verificación">
                </div>
                <div class="form-flex">
                    <label for="articulo-peso">Estado:</label>
                    <input type="text" id="articulo-peso" placeholder="Ingrese Estado">
                </div>

                <div class="btns-form">
                    <input type="submit" value="Actualizar" class="btn-guardar" id="btn-guardar">
                    <a href="" class="btn-cancelar" id="btn-cancelar-upd">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>