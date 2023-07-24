<?=$this->extend('login\layout')?>
<?=$this->section('titulo')?>
Inicio de sesión
<?=$this->endSection()?>
<?=$this->section('contenido')?>
<form method="POST" class="my-login-validation" autocomplete="off">
    <div class="form-group">
        <label>Usuario o correo electronico</label>
        <input type="text" class="form-control" name="usuario-correo" value="" required autofocus>
    </div>
    <div class="form-group">
        <label for="password">Contraseña</label>
        <input id="password" type="password" class="form-control" name="password" required data-eye>

    </div>
    <div class="form-group m-0">
        <button type="submit" class="btn btn-primary btn-block">
            Iniciar sesión
        </button>
    </div>
    <div class="row">
        <div class="col-md-12 text-right">
            <a href="recuperacion">¿Contraseña olvidada?</a>
        </div>
    </div>
</form>
<?=$this->endSection()?>