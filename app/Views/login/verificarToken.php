<?=$this->extend('login\layout')?>
<?=$this->section('titulo')?>
Validación de token
<?=$this->endSection()?>
<?=$this->section('contenido')?>
<link rel="stylesheet" href="css/validarToken.css">
<form method="POST" class="my-login-validation" autocomplete="off">
    <div class="form-group">
        <input type="text" name="token[]" autofocus>
        <input type="text" name="token[]" disabled>
        <input type="text" name="token[]" disabled>
        <input type="text" name="token[]" disabled>
        <input type="text" name="token[]" disabled>
        <input type="text" name="token[]" disabled>
    </div>
    <br>
    <div class="form-group m-0">
        <button type="submit" class="btn btn-primary btn-block">
            Verificar token
        </button>
    </div>
</form>
<script src="js/verificacion.js"></script>
<?=$this->endSection()?>