<?php if (session()->getFlashdata('errors')): ?>
<?=$this->include('errors')?>
<?php endif;?>
<?php if (session()->getFlashdata('exito')): ?>
<?=$this->include('exito')?>
<?php endif;?>
<h3>
    Información de la categoria
    <i class="fas fa-id-card"></i>
</h3>
<br>
<?=form_open('', ['autocomplete' => 'off'])?>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <?=form_input(['type' => 'text', 'name' => 'categoria', 'id' => 'categoria', 'class' => session('list.categoria') ? 'form-control nombre-categoria is-invalid' :'form-control nombre-categoria', 'placeholder' => 'Nombre de la categoria', 'required' => true, 'value' => old('categoria')])?>
        </div>
    </div>
    <div class="col-md-6">
        <?=form_submit('', 'Guardar', ['class' => 'btn btn-primary'])?>
    </div>
</div>
<?=form_close()?>