<label for="new-cliente">Cliente:</label>
<input type="text" id="new-cliente" name="pedido[cliente]" placeholder="Ingrese nombre del Cliente" value="<?php echo s($pedido->cliente); ?>">

<label for="new-fecha-ent">Fecha de Entrega:</label>
<input type="date" class="input-id input-fecha" id="new-fecha-ent" name="pedido[fecha_ent]" value="<?php echo s($pedido->fecha_ent); ?>">

<label for="techo">Techo:</label>
<select id="techo" name="pedido[techo]">
    <option value="" >-- Seleccione --</option>
    <option <?php echo 'Estándar' == $pedido->techo ? 'selected' : ''; ?> value="Estándar">Estándar</option>
    <option <?php echo 'Cola 1' == $pedido->techo ? 'selected' : ''; ?> value="Cola 1">Cola 1</option>
    <option <?php echo 'Cola 2' == $pedido->techo ? 'selected' : ''; ?> value="Cola 2">Cola 2</option>
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

<label for="adicional">Tapiz:</label>
<textarea id="adicional" name="pedido[adicional]"><?php echo s($pedido->adicional); ?></textarea>




