<main class="main">
    <h2 class="main-titulo">Inventario Motos - Nueva Moto</h2>

    <div class="popup-newarticulo" id="popup-newarticulo">
        <div class="contenido-newarticulo">
            <div class="newarticulo-head">
                <h4>Nueva Moto</h4>
                <a href="/logistica/inventario-motos" class="btn-cerrar" id="btn-cerrar">
                    <i class='bx bx-arrow-back'></i>
                </a>
            </div>
            <div class="newarticulo-info">
                <form class="formulario" method="POST" action="" >
                    <label for="new-articulo-modelo">Modelo:</label>
                    <input type="text" id="new-articulo-modelo" placeholder="Ingrese modelo moto">
                    <label for="new-articulo-vim">Vim:</label>
                    <input type="number" id="new-articulo-vim" placeholder="Ingrese Nº Vim">
                    <label for="new-articulo-motor">Motor:</label>
                    <input type="number" id="new-articulo-motor" placeholder="Ingrese serie motor">
                    <label for="articulo-dua">Dua:</label>
                    <input type="number" id="articulo-dua" placeholder="Ingrese dua">
                    <label for="new-articulo-color">Color:</label>
                    <input type="text" id="new-articulo-color" placeholder="Ingrese color">
                    <label for="articulo-peso">Peso:</label>
                    <input type="number" id="articulo-peso" placeholder="Ingrese peso">
                    <label for="new-articulo-estado">Estado:</label>
                    <input type="text" id="new-articulo-estado" placeholder="Ingrese estado">
                    <label for="new-imagen">Imagen: </label>
                    <input type="file" id="new-imagen" accept="image/jpeg, image/png" name="propiedad[imagen]">
                    

                    <div class="btns-form">
                        <input type="submit" value="Agregar" class="btn-guardar" id="btn-guardar">
                        <a href="/logistica/inventario-motos" class="btn-cancelar" id="btn-cancelar">Atras</a>
                    </div>

                    
                </form>
            </div>
        </div>
    </div>
</main>