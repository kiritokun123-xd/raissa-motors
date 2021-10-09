<main class="main">
    <h2 class="main-titulo">Inventario Artículos - Actualizar Artículo</h2>

    <div class="popup-newarticulo" id="popup-newarticulo">
        <div class="contenido-newarticulo">
            <div class="newarticulo-head">
                <h4>Actualizar Artículo</h4>
                <a href="/logistica/inventario-articulos" class="btn-cerrar" id="btn-cerrar">
                    <i class='bx bx-arrow-back'></i>
                </a>
            </div>
            <div class="newarticulo-info">
                <form class="formulario" method="POST" action="" >
                    <label for="new-articulo-name">Nombre:</label>
                    <input type="text" id="new-articulo-name" placeholder="Ingrese nombre artículo">
                    <label for="new-articulo-descripcion">Descripción:</label>
                    <input type="text" id="new-articulo-descripcion" placeholder="Ingrese descripción">
                    <label for="new-articulo-costo">Costo:</label>
                    <input type="number" id="new-articulo-costo" placeholder="Ingrese precio costo">
                    <label for="new-articulo-venta">Venta:</label>
                    <input type="number" id="new-articulo-venta" placeholder="Ingrese precio venta">

                    <label for="new-imagen">Imagen: </label>
                    <input type="file" id="new-imagen" accept="image/jpeg, image/png" name="propiedad[imagen]">

                    <div class="btns-form">
                        <input type="submit" value="Agregar" class="btn-guardar" id="btn-guardar">
                        <a href="/logistica/inventario-articulos" class="btn-cancelar" id="btn-cancelar">Atras</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- <div class="contenedor-tabla">
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
                            <a href="" class="accion-actualizar"><i class='bx bxs-pencil'></i></a>
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
    </div> -->

</main>