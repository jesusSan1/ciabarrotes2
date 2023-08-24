<h3>Información de la categoria <i class="fas fa-id-card"></i></h3>
<br>
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
<form method="POST" autocomplete="off">
    <?=csrf_field()?>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="categoria" id="" class="form-control nombre-categoria"
                    placeholder="Nombre de la categoria" required>
            </div>
        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary guardar-categoria">Guardar</button>
        </div>
    </div>
</form>