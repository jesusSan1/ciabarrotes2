<?=$this->extend('dashboard')?>
<?=$this->section('titulo')?>
Actualizar perfil
<?=$this->endSection()?>
<?=$this->section('contenido')?>
<?php if (isset($errors)): ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <h4 class="alert-heading">Errores</h4>
    <?=$error?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php endif;?>
<?php if (isset($exito)): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <h4 class="alert-heading">Guardado correctamente</h4>
    <?=$exito?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php endif;?>
<?php foreach ($usuario as $user): ?>
<div class="card-body">
    <form action="" method="post" autocomplete="off" id="form">
        <?=csrf_field()?>
        <div class="row">
            <div class="col-md-12">
                <h4><i class="fa fa-user" aria-hidden="true"></i> Información Personal</h4>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <label for="">Nombre</label>
                <input type="text" name="nombre" class="form-control nombre" required value="<?=$user['nombre']?>">
            </div>
            <div class="col-md-4">
                <label for="">Apellido</label>
                <input type="text" name="apellido" class="form-control apellido" required value="<?=$user['apepat']?>">
            </div>
            <div class="col-md-4">
                <label for="">Telefono</label>
                <input type="text" name="telefono" class="form-control telefono" value="<?=$user['telefono']?>">
            </div>
        </div>
        <br>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <h4><i class="fa fa-users" aria-hidden="true"></i> Genero</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="form-check form-check-inline">
                    <?php if ($user['genero'] == 'hombre'): ?>
                    <label class="form-check-label">
                        <input class="form-check-input" checked type="radio" name="sexo" value="hombre">
                        Hombre
                    </label>
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="sexo" value="Mujer">
                        Mujer
                    </label>
                    <?php else: ?>
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="sexo" value="hombre">
                        Hombre
                    </label>
                    <label class="form-check-label">
                        <input class="form-check-input" checked type="radio" name="sexo" value="Mujer">
                        Mujer
                    </label>
                    <?php endif;?>
                </div>
            </div>
            <div class="col-md-10"></div>
        </div>
        <br>
        <hr>
        <br>
        <div class="row">
            <div class="col-md-12">
                <h4><i class="fas fa-user-lock"></i> Información de la cuenta</h4>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <input type="text" name="usuario" class="form-control usuario" placeholder="Nombre de usuario"
                        required value="<?=$user['usuario']?>">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <input type="password" name="password" class="form-control password"
                        placeholder="Escribe tu nueva contraseña"
                        pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"
                        title="La contraseña debe tener 8 caracteres minimos, una letra mayuscula, una letra minuscula, un numero y un caracter especial">

                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <input type="email" name="email" class="form-control email" placeholder="Correo electronico"
                        value="<?=$user['correo']?>">
                </div>
            </div>
        </div>
        <br>
        <hr>
        <br>
        <div class="row">
            <div class="col-md-12">
                <h4><i class="fas fa-user-lock"></i> Imagen del usuario</h4>
            </div>
        </div>
        <br>
        <div id="general">
            <?php if ($user['foto_perfil'] == 'images/hombre.png'): ?>
            <div class="row">
                <div class="col-md-4">
                    <input checked type="radio" name="img" class="image" value="images/hombre.png">
                    <label class="custom-control custom-radio">
                        <span class="custom-control-indicator"></span>
                        <img src="images/hombre.png" alt="" class="img-fluid" width="150" height="150">
                    </label>
                </div>
                <div class="col-md-4">
                    <input type="radio" name="img" class="image" value="images/nina.png">
                    <label class="custom-control custom-radio">
                        <input type="radio" name="img" id="img" value="checkedValue" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                        <img src="images/nina.png" alt="" class="img-fluid" width="150" height="150">
                    </label>
                </div>
                <div class="col-md-4">
                    <input type="radio" name="img" class="image" value="images/profile.png">
                    <label class="custom-control custom-radio">
                        <input type="radio" name="img" id="img" value="checkedValue" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                        <img src="images/profile.png" alt="" class="img-fluid" width="150" height="150">
                    </label>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <input type="radio" name="img" class="image" value="images/profile(1).png">
                    <label class="custom-control custom-radio">
                        <input type="radio" name="img" id="img" value="checkedValue" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                        <img src="images/profile(1).png" alt="" class="img-fluid" width="150" height="150">
                    </label>
                </div>
                <div class="col-md-4">
                    <input type="radio" name="img" class="image" value="images/usuario.png">
                    <label class="custom-control custom-radio">
                        <input type="radio" name="img" id="img" value="checkedValue" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                        <img src="images/usuario.png" alt="" class="img-fluid" width="150" height="150">
                    </label>
                </div>
                <div class="col-md-4">
                    <input type="radio" name="img" class="image" value="images/usuario(1).png">
                    <label class="custom-control custom-radio">
                        <img src="images/usuario(1).png" alt="" class="img-fluid" width="150" height="150">
                    </label>
                </div>
            </div>
            <?php endif;?>
            <?php if ($user['foto_perfil'] == 'images/nina.png'): ?>
            <div class="row">
                <div class="col-md-4">
                    <input type="radio" name="img" class="image" value="images/hombre.png">
                    <label class="custom-control custom-radio">
                        <span class="custom-control-indicator"></span>
                        <img src="images/hombre.png" alt="" class="img-fluid" width="150" height="150">
                    </label>
                </div>
                <div class="col-md-4">
                    <input checked type="radio" name="img" class="image" value="images/nina.png">
                    <label class="custom-control custom-radio">
                        <input type="radio" name="img" id="img" value="checkedValue" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                        <img src="images/nina.png" alt="" class="img-fluid" width="150" height="150">
                    </label>
                </div>
                <div class="col-md-4">
                    <input type="radio" name="img" class="image" value="images/profile.png">
                    <label class="custom-control custom-radio">
                        <input type="radio" name="img" id="img" value="checkedValue" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                        <img src="images/profile.png" alt="" class="img-fluid" width="150" height="150">
                    </label>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <input type="radio" name="img" class="image" value="images/profile(1).png">
                    <label class="custom-control custom-radio">
                        <input type="radio" name="img" id="img" value="checkedValue" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                        <img src="images/profile(1).png" alt="" class="img-fluid" width="150" height="150">
                    </label>
                </div>
                <div class="col-md-4">
                    <input type="radio" name="img" class="image" value="images/usuario.png">
                    <label class="custom-control custom-radio">
                        <input type="radio" name="img" id="img" value="checkedValue" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                        <img src="images/usuario.png" alt="" class="img-fluid" width="150" height="150">
                    </label>
                </div>
                <div class="col-md-4">
                    <input type="radio" name="img" class="image" value="images/usuario(1).png">
                    <label class="custom-control custom-radio">
                        <img src="images/usuario(1).png" alt="" class="img-fluid" width="150" height="150">
                    </label>
                </div>
            </div>
            <?php endif;?>
            <?php if ($user['foto_perfil'] == 'images/profile.png'): ?>
            <div class="row">
                <div class="col-md-4">
                    <input type="radio" name="img" class="image" value="images/hombre.png">
                    <label class="custom-control custom-radio">
                        <span class="custom-control-indicator"></span>
                        <img src="images/hombre.png" alt="" class="img-fluid" width="150" height="150">
                    </label>
                </div>
                <div class="col-md-4">
                    <input type="radio" name="img" class="image" value="images/nina.png">
                    <label class="custom-control custom-radio">
                        <input type="radio" name="img" id="img" value="checkedValue" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                        <img src="images/nina.png" alt="" class="img-fluid" width="150" height="150">
                    </label>
                </div>
                <div class="col-md-4">
                    <input checked type="radio" name="img" class="image" value="images/profile.png">
                    <label class="custom-control custom-radio">
                        <input type="radio" name="img" id="img" value="checkedValue" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                        <img src="images/profile.png" alt="" class="img-fluid" width="150" height="150">
                    </label>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <input type="radio" name="img" class="image" value="images/profile(1).png">
                    <label class="custom-control custom-radio">
                        <input type="radio" name="img" id="img" value="checkedValue" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                        <img src="images/profile(1).png" alt="" class="img-fluid" width="150" height="150">
                    </label>
                </div>
                <div class="col-md-4">
                    <input type="radio" name="img" class="image" value="images/usuario.png">
                    <label class="custom-control custom-radio">
                        <input type="radio" name="img" id="img" value="checkedValue" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                        <img src="images/usuario.png" alt="" class="img-fluid" width="150" height="150">
                    </label>
                </div>
                <div class="col-md-4">
                    <input type="radio" name="img" class="image" value="images/usuario(1).png">
                    <label class="custom-control custom-radio">
                        <img src="images/usuario(1).png" alt="" class="img-fluid" width="150" height="150">
                    </label>
                </div>
            </div>
            <?php endif;?>
            <?php if ($user['foto_perfil'] == 'images/profile(1).png'): ?>
            <div class="row">
                <div class="col-md-4">
                    <input type="radio" name="img" class="image" value="images/hombre.png">
                    <label class="custom-control custom-radio">
                        <span class="custom-control-indicator"></span>
                        <img src="images/hombre.png" alt="" class="img-fluid" width="150" height="150">
                    </label>
                </div>
                <div class="col-md-4">
                    <input type="radio" name="img" class="image" value="images/nina.png">
                    <label class="custom-control custom-radio">
                        <input type="radio" name="img" id="img" value="checkedValue" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                        <img src="images/nina.png" alt="" class="img-fluid" width="150" height="150">
                    </label>
                </div>
                <div class="col-md-4">
                    <input type="radio" name="img" class="image" value="images/profile.png">
                    <label class="custom-control custom-radio">
                        <input type="radio" name="img" id="img" value="checkedValue" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                        <img src="images/profile.png" alt="" class="img-fluid" width="150" height="150">
                    </label>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <input checked type="radio" name="img" class="image" value="images/profile(1).png">
                    <label class="custom-control custom-radio">
                        <input type="radio" name="img" id="img" value="checkedValue" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                        <img src="images/profile(1).png" alt="" class="img-fluid" width="150" height="150">
                    </label>
                </div>
                <div class="col-md-4">
                    <input type="radio" name="img" class="image" value="images/usuario.png">
                    <label class="custom-control custom-radio">
                        <input type="radio" name="img" id="img" value="checkedValue" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                        <img src="images/usuario.png" alt="" class="img-fluid" width="150" height="150">
                    </label>
                </div>
                <div class="col-md-4">
                    <input type="radio" name="img" class="image" value="images/usuario(1).png">
                    <label class="custom-control custom-radio">
                        <img src="images/usuario(1).png" alt="" class="img-fluid" width="150" height="150">
                    </label>
                </div>
            </div>
            <?php endif;?>
            <?php if ($user['foto_perfil'] == 'images/usuario.png'): ?>
            <div class="row">
                <div class="col-md-4">
                    <input type="radio" name="img" class="image" value="images/hombre.png">
                    <label class="custom-control custom-radio">
                        <span class="custom-control-indicator"></span>
                        <img src="images/hombre.png" alt="" class="img-fluid" width="150" height="150">
                    </label>
                </div>
                <div class="col-md-4">
                    <input type="radio" name="img" class="image" value="images/nina.png">
                    <label class="custom-control custom-radio">
                        <input type="radio" name="img" id="img" value="checkedValue" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                        <img src="images/nina.png" alt="" class="img-fluid" width="150" height="150">
                    </label>
                </div>
                <div class="col-md-4">
                    <input type="radio" name="img" class="image" value="images/profile.png">
                    <label class="custom-control custom-radio">
                        <input type="radio" name="img" id="img" value="checkedValue" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                        <img src="images/profile.png" alt="" class="img-fluid" width="150" height="150">
                    </label>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <input type="radio" name="img" class="image" value="images/profile(1).png">
                    <label class="custom-control custom-radio">
                        <input type="radio" name="img" id="img" value="checkedValue" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                        <img src="images/profile(1).png" alt="" class="img-fluid" width="150" height="150">
                    </label>
                </div>
                <div class="col-md-4">
                    <input checked type="radio" name="img" class="image" value="images/usuario.png">
                    <label class="custom-control custom-radio">
                        <input type="radio" name="img" id="img" value="checkedValue" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                        <img src="images/usuario.png" alt="" class="img-fluid" width="150" height="150">
                    </label>
                </div>
                <div class="col-md-4">
                    <input type="radio" name="img" class="image" value="images/usuario(1).png">
                    <label class="custom-control custom-radio">
                        <img src="images/usuario(1).png" alt="" class="img-fluid" width="150" height="150">
                    </label>
                </div>
            </div>
            <?php endif;?>
            <?php if ($user['foto_perfil'] == 'images/usuario(1).png'): ?>
            <div class="row">
                <div class="col-md-4">
                    <input type="radio" name="img" class="image" value="images/hombre.png">
                    <label class="custom-control custom-radio">
                        <span class="custom-control-indicator"></span>
                        <img src="images/hombre.png" alt="" class="img-fluid" width="150" height="150">
                    </label>
                </div>
                <div class="col-md-4">
                    <input type="radio" name="img" class="image" value="images/nina.png">
                    <label class="custom-control custom-radio">
                        <input type="radio" name="img" id="img" value="checkedValue" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                        <img src="images/nina.png" alt="" class="img-fluid" width="150" height="150">
                    </label>
                </div>
                <div class="col-md-4">
                    <input type="radio" name="img" class="image" value="images/profile.png">
                    <label class="custom-control custom-radio">
                        <input type="radio" name="img" id="img" value="checkedValue" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                        <img src="images/profile.png" alt="" class="img-fluid" width="150" height="150">
                    </label>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <input type="radio" name="img" class="image" value="images/profile(1).png">
                    <label class="custom-control custom-radio">
                        <input type="radio" name="img" id="img" value="checkedValue" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                        <img src="images/profile(1).png" alt="" class="img-fluid" width="150" height="150">
                    </label>
                </div>
                <div class="col-md-4">
                    <input type="radio" name="img" class="image" value="images/usuario.png">
                    <label class="custom-control custom-radio">
                        <input type="radio" name="img" id="img" value="checkedValue" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                        <img src="images/usuario.png" alt="" class="img-fluid" width="150" height="150">
                    </label>
                </div>
                <div class="col-md-4">
                    <input checked type="radio" name="img" class="image" value="images/usuario(1).png">
                    <label class="custom-control custom-radio">
                        <img src="images/usuario(1).png" alt="" class="img-fluid" width="150" height="150">
                    </label>
                </div>
            </div>
            <?php endif;?>
        </div>
        <br>
        <hr>
        <br>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 text-center">
                <button type="submit" class="btn btn-primary guardar">Editar datos</button>
            </div>
            <div class="col-md-4"></div>
        </div>
    </form>
</div>
<?php endforeach;?>
<?=$this->endSection()?>