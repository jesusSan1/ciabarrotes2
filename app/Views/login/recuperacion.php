<?=$this->extend('login/layout')?>
<?=$this->section('titulo')?>
Recuperacion de contraseña olvidada
<?=$this->endSection()?>
<?=$this->section('contenido')?>
<?=form_open('', ['class' => 'my-login-validation', 'autocomplete' => 'off'])?>
<div class="form-group">
    <?=form_label('Correo electronico', 'email')?>
    <?=form_input(['type' => 'email', 'id' => 'email', 'class' => 'form-control', 'name' => 'correo', 'value' => old('correo'), 'required' => true, 'autofocus' => true])?>
</div>
<br>
<div class="form-group m-0">
    <?=form_submit('', 'Recuperar', ['class' => 'btn btn-primary btn-block'])?>
</div>
<?=form_close()?>
<?=$this->endSection()?>