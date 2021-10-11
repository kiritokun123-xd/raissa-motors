<?php

echo 
'<div class="stock-img">
<img id="img-articulo" src="/imagenes/' . $articulo->imagen . '" alt="">
</div>
<div class="stock-info">
<div class="stock-articulo">
    <h4>'. $articulo->nombre .'</h4>
</div>
<div class="stock-almacen">
    <div class="stock-cant">
        <label for="stock-cant">Tienda</label>
        <input id="stock-cant" type="text" value="';
        if(isset($articuloalmacen[0])){
            echo $articuloalmacen[0]->stock;
        }else{
            echo '0';
        }
    echo '">
    </div>
    <div class="stock-cant">
        <label for="stock-cant">Ensamblaje</label>
        <input id="stock-cant" type="text" value="';
        if(isset($articuloalmacen[1])){
            echo $articuloalmacen[1]->stock;
        }else{
            echo '0';
        }
        echo '">
    </div>
    <div class="stock-cant">
        <label for="stock-cant">Soldadura</label>
        <input id="stock-cant" type="text" value="'; 
        if(isset($articuloalmacen[2])){
        echo $articuloalmacen[2]->stock;
        }else{
            echo '0';
        }
        echo   '">
    </div>
</div>
</div>'



?>