<main class="main">
    <h2 class="main-titulo">Inventario Artículos</h2>

    <div class="gestion-articulo">
        <div class="gestion-titulo">
            <h3>Gestionar Artículos</h3>
        </div>
        <div class="gestion-caja">
            <a href="/logistica/nuevo-articulo" class="nuevo-articulo" >
                <p>Nuevo Artículo</p>
            </a>
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
                    <th>Id</th>
                    <th>Artículo</th>
                    <th class="th-descripcion">Descripción</th>
                    <th>Costo</th>
                    <th>Venta</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($articulos as $articulo) : ?>
                <tr>
                    <td class="td-img" >
                        <img class="img-articulo"  src="/imagenes/<?php echo $articulo->imagen; ?>" alt="">
                    </td>
                    <td><?php echo $articulo->id; ?></td>
                    <td><?php echo $articulo->nombre; ?></td>
                    <td class="td-descripcion"><?php echo $articulo->descripcion; ?></td>
                    <td>S/ <?php echo $articulo->costo; ?></td>
                    <td>S/ <?php echo $articulo->venta; ?></td>
                    <td class="td-stock">
                        <div class="td-info-stock">
                            <a href="" >Ver Stock</a>
                        </div>
                    </td>
                    <td class="td-acciones"> 
                        <div class="div-acciones">
                            <a href="/logistica/actualizar-articulo" class="accion-actualizar"><i class='bx bxs-pencil'></i></a>
                            <form  method="POST" class="" action="">
                                <input type="hidden" value="" name="id">
                                <input type="hidden" value="propiedad" name="tipo">
                                <i class='bx bxs-trash-alt bx-eliminar'><input class="input-eliminar" type="submit" value="" class=""></i>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
              
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
                <label for="upd-articulo-id">Id:</label>
                <input type="number" id="upd-articulo-id" disabled value="1">
                <label for="upd-articulo-name">Nombre:</label>
                <input type="text" id="upd-articulo-name" placeholder="Ingrese nombre artículo">
                <label for="upd-articulo-descripcion">Descripción:</label>
                <input type="text" id="upd-articulo-descripcion" placeholder="Ingrese descripción">
                <label for="upd-articulo-costo">Costo:</label>
                <input type="number" id="upd-articulo-costo" placeholder="Ingrese precio costo">
                <label for="upd-articulo-venta">Venta:</label>
                <input type="number" id="upd-articulo-venta" placeholder="Ingrese precio venta">

                <label for="upd-imagen">Imagen: </label>
                <input type="file" id="upd-imagen" accept="image/jpeg, image/png" name="propiedad[imagen]">

                <div class="btns-form">
                    <input type="submit" value="Actualizar" class="btn-guardar" id="btn-guardar">
                    <a href="" class="btn-cancelar" id="btn-cancelar-upd">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>