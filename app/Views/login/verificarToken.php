<?=$this->extend('login/layout')?>
<?=$this->section('titulo')?>
Validación de token
<?=$this->endSection()?>
<?=$this->section('contenido')?>
<?=link_tag('css/validarToken.css')?>
<?=form_open('', ['class' => 'my-login-validation', 'autocomplete' => 'off'])?>
<div class="form-group">
    <?=form_input(['type' => 'text', 'name' => 'token[]', 'autofocus' => true])?>
    <?php for ($i = 1; $i <= 5; $i++): ?>
    <?=form_input(['type' => 'text', 'name' => 'token[]', 'disabled' => true])?>
    <?php endfor;?>
</div>
<br>
<div class="form-group m-0">
    <button type="submit" class="btn btn-primary btn-block">
        Verificar token
    </button>
</div>
<?=form_close()?>
<?=script_tag('js/verificacion.js')?>
<?=$this->endSection()?>