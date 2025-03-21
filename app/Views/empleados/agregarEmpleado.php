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
            <?= form_input(['type' => 'text', 'name' => 'nombre', 'class' => session('list.nombre') ? 'form-control nombre is-invalid' : 'form-control nombre', 'placeholder' => 'Nombre', 'required' => true, 'value' => old('nombre')]) ?>
        </div>
        <div class="col-md-3">
            <?= form_input(['type' => 'text', 'name' => 'apellido', 'class' => session('list.apellido') ? 'form-control apellido is-invalid' : 'form-control apellido', 'placeholder' => 'Apellido paterno', 'required' => true, 'value' => old('apellido')]) ?>
        </div>
        <div class="col-md-3">
            <?= form_input(['type' => 'text', 'name' => 'telefono', 'class' => session('list.telefono') ? 'form-control telefono is-invalid' : 'form-control telefono', 'placeholder' => 'Telefono', 'value' => old('telefono')]) ?>
        </div>
        <div class="col-md-3">
            <select name="puesto"
                class="form-control puesto <?= session('list.puesto') ? 'form-control puesto is-invalid' : ''?>"
                required>
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
                    <input class="form-check-input <?= session('list.sexo') ? 'form-check-input is-invalid' : ''?>"
                        type="radio" name="sexo" value="hombre" <?= set_radio('sexo', 'hombre') ?>>
                    Hombre
                </label>
                <label class="form-check-label">
                    <input class="form-check-input <?= session('list.sexo') ? 'form-check-input is-invalid' : ''?>"
                        type="radio" name="sexo" value="Mujer" <?= set_radio('sexo', 'Mujer') ?>>
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
                <?= form_input(['type' => 'text', 'name' => 'usuario', 'class' => session('list.usuario') ? 'form-control usuario is-invalid' : 'form-control usuario', 'placeholder' => 'Nombre de usuario', 'required' => true, 'value' => old('usuario')]) ?>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control password" placeholder="Contraseña" required
                    pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"
                    title="La contraseña debe tener 8 caracteres minimos, una letra mayuscula, una letra minuscula, un numero y un caracter especial">

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?= form_input(['type' => 'email', 'name' => 'email', 'class' => session('list.email') ? 'form-control email is-invalid' : 'form-control email', 'placeholder' => 'Correo electronico', 'value' => old('email')]) ?>
            </div>
            <div class="form-group">
                <select
                    class="form-control estatus <?= session('list.estatus') ? 'form-control estatus is-invalid' : '' ?>"
                    name="estatus" required>
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
                <mi-imagen imagen="images/hombre.png" seleccionado="<?= set_radio('img', 'images/hombre.png') ?>">
                </mi-imagen>
            </div>
            <div class="col-md-4">
                <mi-imagen imagen="images/nina.png" seleccionado="<?= set_radio('img', 'images/nina.png') ?>">
                </mi-imagen>
            </div>
            <div class="col-md-4">
                <mi-imagen imagen="images/profile.png" seleccionado="<?= set_radio('img', 'images/profile.png') ?>">
                </mi-imagen>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <mi-imagen imagen="images/profile(1).png"
                    seleccionado="<?= set_radio('img', 'images/profile(1).png') ?>">
                </mi-imagen>
            </div>
            <div class="col-md-4">
                <mi-imagen imagen="images/usuario.png" seleccionado="<?= set_radio('img', 'images/usuario.png') ?>">
                </mi-imagen>
            </div>
            <div class="col-md-4">
                <mi-imagen imagen="images/usuario(1).png"
                    seleccionado="<?= set_radio('img', 'images/usuario(1).png') ?>">
                </mi-imagen>
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
<?= script_tag('components/images.js') ?>