<main class="main">
    <h2 class="main-titulo">Inventario Placas - Nueva Placa</h2>

    <div class="popup-newarticulo" id="popup-newarticulo">
        <div class="contenido-newarticulo">
            <div class="newarticulo-head">
                <h4>Nueva Placa</h4>
                <a href="/logistica/inventario-placas" class="btn-cerrar" id="btn-cerrar">
                    <i class='bx bx-arrow-back'></i>
                </a>
            </div>
            <div class="newarticulo-info">
                <form class="formulario" method="POST" action="" >
                    <label for="new-articulo-modelo">Nº Placa:</label>
                    <input type="text" id="new-articulo-modelo" placeholder="Ingrese Nº Placa">
                    <label for="new-articulo-descripcion">Propietario:</label>
                    <input type="text" id="new-articulo-descripcion" placeholder="Ingrese Propietario">
                    <label for="new-articulo-vim">Vim:</label>
                    <input type="number" id="new-articulo-vim" placeholder="Ingrese Nº Vim">
                    <label for="new-articulo-motor">Motor:</label>
                    <input type="number" id="new-articulo-motor" placeholder="Ingrese serie motor">
                    <label for="new-articulo-dua">Título:</label>
                    <input type="number" id="new-articulo-dua" placeholder="Ingrese Nº Título">
                    <label for="new-articulo-color">Verificación:</label>
                    <input type="number" id="new-articulo-color" placeholder="Ingrese Nº Verificación">
                    <label for="new-articulo-peso">Estado:</label>
                    <input type="text" id="new-articulo-peso" placeholder="Ingrese Estado">
                    

                    <div class="btns-form">
                        <input type="submit" value="Agregar" class="btn-guardar" id="btn-guardar">
                        <a href="/logistica/inventario-placas" class="btn-cancelar" id="btn-cancelar">Cancelar</a>
                    </div>

                    
                </form>
            </div>
        </div>
    </div>
</main>