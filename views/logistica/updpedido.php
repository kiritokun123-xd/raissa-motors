<main class="main">
    <h2 class="main-titulo">Pedidos - Actualizar Pedido</h2>
    <?php
        foreach($errores as $error){ ?>
            <div class="alerta error">
            <?php echo $error ?>
            </div>
            <?php
        }
    ?>
    <div class="popup-newarticulo" id="popup-newarticulo">
        <div class="contenido-newarticulo">
            <div class="newarticulo-head">
                <h4>Actualizar Pedido</h4>
                <a href="/logistica/pedido" class="btn-cerrar" id="btn-cerrar">
                    <i class='bx bx-arrow-back'></i>
                </a>
            </div>
            <div class="newarticulo-info">
                <form class="formulario" method="POST" enctype="multipart/form-data">
                    <?php include __DIR__ . '/formulario_pedidos.php'; ?>
                    

                    <div class="btns-form">
                        <input type="submit" value="Actualizar" class="btn-guardar" id="btn-guardar">
                        <a href="/logistica/pedido" class="btn-cancelar" id="btn-cancelar">Atras</a>
                    </div>

                    
                </form>
            </div>
        </div>
    </div>
</main>

<div class="popup-asignar">
    <div class="contenido-asignar">
        <div class="titulo">
            <h3>Series Disponibles</h3>
            <p id="cerrar-asignar">x</p>
        </div>
        <div class="contenedor-tabla">
        <table class="table">
            <!-- <thead>
                <tr>
                    <th>N°</th>
                    <th>Serie</th>
                    <th>Tipo</th>                    
                </tr>
            </thead> -->
            <tbody id="invserie-body">
                <?php foreach($series as $serie) : ?>
                <tr>
                    <td><?php echo $serie->id ?></td>
                    <td><?php echo $serie->numserie ?></td>
                    <td><?php echo $serie->tipo ?></td>
                    <td><a class="asignar-ajax-s" data-paso=<?php echo $serie->id ?> >Asignar</a></td>
                    
                </tr>
                <?php endforeach; ?>
             
            </tbody>
        </table>
    </div>
    </div>
</div>