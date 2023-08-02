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
<form id="formulario" action="" method="post" autocomplete="off" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-12">
            <h4><i class="fas fa-barcode"></i> Codigo de Barras y SKU</h4>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <input type="text" name="codigo-barras" class="form-control codigo-barras" placeholder="Codigo de barras"
                value="<?=set_value('codigo-barras')?>">
        </div>
        <div class="col-md-6">
            <input type="text" name="sku" class="form-control sku" placeholder="Sku" value="<?=set_value('sku')?>">
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
                value="<?=set_value('nombre')?>" required>
        </div>
        <div class="col-md-4">
            <label for="">Fecha de caducidad <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                    title="Fecha de caducidad"></i></label>
            <input type="date" id="fecha-caducidad" name="fecha-caducidad" id="" class="form-control"
                placeholder="Fecha de caducidad" value="<?=set_value('fecha-caducidad')?>" required>
        </div>
        <div class="col-md-4">
            <label for="">Habilitado</label>
            <select name="habilitado" id="" class="form-control">
                <option value="">Seleccionar</option>
                <option value="1" <?=set_select('habilitado', '1')?>>Habilitado</option>
                <option value="0" <?=set_select('habilitado', '0')?>>Deshabilitado</option>
            </select>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            <label>Existencia <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                    title="Productos en Existencia"></i></label>
            <input type="number" id="existencia" name="existencia" class="form-control" placeholder="Existencia" min="1"
                value="<?=set_value('existencia')?>" required>
        </div>
        <div class="col-md-4">
            <label>Existencia Minima <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                    title="Minimo de Productos"></i></label>
            <input type="number" id="existencia-minima" name="existencia-minima" class="form-control"
                placeholder="Existencia Minima" min="1" value="<?=set_value('existencia-minima')?>" required>
        </div>
        <div class="col-md-4">
            <label>Presentación</label>
            <select name="presentacion" class="form-control">
                <option value="">Seleccionar</option>
                <?php foreach ($presentaciones as $presentacion): ?>
                <option value="<?= $presentacion['nombre'] ?>" <?=set_select('presentacion', $presentacion['nombre'])?>>
                    <?=$presentacion['nombre']?></option>
                <?php endforeach;?>
            </select>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            <label for="">Precio de compra <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                    title="Precio cuando se compró"></i></label>
            <input type="number" id="precio-compra" name="precio-compra" class="form-control"
                placeholder="Precio de Compra" min="1" value="<?=set_value('precio-compra')?>" required>
        </div>
        <div class="col-md-4">
            <label for="">Precio de venta <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                    title="Precio cuando se vende"></i></label>
            <input type="number" id="precio-venta" name="precio-venta" class="form-control"
                placeholder="Precio de Venta" min="1" value="<?=set_value('precio-venta')?>" required>
        </div>
        <div class="col-md-4">
            <label for="">Precio de venta por mayoreo</label>
            <input type="number" name="precio-venta-mayoreo" class="form-control"
                placeholder="Precio de Venta por Mayoreo" min="0" value="<?=set_value('precio-venta-mayoreo')?>">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            <input type="number" name="descuento-venta" class="form-control" placeholder="Descuento (%) en Venta"
                min="0" value="<?=set_value('descuento-venta')?>">
        </div>
        <div class="col-md-4">
            <input type="text" name="marca" class="form-control" placeholder="Marca" value="<?=set_value('marca')?>">
        </div>
        <div class="col-md-4">
            <input type="text" name="modelo" class="form-control" placeholder="Modelo" value="<?=set_value('modelo')?>">
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
                <option value="">Seleccionar</option>
                <?php foreach ($proveedores as $proveedor): ?>
                <option value="<?=$proveedor['id']?>" <?=set_select('proveedor', $proveedor['id'])?>>
                    <?=$proveedor['nombre']?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="col-md-6">
            <label>Categoria</label>
            <select name="categoria" class="form-control">
                <option value="">Seleccionar</option>
                <?php foreach ($categorias as $categoria): ?>
                <option value="<?=$categoria['id']?>" <?=set_select('proveedor', $categoria['id'])?>>
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
            <button type="submit" class="btn btn-primary agregar">Agregar producto</button>
        </div>
        <div class="col-md-4"></div>
    </div>
</form>