<main class="main">
    <h2 class="main-titulo">Pedidos</h2>

    <div class="gestion-articulo">
        <div class="gestion-titulo">
            <h3>Gestionar Pedidos</h3>
        </div>
        <div class="gestion-caja">
            <a href="/logistica/nuevo-pedido" class="nuevo-articulo" >
                <p>Nuevo Pedido</p>
            </a>
            <div class="buscar-articulo">
                <label for="buscarcl">Buscar por Cliente:</label>
                <input class="input-id" type="text" id="buscarcl">
            </div>
            <div class="buscar-articulo">
                <label for="buscarfec">Buscar Fecha:</label>
                <input type="text" id="buscarfec">
            </div>
        </div>
    </div>

    <div class="contenedor-tabla">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Fecha Ini</th>
                    <th>Cliente</th>
                    <th>Motor</th>
                    <th>Moto</th>
                    <th>Tipo</th>
                    <th>Color</th>
                    <th>Fecha entrega</th>
                    <th>Acciones</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody id="invpedido-body">
                <?php foreach($pedidos as $pedido) : ?>
                <tr>
                    <td><?php echo $pedido->id ?></td>
                    <td><?php echo date_format(date_create($pedido->fecha_ini),'d-m-Y')?></td>
                    <td><?php echo $pedido->cliente ?></td>
                    <td><?php echo $pedido->motor ?></td>
                    <td><?php echo $pedido->moto ?></td>
                    <td><?php echo $pedido->tipo ?></td>
                    <td><?php echo $pedido->color ?></td>
                    <td><?php echo date_format(date_create($pedido->fecha_ent),'d-m-Y') ?></td>
                    <td class="td-acciones"> 
                        <div class="div-acciones">
                            <a href="/logistica/actualizar-pedido?id=<?php echo $pedido->id; ?>" class="accion-actualizar"><i class='bx bxs-pencil'></i></a>
                            <a target="_blank" href="/documentos/pdf?id=<?php echo $pedido->id;?>">Ver</a>
                        </div>
                    </td>
                    <td><?php echo $pedido->estado ?></td>
                </tr>
                <?php endforeach; ?>
             
            </tbody>
        </table>
    </div>

    <div class="gestion-articulo">
        <div class="gestion-caja paginador">
        <?php for($i = 1 ;$i<=$totalLink; $i++) : ?>
            <a href="/logistica/inventario-motos?pag=<?php echo $i ?>" class="paginas"><?php echo $i ?></a>
        <?php endfor; ?>
        </div>
    </div>

</main>
<div class="popup-img">
    <div class="contenido-img">
        
    </div>
</div>
<?php 
    if($resultado){
        if($resultado == 1){
            ?>
            <script>
                mensajeAlerta('!Éxito!','Pedido agregado Correctamente','success','Ok')
            </script>
            <?php
        }
        if($resultado == 2){
            ?>
            <script>
                mensajeAlerta('!Éxito!','Pedido Actualizado Correctamente','success','Ok')
            </script>
            <?php
        }
    }
?>

