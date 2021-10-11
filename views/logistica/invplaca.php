<main class="main">
    <h2 class="main-titulo">Inventario Placas</h2>

    <div class="gestion-articulo">
        <div class="gestion-titulo">
            <h3>Gestionar Placas</h3>
        </div>
        <div class="gestion-caja">
            <a href="/logistica/nueva-placa" class="nuevo-articulo" >
                <p>Nueva Placa</p>
            </a>
            <div class="buscar-articulo">
                <label for="buscarid">Buscar Placa:</label>
                <input type="text" id="buscarplaca">
            </div>
            <div class="buscar-articulo">
                <label for="buscarid">Buscar Propietario:</label>
                <input type="text" id="buscarpropietario">
            </div>
        </div>
    </div>

    <div class="contenedor-tabla">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
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
            <tbody id="invplaca-body">
                <?php foreach($placas as $placa) : ?>
                <tr>
                    <td><?php echo $placa->id ?></td>
                    <td><?php echo $placa->nombre ?></td>
                    <td><?php echo $placa->propietario ?></td>
                    <td><?php echo $placa->vim ?></td>
                    <td><?php echo $placa->motor ?></td>
                    <td><?php echo $placa->titulo ?></td>
                    <td><?php echo $placa->verificacion ?></td>
                    <td class="td-acciones"> 
                        <div class="div-acciones">
                            <a href="/logistica/actualizar-placa?id=<?php echo $placa->id; ?>"  class="accion-actualizar"><i class='bx bxs-pencil'></i></a>
                            <form  method="POST" class="" action="">
                                <input type="hidden" value="" name="id">
                                <input type="hidden" value="propiedad" name="tipo">
                                <i class='bx bxs-trash-alt bx-eliminar'><input class="input-eliminar" type="submit" value="" class=""></i>
                            </form>
                        </div>
                    </td>
                    <td>En tienda</td>
                </tr>
                <?php endforeach; ?>
                
            </tbody>
        </table>
    </div>

</main>
