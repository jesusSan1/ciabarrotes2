<?=$this->extend('login\layout')?>
<?=$this->section('titulo')?>
Crear nueva contraseña
<?=$this->endSection()?>
<?=$this->section('contenido')?>
<?=form_open('', ['class' => 'my-login-validation', 'autocomplete' => 'off'])?>
<div class="form-group">
    <?=form_label('password', 'Nueva contraseña')?>
    <?=form_input(['type' => 'password', 'class' => 'form-control', 'name' => 'password', 'value' => old('password'), 'required' => true, 'autofocus' => true])?>
</div>
<br>
<div class="form-group m-0">
    <button type="submit" class="btn btn-primary btn-block">
        Recuperar
    </button>
</div>
</form>
<?=form_close()?>
<?=$this->endSection()?>