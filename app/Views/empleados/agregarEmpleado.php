<div class="card-body">
    <?= form_open('', ['autocomplete' => 'off', 'id' => 'form']) ?>
    <?= csrf_field() ?>
    <div class="row">
        <div class="col-md-12">
            <h4><i class="fa fa-user" aria-hidden="true"></i> Información Personal</h4>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-3">
            <input type="text" name="nombre" class="form-control nombre" placeholder="Nombre" required
                value="<?= set_value('nombre') ?>">
        </div>
        <div class="col-md-3">
            <input type="text" name="apellido" class="form-control apellido" placeholder="Apellido Paterno" required
                value="<?= set_value('apellido') ?>">
        </div>
        <div class="col-md-3">
            <input type="text" name="telefono" class="form-control telefono" placeholder="Telefono"
                value="<?= set_value('telefono') ?>">
        </div>
        <div class="col-md-3">
            <select name="puesto" class="form-control puesto" required>
                <option value="">Puesto</option>
                <option <?= set_select('puesto', '1') ?> value="1">Administrador</option>
                <option <?= set_select('puesto', '2') ?> value="2">Empleado</option>
            </select>
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
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="sexo" value="hombre">
                    Hombre
                </label>
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="sexo" value="Mujer">
                    Mujer
                </label>
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
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="usuario" class="form-control usuario" placeholder="Nombre de usuario" required
                    value="<?= set_value('usuario') ?>">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control password" placeholder="Contraseña" required
                    pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"
                    title="La contraseña debe tener 8 caracteres minimos, una letra mayuscula, una letra minuscula, un numero y un caracter especial">

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="email" name="email" class="form-control email" placeholder="Correo electronico"
                    value="<?= set_value('email') ?>">
            </div>
            <div class="form-group">
                <select class="form-control estatus" name="estatus" required>
                    <option value="">Estatus del usuario</option>
                    <option <?= set_select('estatus', '1') ?> value="1">Activo</option>
                    <option <?= set_select('estatus', '0') ?> value="0">Inactivo</option>
                </select>
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
                    <input type="radio" name="img" value="checkedValue" class="custom-control-input">
                    <span class="custom-control-indicator"></span>
                    <img src="images/nina.png" alt="" class="img-fluid" width="150" height="150">
                </label>
            </div>
            <div class="col-md-4">
                <input type="radio" name="img" class="image" value="images/profile.png">
                <label class="custom-control custom-radio">
                    <input type="radio" name="img" value="checkedValue" class="custom-control-input">
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
                    <input type="radio" name="img" value="checkedValue" class="custom-control-input">
                    <span class="custom-control-indicator"></span>
                    <img src="images/profile(1).png" alt="" class="img-fluid" width="150" height="150">
                </label>
            </div>
            <div class="col-md-4">
                <input type="radio" name="img" class="image" value="images/usuario.png">
                <label class="custom-control custom-radio">
                    <input type="radio" name="img" value="checkedValue" class="custom-control-input">
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
    </div>
    <br>
    <hr>
    <br>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 text-center">
            <button type="submit" class="btn btn-primary guardar">Guardar</button>
        </div>
        <div class="col-md-4"></div>
    </div>
    <?= form_close() ?>
</div>