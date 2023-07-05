<?php if (isset($errors)): ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <h4 class="alert-heading">Errores</h4>
    <?=$errors?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php endif;?>
<?php if (isset($exito)): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <h4 class="alert-heading">Guardado correctamente</h4>
    <?=$exito?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php endif;?>
<?php foreach ($datos as $dato): ?>
<div class="row">
    <div class="col-md-10"></div>
    <div class="col-md-2">
        <a href="productos" class="btn btn-primary">Regresar</a>
    </div>
</div>
<form id="formulario" action="updateProducto" method="post" autocomplete="off" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?=$dato->id?>">
    <div class="row">
        <div class="col-md-12">
            <h4><i class="fas fa-barcode"></i> Codigo de Barras y SKU</h4>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <input type="text" name="codigo-barras" class="form-control codigo-barras"
                value="<?=$dato->codigo_barras?>">
        </div>
        <div class="col-md-6">
            <input type="text" name="sku" class="form-control sku" value="<?=$dato->sku?>">
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
            <label for="">Nombre <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                    title="Nombre del producto"></i></label>
            <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre"
                value="<?=$dato->nombre?>" required>
        </div>
        <div class="col-md-4">
            <label for="">Fecha de caducidad <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                    title="Fecha de caducidad"></i></label>
            <input type="date" id="fecha-caducidad" name="fecha-caducidad" id="" class="form-control"
                placeholder="Fecha de caducidad" value="<?=$dato->fecha_caducidad?>" required>
        </div>
        <div class="col-md-4">
            <label for="">Habilitado</label>
            <select name="habilitado" id="" class="form-control">
                <option value="">Seleccionar</option>
            </select>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            <label>Existencia <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                    title="Productos en Existencia"></i></label>
            <input type="number" id="existencia" name="existencia" class="form-control" placeholder="Existencia" min="1"
                value="<?=$dato->existencia?>" required>
        </div>
        <div class="col-md-4">
            <label>Existencia Minima <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                    title="Minimo de Productos"></i></label>
            <input type="number" id="existencia-minima" name="existencia-minima" class="form-control"
                placeholder="Existencia Minima" min="1" value="<?=$dato->existencia_minima?>" required>
        </div>
        <div class="col-md-4">
            <label>Presentación</label>
            <select name="presentacion" class="form-control">
                <option value="<?=$dato->presentacion?>"><?=$dato->presentacion?></option>
                <option value="Unidad">Unidad</option>
                <option value="Libra">Libra</option>
                <option value="Kilogramo">Kilogramo</option>
                <option value="Caja">Caja</option>
                <option value="Paquete">Paquete</option>
                <option value="Lata">Lata</option>
                <option value="Galon">Galon</option>
                <option value="Botella">Botella</option>
                <option value="Tira">Tira</option>
                <option value="Sobre">Sobre</option>
                <option value="Bolsa">Bolsa</option>
                <option value="Saco">Saco</option>
                <option value="Tarjeta">Tarjeta</option>
            </select>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            <label for="">Precio de compra <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                    title="Precio cuando se compró"></i></label>
            <input type="number" id="precio-compra" name="precio-compra" class="form-control"
                placeholder="Precio de Compra" min="1" value="<?=$dato->precio_compra?>" required>
        </div>
        <div class="col-md-4">
            <label for="">Precio de venta <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                    title="Precio cuando se vende"></i></label>
            <input type="number" id="precio-venta" name="precio-venta" class="form-control"
                placeholder="Precio de Venta" min="1" value="<?=$dato->precio_venta?>" required>
        </div>
        <div class="col-md-4">
            <label for="">Precio de venta por mayoreo</label>
            <input type="number" name="precio-venta-mayoreo" class="form-control"
                placeholder="Precio de Venta por Mayoreo" min="0" value="<?=$dato->precio_venta_mayoreo?>">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            <input type="number" name="descuento-venta" class="form-control" placeholder="Descuento (%) en Venta"
                min="0" value="<?=$dato->descuento_venta?>">
        </div>
        <div class="col-md-4">
            <input type="text" name="marca" class="form-control" placeholder="Marca" value="<?=$dato->marca?>">
        </div>
        <div class="col-md-4">
            <input type="text" name="modelo" class="form-control" placeholder="Modelo" value="<?=$dato->modelo?>">
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
                <option value="<?=$dato->proveedor_id?>"><?=$dato->nombre_proveedor?></option>
                <?php foreach ($proveedores as $proveedor): ?>
                <option value="<?=$proveedor['id']?>">
                    <?=$proveedor['nombre']?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="col-md-6">
            <label>Categoria</label>
            <select name="categoria" class="form-control">
                <option value="<?=$dato->categoria_id?>"><?=$dato->nombre_categoria?></option>
                <?php foreach ($categorias as $categoria): ?>
                <option value="<?=$categoria['id']?>">
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
            <input type="file" name="userfile" class="form-control">
        </div>
        <div class="col-md-8"></div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 text-center">
            <button type="submit" class="btn btn-primary agregar">Editar producto</button>
        </div>
        <div class="col-md-4"></div>
    </div>
</form>
<?php endforeach;?>