<main class="main">
    <h2 class="main-titulo">Inventario Mototaxis</h2>

    <div class="gestion-articulo">
        <div class="gestion-titulo">
            <h3>Gestionar Mototaxis</h3>
        </div>
        <div class="gestion-caja">
            <a href="/logistica/nuevo-articulo" class="nuevo-articulo" >
                <p>Nueva Mototaxi</p>
            </a>
        </div>
    </div>

    <div class="contenedor-tabla">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th class="th-descripcion">Descripción</th>
                </tr>
            </thead>
            <tbody id="invarticulo-body">
                <?php foreach($mototaxis as $mototaxi) : ?>
                <tr>
                    <td><?php echo $mototaxi->id; ?></td>
                    <td class="td-img" >
                        <img class="img-articulo"  src="/imagenes/<?php echo $mototaxi->imagen; ?>" alt="<?php echo $mototaxi->nombre; ?>">
                    </td>
                    <td><?php echo $mototaxi->nombre; ?></td>
                    <td class="td-descripcion"><?php echo $mototaxi->descripcion; ?></td>
                    <td class="td-stock" >
                        <div class="td-info-stock"  data-paso="<?php echo $mototaxi->id; ?>">
                            <a href="" >Ver Stock</a>
                        </div>
                    </td>
                    <td class="td-acciones"> 
                        <div class="div-acciones">
                            <a href="/logistica/actualizar-mototaxi?id=<?php echo $mototaxi->id; ?>" class="accion-actualizar"><i class='bx bxs-pencil'></i></a>
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

    <div class="gestion-articulo">
        <div class="gestion-caja paginador">
        <?php for($i = 1 ;$i<=$totalLink; $i++) : ?>
            <a href="/logistica/inventario-mototaxis?pag=<?php echo $i ?>" class="paginas"><?php echo $i ?></a>
        <?php endfor; ?>
        </div>
    </div>


</main>
<div class="popup-img">
    <div class="contenido-img">
        
    </div>
</div>

<div class="popup-stock" id="popup-stock">
    <div class="contenido-stock" id="contenido-stock">
        
    </div>
</div>

<?php 
    if($resultado){
        if($resultado == 1){
            ?>
            <script>
                mensajeAlerta('!Éxito!','Artículo agregado Correctamente','success','Ok')
            </script>
            <?php
        }
        if($resultado == 2){
            ?>
            <script>
                mensajeAlerta('!Éxito!','Artículo Actualizado Correctamente','success','Ok')
            </script>
            <?php
        }
    }
?>

