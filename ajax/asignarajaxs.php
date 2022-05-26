<?php
echo 


'<div class="asignar serie" id="contenedor-asigS">
    <label for="new-serie">Serie:</label>
    <input type="text" id="new-serie" name="pedido[serie]" disabled value="<'.s($pedido->serie) .'">
    <a id="btn-asignar-s" class="btn btn-serie">Asignar</a>
</div>'


?>

<script>
verStock('.td-info-stock','popup-stock')
//ampliarArticulo('.img-articulo','.contenido-img','.popup-img')
</script>