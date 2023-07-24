<?=$this->extend('login\layout')?>
<?=$this->section('titulo')?>
Recuperacion de contraseña olvidada
<?=$this->endSection()?>
<?=$this->section('contenido')?>
<form method="POST" class="my-login-validation" autocomplete="off">
    <div class="form-group">
        <label>Correo electronico</label>
        <input type="email" class="form-control" name="correo" value="" required autofocus>
    </div>
    <br>
    <div class="form-group m-0">
        <button type="submit" class="btn btn-primary btn-block">
            Recuperar
        </button>
    </div>
</form>
<?=$this->endSection()?>