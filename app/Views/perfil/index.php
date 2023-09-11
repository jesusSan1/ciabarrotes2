<?=$this->extend('dashboard')?>
<?=$this->section('titulo')?>
Actualizar perfil
<?=$this->endSection()?>
<?=$this->section('contenido')?>
<?php if (session()->getFlashdata('errors')): ?>
<?=$this->include('errors')?>
<?php endif;?>
<?php if (session()->getFlashdata('exito')): ?>
<?=$this->include('exito')?>
<?php endif;?>
<?php foreach ($usuario as $user): ?>
<div class="card-body">
    <?=form_open('', ['autocomplete' => 'off', 'id' => 'form'])?>
    <div class="row">
        <div class="col-md-12">
            <h4><i class="fa fa-user" aria-hidden="true"></i> Información Personal</h4>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            <?=form_label('Nombre', 'nombre');?>
            <?=form_input(['type' => 'text', 'name' => 'nombre', 'class' => 'form-control nombre', 'required' => true, 'value' => set_value('nombre', $user['nombre'])])?>
        </div>
        <div class="col-md-4">
            <?=form_label('Apellido', 'apellido')?>
            <?=form_input(['type' => 'text', 'name' => 'apellido', 'class' => 'form-control apellido', 'required' => true, 'value' => set_value('apellido', $user['apepat'])])?>
        </div>
        <div class="col-md-4">
            <?=form_label('Telefono', 'telefono')?>
            <?=form_input(['type' => 'text', 'name' => 'telefono', 'class' => 'form-control telefono', 'value' => set_value('telefono', $user['telefono'])])?>
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
                <?=form_label('Usuario', 'usuario')?>
                <?=form_input(['type' => 'text', 'name' => 'usuario', 'class' => 'form-control usuario', 'required' => true, 'value' => set_value('usuario', $user['usuario'])])?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <?=form_label('Contraseña', 'password')?>
                <?=form_input(['type' => 'password', 'name' => 'password', 'class' => 'form-control password', 'patterrn' => '^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$', 'title' => 'La contraseña debe tener 8 caracteres minimos, una letra mayuscula, una letra minuscula, un numero y un caracter especial', 'placeholder' => 'Escribe tu nueva contraseña'])?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <?=form_label('Correo electronico', 'email')?>
                <?=form_input(['type' => 'email', 'name' => 'email', 'class' => 'form-control email', 'value' => set_value('email', $user['correo'])])?>
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
            <?=form_submit('', 'Editar datos', ['class' => 'btn btn-primary guardar'])?>
        </div>
        <div class="col-md-4"></div>
    </div>
    <?=form_close()?>
</div>
<?php endforeach;?>
<?=$this->endSection()?>