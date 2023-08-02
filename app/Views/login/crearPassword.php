<?=$this->extend('login\layout')?>
<?=$this->section('titulo')?>
Crear nueva contraseña
<?=$this->endSection()?>
<?=$this->section('contenido')?>
<form method="POST" class="my-login-validation" autocomplete="off">
    <div class="form-group">
        <label>Nueva contraseña</label>
        <input type="password" class="form-control" name="password" value="<?=old('password')?>" required autofocus>
    </div>
    <br>
    <div class="form-group m-0">
        <button type="submit" class="btn btn-primary btn-block">
            Recuperar
        </button>
    </div>
</form>
<?=$this->endSection()?>