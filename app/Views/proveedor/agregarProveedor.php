<?php if (session()->getFlashdata('errors')): ?>
<?=$this->include('errors')?>
<?php endif;?>
<?php if (session()->getFlashdata('exito')): ?>
<?=$this->include('exito')?>
<?php endif;?>
<?=form_open('', ['autocomplete' => 'off'])?>
<div class="row">
    <div class="col-md-12">
        <h4>
            <i class="fas fa-id-card"></i>
            Datos del proveedor
        </h4>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-4">
        <label>Nombre del proveedor <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                title="Nombre del proveedor"></i></label>
        <?=form_input(['type' => 'text', 'name' => 'nombre', 'class' => 'form-control nombre', 'placeholder' => 'Nombre del proveedor', 'value' => old('nombre'), 'required' => true])?>
    </div>
    <div class="col-md-4">
        <?=form_label('Direccion', 'direccion')?>
        <?=form_input(['type' => 'text', 'name' => 'direccion', 'id' => 'direccion', 'class' => 'form-control direccion', 'placeholder' => 'Dirección', 'value' => old('direccion')])?>
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
        <?=form_input(['type' => 'text', 'name' => 'telefono', 'class' => 'form-control telefono', 'placeholder' => 'Numero de telefono', 'value' => old('telefono'), 'required' => true])?>
    </div>
    <div class="col-md-4">
        <?=form_label('Correo electronico', 'email')?>
        <?=form_input(['type' => 'email', 'name' => 'correo', 'id' => 'email', 'class' => 'form-control correo', 'placeholder' => 'Correo electronico', 'value' => old('correo')])?>
    </div>
</div>
<br>
<br>
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4 text-center">
        <?=form_submit('', 'Agregar proveedor', ['class' => 'btn btn-primary agregarProveedor']);?>
    </div>
    <div class="col-md-4"></div>
</div>
<?=form_close()?>