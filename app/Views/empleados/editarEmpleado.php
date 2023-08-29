<div class="row">
    <div class="col-md-10">
    </div>
    <div class="col-md-2">
        <a href="empleados" class="btn btn-primary">Regresar</a>
    </div>
</div>
<div class="card-body">
    <?php if (isset($error)): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <h4 class="alert-heading">Errores</h4>
        <?=$error?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif;?>
    <?php foreach ($datosEmpleado as $empleado): ?>
    <form action="updateEmpleado" method="post" autocomplete="off" id="form">
        <?= csrf_field() ?>
        <input type="hidden" name="id" value="<?=$empleado['id']?>">
        <div class="row">
            <div class="col-md-12">
                <h4><i class="fa fa-user" aria-hidden="true"></i> Información Personal</h4>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control nombre" placeholder="Nombre" required
                    value="<?=$empleado['nombre']?>">
            </div>
            <div class="col-md-3">
                <label>Apellido paterno</label>
                <input type="text" name="apellido" class="form-control apellido" placeholder="Apellido Paterno" required
                    value="<?=$empleado['apepat']?>">
            </div>
            <div class="col-md-3">
                <label>Telefono</label>
                <input type="text" name="telefono" class="form-control telefono" placeholder="Telefono"
                    value="<?=$empleado['telefono']?>">
            </div>
            <div class="col-md-3">
                <label>Puesto</label>
                <select name="puesto" class="form-control puesto" required>
                    <?php if ($empleado['rol_id'] == 2): ?>
                    <option class="opt" value="<?=$empleado['rol_id']?>">Empleado</option>
                    <?php endif;?>
                    <option value="1">Administrador</option>
                    <option value="2">Empleado</option>
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
                    <?php if ($empleado['genero'] == 'hombre'): ?>
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="sexo" id="" value="hombre" checked>
                        Hombre
                    </label>
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="sexo" id="" value="Mujer"> Mujer
                    </label>
                    <?php endif;?>
                    <?php if ($empleado['genero'] == 'Mujer'): ?>
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="sexo" id="" value="hombre">
                        Hombre
                    </label>
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="sexo" id="" value="Mujer" checked> Mujer
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
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Usuario</label>
                    <input type="text" name="usuario" class="form-control usuario" placeholder="Nombre de usuario"
                        required value="<?=$empleado['usuario']?>">
                </div>
                <div class="form-group">
                    <label for="">Contraseña</label>
                    <input type="password" name="password" class="form-control password" placeholder="Contraseña"
                        pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"
                        title="La contraseña debe tener 8 caracteres minimos, una letra mayuscula, una letra minuscula, un numero y un caracter especial">

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Correo electronico</label>
                    <input type="email" name="email" class="form-control email" placeholder="Correo electronico"
                        value="<?=$empleado['correo']?>">
                </div>
                <div class="form-group">
                    <label for="">Estatus del usuario</label>
                    <select class="form-control estatus" name="estatus" required>
                        <?php if ($empleado['habilitado'] == 0): ?>
                        <option class="opt" value="<?=$empleado['habilitado']?>">Inactivo</option>
                        <?php endif;?>
                        <?php if ($empleado['habilitado'] == 1): ?>
                        <option class="opt" value="<?=$empleado['habilitado']?>">Activo</option>
                        <?php endif;?>
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
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
            <?php if ($empleado['foto_perfil'] == 'images/hombre.png'): ?>
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
            <?php if ($empleado['foto_perfil'] == 'images/nina.png'): ?>
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
            <?php if ($empleado['foto_perfil'] == 'images/profile.png'): ?>
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
            <?php if ($empleado['foto_perfil'] == 'images/profile(1).png'): ?>
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
            <?php if ($empleado['foto_perfil'] == 'images/usuario.png'): ?>
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
            <?php if ($empleado['foto_perfil'] == 'images/usuario(1).png'): ?>
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
                <button type="submit" class="btn btn-primary guardar">Guardar</button>
            </div>
            <div class="col-md-4"></div>
        </div>
    </form>
    <?php endforeach;?>
</div>
<script src="js/ocultarClases.js"></script>