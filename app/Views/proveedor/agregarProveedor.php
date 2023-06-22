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
<form action="" method="post" autocomplete="off">
    <div class="row">
        <div class="col-md-12">
            <h4><i class="fas fa-id-card    "></i> Datos del proveedor</h4>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            <input type="text" name="nombre" class="form-control nombre" placeholder="Nombre del proveedor"
                value="<?=set_value('nombre')?>" required>
        </div>
        <div class="col-md-4">
            <input type="text" name="direccion" class="form-control direccion" placeholder="Dirección">
        </div>
    </div>
    <br>
    <hr>
    <br>
    <div class="row">
        <div class="col-md-12">
            <h4><i class="fas fa-phone"></i> Información del proveedor</h4>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            <label>Numero de telefono <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                    title="Numero de telefono"></i></label>
            <input type="text" name="telefono" class="form-control telefono" placeholder="Numero de telefono"
                value="<?=set_value('telefono')?>" required>
        </div>
        <div class="col-md-4">
            <label>Correo electronico</label>
            <input type="email" name="correo" class="form-control correo" placeholder="Correo electronico"
                value="<?=set_value('correo')?>">
        </div>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 text-center">
            <button type="submit" class="btn btn-primary agregarProveedor">Agregar proveedor</button>
        </div>
        <div class="col-md-4"></div>
    </div>
</form>