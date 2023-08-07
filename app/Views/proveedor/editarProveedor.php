<div class="row">
    <div class="col-md-10"></div>
    <div class="col-md-2">
        <?=anchor(base_url('proveedores'), 'Regresar', ['class' => 'btn btn-primary'])?>
    </div>
</div>
<br>
<?php if (session()->getFlashdata('errors')): ?>
<?=$this->include('errors')?>
<?php endif;?>
<?php if (session()->getFlashdata('exito')): ?>
<?=$this->include('exito')?>
<?php endif;?>
<?php foreach ($datos as $proveedor): ?>
<?=form_open(base_url('updateProveedor'), ['autocomplete' => 'off'])?>
<?=form_hidden('id', $proveedor['id'])?>
<div class="row">
    <div class="col-md-12">
        <h4><i class="fas fa-id-card"></i> Datos del proveedor</h4>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-4">
        <label for="nombre">Nombre del proveedor <i class="fas fa-info-circle" data-toggle="tooltip"
                data-placement="top" title="Nombre del proveedor"></i></label>
        <?=form_input(['type' => 'text', 'name' => 'nombre', 'class' => 'form-control', 'placeholder' => 'Nombre del proveedor', 'value' => set_value('nombre', $proveedor['nombre']), 'required' => true])?>
    </div>
    <div class="col-md-4">
        <?=form_label('Direccion', 'direccion')?>
        <?=form_input(['type' => 'text', 'name' => 'direccion', 'class' => 'form-control direccion', 'placeholder' => 'Dirección', 'value' => set_value('direccion', $proveedor['direccion'], true)])?>
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
        <label for="telefono">Numero de telefono <i class="fas fa-info-circle" data-toggle="tooltip"
                data-placement="top" title="Numero de telefono"></i></label>
        <?=form_input(['type' => 'text', 'name' => 'telefono', 'class' => 'form-control telefono', 'placeholder' => 'Numero de telefono', 'value' => set_value('telefono', $proveedor['telefono'], true), 'required' => true])?>
    </div>
    <div class="col-md-4">
        <?=form_label('Correo electronico', 'correo')?>
        <?=form_input(['type' => 'email', 'name' => 'correo', 'class' => 'form-control correo', 'placeholder' => 'Correo electronico', 'value' => set_value('correo', $proveedor['correo'], true)])?>
    </div>
</div>
<br>
<br>
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4 text-center">
        <?=form_submit('', 'Editar información', ['class' => 'btn btn-primary agregarProveedor'])?>
    </div>
    <div class="col-md-4"></div>
</div>
<?=form_close()?>
<?php endforeach;?>