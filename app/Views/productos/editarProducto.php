<?=$this->extend('dashboard')?>
<?=$this->section('titulo')?>
Editar producto
<?=$this->endSection()?>
<?=$this->section('contenido')?>
<?php if (session()->getFlashdata('errors')): ?>
<?=$this->include('errors')?>
<?php endif;?>
<?php if (session()->getFlashdata('exito')): ?>
<?=$this->include('exito')?>
<?php endif;?>
<?php foreach ($datos as $dato): ?>
<div class="row">
    <div class="col-md-10"></div>
    <div class="col-md-2">
        <?=anchor(base_url('productos'), 'Regresar', ['class' => 'btn btn-primary'])?>
    </div>
</div>
<?=form_open_multipart('updateProducto', ['autocomplete' => 'off', 'id' => 'formulario'])?>
<?=form_hidden('id', $dato->id)?>
<div class="row">
    <div class="col-md-12">
        <h4><i class="fas fa-barcode"></i> Codigo de Barras y SKU</h4>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-6">
        <?=form_label('Codigo de barras', 'codigo-barras')?>
        <?=form_input(['type' => 'text', 'name' => 'codigo-barras', 'id' => 'codigo-barras', 'class' => 'form-control codigo-barras', 'placeholder' => 'Codigo de barras', 'value' => set_value('codigo-barras', $dato->codigo_barras)])?>
    </div>
    <div class="col-md-6">
        <?=form_label('Sku', 'sku')?>
        <?=form_input(['type' => 'text', 'name' => 'sku', 'id' => 'sku', 'class' => 'form-control sku', 'placeholder' => 'Sku', 'value' => old('sku', $dato->sku)])?>
    </div>
</div>
<br>
<hr>
<br>
<div class="row">
    <div class="col-md-12">
        <h4><i class="fas fa-box"></i> Información del Producto</h4>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-4">
        <label for="nombre">Nombre <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                title="Nombre del producto"></i></label>
        <?=form_input(['type' => 'text', 'name' => 'nombre', 'id' => 'nombre', 'class' => 'form-control', 'placeholder' => 'Nombre', 'value' => set_value('nombre', $dato->nombre), 'required' => true])?>
    </div>
    <div class="col-md-4">
        <label for="tiene-fecha">¿tiene fecha de caducidad? <i class="fas fa-info-circle" data-toggle="tooltip"
                data-placement="top" title="¿tiene fecha de caducidad?"></i></label>
        <select name="tiene-caducidad" id="tiene-caducidad" class="form-control">
            <option class="opt" value="<?=$dato->tiene_caducidad?>"
                <?=set_select('tiene-caducidad', $dato->tiene_caducidad)?>>
                <?php if ($dato->tiene_caducidad === 1): ?>
                <?='Si tiene'?>
                <?php else: ?>
                <?='No tiene'?>
                <?php endif;?>
            </option>
            <option value="1" <?=set_select('tiene-caducidad', '1')?>>Si tiene</option>
            <option value="0" <?=set_select('tiene-caducidad', '0')?>>No tiene</option>
        </select>

    </div>
    <div class="col-md-4">
        <?=form_label('Fecha de caducidad', 'fecha-caducidad')?>
        <?=form_input(['type' => 'date', 'id' => 'fecha-caducidad', 'name' => 'fecha-caducidad', 'class' => 'form-control', 'placeholder' => 'Fecha de caducidad', 'value' => $dato->fecha_caducidad, 'disabled' => session()->getFlashdata('errors') ? false : true])?>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-4">
        <label for="existencia">Existencia <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                title="Productos en Existencia"></i></label>
        <?=form_input(['type' => 'number', 'id' => 'existencia', 'name' => 'existencia', 'class' => 'form-control', 'placeholder' => 'Existencia', 'min' => 1, 'value' => set_value('existencia', $dato->existencia), 'required' => true])?>
    </div>
    <div class="col-md-4">
        <label for="existencia-minima">Existencia Minima <i class="fas fa-info-circle" data-toggle="tooltip"
                data-placement="top" title="Minimo de Productos"></i></label>
        <?=form_input(['type' => 'number', 'id' => 'existencia-minima', 'name' => 'existencia-minima', 'class' => 'form-control', 'placeholder' => 'Existencia minima', 'min' => 1, 'value' => set_value('existencia-minima', $dato->existencia_minima), 'required' => true])?>
    </div>
    <div class="col-md-4">
        <label>Presentación</label>
        <select name="presentacion" class="form-control">
            <option class="opt" value="<?=$dato->presentacion?>" <?=set_value('presentacion', $dato->presentacion)?>>
                <?=$dato->presentacion?>
            </option>
            <?php foreach ($presentaciones as $presentacion): ?>
            <option value="<?=$presentacion['nombre']?>" <?=set_value('presentacion', $presentacion['nombre'])?>>
                <?=$presentacion['nombre']?>
            </option>
            <?php endforeach;?>
        </select>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-4">
        <label for="precio-compra">Precio de compra <i class="fas fa-info-circle" data-toggle="tooltip"
                data-placement="top" title="Precio cuando se compró"></i></label>
        <?=form_input(['type' => 'number', 'id' => 'precio-compra', 'name' => 'precio-compra', 'class' => 'form-control', 'placeholder' => 'Precio de compra', 'min' => 1, 'value' => set_value('precio-compra', $dato->precio_compra), 'required' => true])?>
    </div>
    <div class="col-md-4">
        <label for="precio-venta">Precio de venta <i class="fas fa-info-circle" data-toggle="tooltip"
                data-placement="top" title="Precio cuando se vende"></i></label>
        <?=form_input(['type' => 'number', 'id' => 'precio-venta', 'name' => 'precio-venta', 'class' => 'form-control', 'placeholder' => 'Precio de venta', 'min' => 1, 'value' => set_value('precio-venta', $dato->precio_venta), 'required' => true])?>
    </div>
    <div class="col-md-4">
        <?=form_label('Precio de venta por mayoreo', 'precio-venta-mayoreo')?>
        <?=form_input(['type' => 'number', 'id' => 'precio-venta-mayoreo', 'name' => 'precio-venta-mayoreo', 'class' => 'form-control', 'placeholder' => 'Precio de venta por mayoreo', 'min' => 0, 'value' => set_value('precio-venta-mayoreo', $dato->precio_venta_mayoreo)])?>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-4">
        <?=form_label('Descuento (%) en venta', 'descuento')?>
        <?=form_input(['type' => 'number', 'id' => 'descuento', 'name' => 'descuento-venta', 'class' => 'form-control', 'placeholder' => 'Descuento (%) en Venta', 'min' => 0, 'value' => set_value('descuento-venta', $dato->descuento_venta)])?>
    </div>
    <div class="col-md-4">
        <?=form_label('Marca', 'marca')?>
        <?=form_input(['type' => 'text', 'name' => 'marca', 'id' => 'marca', 'class' => 'form-control', 'placeholder' => 'Marca', 'value' => set_value('marca', $dato->marca)])?>
    </div>
    <div class="col-md-4">
        <?=form_label('Modelo', 'modelo')?>
        <?=form_input(['type' => 'text', 'name' => 'modelo', 'id' => 'modelo', 'class' => 'form-control', 'placeholder' => 'Modelo', 'value' => set_value('modelo', $dato->modelo)])?>
    </div>
</div>
<br>
<hr>
<br>
<div class="row">
    <div class="col-md-12">
        <h4><i class="fas fa-truck"></i> Proveedores y Categoria</h4>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-6">
        <label>Proveedor</label>
        <select name="proveedor" class="form-control">
            <option class="opt" value="<?=$dato->proveedor_id?>" <?=set_value('proveedor', $dato->proveedor_id)?>>
                <?=$dato->nombre_proveedor?>
            </option>
            <?php foreach ($proveedores as $proveedor): ?>
            <option value="<?=$proveedor['id']?>" <?=set_value('proveedor', $proveedor['id'])?>>
                <?=$proveedor['nombre']?>
            </option>
            <?php endforeach;?>
        </select>
    </div>
    <div class="col-md-6">
        <label>Categoria</label>
        <select name="categoria" class="form-control">
            <option class="opt" value="<?=$dato->categoria_id?>" <?=set_value('categoria', $dato->categoria_id)?>>
                <?=$dato->nombre_categoria?>
            </option>
            <?php foreach ($categorias as $categoria): ?>
            <option value="<?=$categoria['id']?>" <?=set_value('categoria', $categoria['id'])?>>
                <?=$categoria['nombre']?></option>
            <?php endforeach;?>
        </select>
    </div>
</div>
<br>
<hr>
<br>
<div class="row">
    <div class="col-md-12">
        <h4><i class="fas fa-images"></i> Fotografia o Imagen del Producto</h4>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-4">
        <?=form_input(['type' => 'file', 'name' => 'userfile', 'class' => 'form-control', 'accept' => 'image/.jpg,.png,.jpeg'])?>
    </div>
    <div class="col-md-8"></div>
</div>
<br>
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4 text-center">
        <?=form_submit('', 'Editar producto', ['class' => 'btn btn-primary agregar'])?>
    </div>
    <div class="col-md-4"></div>
</div>
<?=form_close()?>
<?php endforeach;?>
<?=script_tag('js/ocultarClases.js')?>
<?=script_tag('js/agregarProducto.js')?>
<?=$this->endSection()?>