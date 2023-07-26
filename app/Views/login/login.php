<?=$this->extend('login\layout')?>
<?=$this->section('titulo')?>
Inicio de sesión
<?=$this->endSection()?>
<?=$this->section('contenido')?>
<?=form_open('', ['class' => 'my-login-validation', 'autocomplete' => 'off']);?>
<div class="form-group">
    <?=form_label('Usuario o correo electronico', 'usuario-correo')?>
    <?=form_input(['type' => 'text', 'id' => 'usuario-correo', 'class' => 'form-control', 'name' => 'usuario-correo', 'value' => old('usuario-correo'), 'required' => true, 'autofocus' => true])?>
</div>
<div class="form-group">
    <?=form_label('Contraseña', 'password')?>
    <?=form_input(['type' => 'password', 'id' => 'password', 'class' => 'form-control', 'name' => 'password', 'value' => old('password')])?>
</div>
<div class="form-group m-0">
    <?=form_submit('', 'Iniciar sesión', ['class' => 'btn btn-primary btn-block'])?>
</div>
<div class="row">
    <div class="col-md-12 text-right">
        <?=anchor('recuperacion', '¿Contraseña olvidada?')?>
    </div>
</div>
<?=form_close()?>
<?=$this->endSection()?>