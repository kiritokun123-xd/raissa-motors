<label for="new-cliente">Cliente:</label>
<input type="text" id="new-cliente" name="pedido[cliente]" placeholder="Ingrese nombre del Cliente" value="<?php echo s($pedido->cliente); ?>">

<label for="new-distribuidor">Distribuidor:</label>
<input type="text" id="new-distribuidor" name="pedido[distribuidor]" placeholder="Ingrese distribuidor" value="<?php echo s($pedido->distribuidor); ?>">

<label for="new-vendedor">Vendedor:</label>
<input type="text" id="new-vendedor" name="pedido[vendedor]" placeholder="Ingrese nombre del vendedor" value="<?php echo s($pedido->vendedor); ?>">

<label for="new-serie">Serie:</label>
<input type="text" id="new-serie" name="pedido[serie]" placeholder="Ingrese Nº serie" value="<?php echo s($pedido->serie); ?>">

<label for="new-motor">Motor:</label>
<input type="text" id="new-motor" name="pedido[motor]" placeholder="Ingrese serie motor" value="<?php echo s($pedido->motor); ?>">

<label for="new-fecha-ent">Fecha de Entrega:</label>
<input type="date" class="input-id input-fecha" id="new-fecha-ent" name="pedido[fecha_ent]" value="<?php echo s($pedido->fecha_ent); ?>">

<label for="moto">Moto:</label>
<select id="moto" name="pedido[moto]">
    <option value="" >-- Seleccione --</option>
    <option <?php echo 'Mototaxi' == $pedido->moto ? 'selected' : ''; ?> value="Mototaxi">Mototaxi</option>
    <option <?php echo 'Motocarga' == $pedido->moto ? 'selected' : ''; ?> value="Motocarga">Motocarga</option>
    <option <?php echo 'Carguero' == $pedido->moto ? 'selected' : ''; ?> value="Carguero">Carguero</option>
</select>

<label for="tipo">Tipo:</label>
<select id="tipo" name="pedido[tipo]">
    <option value="" >-- Seleccione --</option>
    <option <?php echo 'Redonda' == $pedido->tipo ? 'selected' : ''; ?> value="Redonda">Redonda</option>
    <option <?php echo 'Redorzada' == $pedido->tipo ? 'selected' : ''; ?> value="Redorzada">Reforzada</option>
    <option <?php echo 'Corona' == $pedido->tipo ? 'selected' : ''; ?> value="Corona">Corona</option>
    <option <?php echo 'Fuerza' == $pedido->tipo ? 'selected' : ''; ?> value="Fuerza">Fuerza</option>
    <option <?php echo 'Fuerza Gallinero' == $pedido->tipo ? 'selected' : ''; ?> value="Fuerza Gallinero">Fuerza Gallinero</option>
    <option <?php echo 'Absoluto' == $pedido->tipo ? 'selected' : ''; ?> value="Absoluto">Absoluto</option>
    <option <?php echo 'Importado' == $pedido->tipo ? 'selected' : ''; ?> value="Importado">Importado</option>
    <option <?php echo 'Nacional' == $pedido->tipo ? 'selected' : ''; ?> value="Nacional">Nacional</option>
</select>

<label for="color">Color:</label>
<select id="color" name="pedido[color]">
    <option value="" >-- Seleccione --</option>
    <option <?php echo 'Azul' == $pedido->color ? 'selected' : ''; ?> value="Azul">Azul</option>
    <option <?php echo 'Negro' == $pedido->color ? 'selected' : ''; ?> value="Negro">Negro</option>
    <option <?php echo 'Rojo' == $pedido->color ? 'selected' : ''; ?> value="Rojo">Rojo</option>
    <option <?php echo 'Anaranjado' == $pedido->color ? 'selected' : ''; ?> value="Anaranjado">Anaranjado</option>
    <option <?php echo 'Verde' == $pedido->color ? 'selected' : ''; ?> value="Verde">Verde</option>
</select>

<label for="faro">Faro:</label>
<select id="faro" name="pedido[faro]">
    <option value="" >-- Seleccione --</option>
    <option <?php echo 'GL' == $pedido->faro ? 'selected' : ''; ?> value="GL">GL</option>
    <option <?php echo 'Harley' == $pedido->faro ? 'selected' : ''; ?> value="Harley">Harley</option>
</select>

<label for="tacometro">Tacometro:</label>
<select id="tacometro" name="pedido[tacometro]">
    <option value="" >-- Seleccione --</option>
    <option <?php echo 'GL' == $pedido->tacometro ? 'selected' : ''; ?> value="GL">GL</option>
    <option <?php echo 'Mostrito' == $pedido->tacometro ? 'selected' : ''; ?> value="Mostrito">Mostrito</option>
    <option <?php echo 'Harley' == $pedido->tacometro ? 'selected' : ''; ?> value="Harley">Harley</option>
</select>

<label for="aro">Aro:</label>
<select id="aro" name="pedido[aro]">
    <option value="" >-- Seleccione --</option>
    <option <?php echo 'Estrella Zapata' == $pedido->aro ? 'selected' : ''; ?> value="Estrella Zapata">Estrella Zapata</option>
    <option <?php echo 'Estrella Disco' == $pedido->aro ? 'selected' : ''; ?> value="Estrella Disco">Estrella Disco</option>
    <option <?php echo 'Deportivo Zapata' == $pedido->aro ? 'selected' : ''; ?> value="Deportivo Zapata">Deportivo Zapata</option>
    <option <?php echo 'Deportivo Disco' == $pedido->aro ? 'selected' : ''; ?> value="Deportivo Disco">Deportivo Disco</option>
    <option <?php echo 'Doble llanta' == $pedido->aro ? 'selected' : ''; ?> value="Doble llanta">Doble llanta</option>
    <option <?php echo 'Kit Nacional' == $pedido->aro ? 'selected' : ''; ?> value="Kit Nacional">Kit Nacional</option>
</select>

<label for="parrilla">Parrilla:</label>
<select id="parrilla" name="pedido[parrilla]">
    <option value="" >-- Seleccione --</option>
    <option <?php echo 'Clásica' == $pedido->parrilla ? 'selected' : ''; ?> value="Clásica">Clásica</option>
    <option <?php echo 'VZ' == $pedido->parrilla ? 'selected' : ''; ?> value="VZ">VZ</option>
    <option <?php echo 'Trenzada' == $pedido->parrilla ? 'selected' : ''; ?> value="Trenzada">Trenzada</option>
    <option <?php echo 'Cajón' == $pedido->parrilla ? 'selected' : ''; ?> value="Cajón">Cajón</option>
</select>

<label for="techo">Techo:</label>
<select id="techo" name="pedido[techo]">
    <option value="" >-- Seleccione --</option>
    <option <?php echo 'Estándar' == $pedido->techo ? 'selected' : ''; ?> value="Estándar">Estándar</option>
    <option <?php echo 'Cola 1' == $pedido->techo ? 'selected' : ''; ?> value="Cola 1">Cola 1</option>
    <option <?php echo 'Cola 2' == $pedido->techo ? 'selected' : ''; ?> value="Cola 2">Cola 2</option>
</select>

<label for="asiento">Asiento:</label>
<select id="asiento" name="pedido[asiento]">
    <option value="" >-- Seleccione --</option>
    <option <?php echo 'Anatómico' == $pedido->asiento ? 'selected' : ''; ?> value="Anatómico">Anatómico</option>
    <option <?php echo 'Deportivo' == $pedido->asiento ? 'selected' : ''; ?> value="Deportivo">Deportivo</option>
    <option <?php echo 'Liso' == $pedido->asiento ? 'selected' : ''; ?> value="Liso">Liso</option>
    <option <?php echo 'Torito' == $pedido->asiento ? 'selected' : ''; ?> value="Torito">Torito</option>
</select>

<label for="mica">Mica:</label>
<select id="mica" name="pedido[mica]">
    <option value="" >-- Seleccione --</option>
    <option <?php echo 'Transparente' == $pedido->mica ? 'selected' : ''; ?> value="Transparente">Transparente</option>
    <option <?php echo 'Polarizado' == $pedido->mica ? 'selected' : ''; ?> value="Polarizado">Polarizado</option>
</select>

<label for="mascara">Máscara:</label>
<select id="mascara" name="pedido[mascara]">
    <option value="" >-- Seleccione --</option>
    <option <?php echo 'Aero' == $pedido->mascara ? 'selected' : ''; ?> value="Aero">Aero</option>
    <option <?php echo 'Doble Mica' == $pedido->mascara ? 'selected' : ''; ?> value="Doble Mica">Doble Mica</option>
</select>

<label for="equipamiento">Equipamiento:</label>
<textarea id="equipamiento" name="pedido[equipamiento]"><?php echo s($pedido->equipamiento); ?></textarea>

<label for="adicional">Tapiz:</label>
<textarea id="adicional" name="pedido[adicional]"><?php echo s($pedido->adicional); ?></textarea>



