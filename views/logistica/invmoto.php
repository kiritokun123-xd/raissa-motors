<main class="main">
    <h2 class="main-titulo">Inventario Motos</h2>

    <div class="gestion-articulo">
        <div class="gestion-titulo">
            <h3>Gestionar Artículos</h3>
        </div>
        <div class="gestion-caja">
            <a href="/logistica/nueva-moto" class="nuevo-articulo" >
                <p>Nueva Moto</p>
            </a>
            <div class="buscar-articulo">
                <label for="buscarid">Buscar Moto:</label>
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
                    <th>Modelo</th>
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
                <?php foreach($motos as $moto) : ?>
                <tr>
                    <td class="td-img" >
                        <img class="img-articulo"  src="/imagenes/<?php echo $moto->imagen; ?>" alt="">
                    </td>
                    <td><?php echo $moto->id ?></td>
                    <td><?php echo $moto->nombre ?></td>
                    <td><?php echo $moto->vim ?></td>
                    <td><?php echo $moto->motor ?></td>
                    <td><?php echo $moto->dua ?></td>
                    <td><?php echo $moto->color ?></td>
                    <td><?php echo $moto->peso ?>KG</td>
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
                    <td><?php echo $moto->estado ?></td>
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
                <div class="form-flex">
                    <label for="upd-articulo-id">Id:</label>
                    <input type="text" id="upd-articulo-id" disabled value="1">
                </div>
                <div class="form-flex">
                    <label for="upd-articulo-modelo">Modelo:</label>
                    <input type="text" id="upd-articulo-modelo" placeholder="Ingrese modelo moto">
                </div>
                <div class="form-flex">
                    <label for="upd-articulo-vim">Vim:</label>
                    <input type="number" id="upd-articulo-vim" placeholder="Ingrese Nº Vim">
                </div>
                <div class="form-flex">
                    <label for="articulo-motor-upd">Motor:</label>
                    <input type="number" id="articulo-motor-upd" placeholder="Ingrese serie motor">
                </div>
                <div class="form-flex">
                    <label for="upd-articulo-dua">Dua:</label>
                    <input type="number" id="upd-articulo-dua" placeholder="Ingrese dua">
                </div>
                <div class="form-flex">
                    <label for="upd-articulo-color">Color:</label>
                    <input type="text" id="upd-articulo-color" placeholder="Ingrese color">
                </div>
                <div class="form-flex">
                    <label for="upd-articulo-peso">Peso:</label>
                    <input type="number" id="upd-articulo-peso"-upd placeholder="Ingrese peso">
                </div>
                <div class="form-flex">
                    <label for="upd-articulo-estado">Estado:</label>
                    <input type="text" id="upd-articulo-estado" placeholder="Ingrese estado">
                </div>
                <div class="form-flex">
                    <label for="upd-imagen">Imagen: </label>
                    <input type="file" id="upd-imagen" accept="image/jpeg, image/png" name="propiedad[imagen]">
                </div>

                <div class="btns-form">
                    <input type="submit" value="Actualizar" class="btn-guardar" id="btn-guardar">
                    <a href="" class="btn-cancelar" id="btn-cancelar-upd">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>