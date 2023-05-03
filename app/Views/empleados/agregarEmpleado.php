<div class="card-body">
    <form action="" method="post" autocomplete="off" id="form">
        <div class="row">
            <div class="col-md-12">
                <h4><i class="fa fa-user" aria-hidden="true"></i> Información Personal</h4>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3">
                <input type="text" name="nombre" class="form-control nombre" placeholder="Nombre">
            </div>
            <div class="col-md-3">
                <input type="text" name="apellido" class="form-control apellido" placeholder="Apellido Paterno">
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control telefono" placeholder="Telefono">
            </div>
            <div class="col-md-3">
                <select name="" class="form-control puesto">
                    <option value="puesto">Puesto</option>
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
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="sexo" id="" value="hombre"> Hombre
                    </label>
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="sexo" id="" value="Mujer"> Mujer
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
                    <input type="text" class="form-control usuario" placeholder="Nombre de usuario">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control password" placeholder="Contraseña">

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="email" name="" class="form-control email" placeholder="Correo electronico">
                </div>
                <div class="form-group">
                    <select class="form-control estatus" name="" id="">
                        <option value="seleccionar">Estatus del usuario</option>
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
                <button type="button" class="btn btn-primary guardar">Guardar</button>
            </div>
            <div class="col-md-4"></div>
        </div>
    </form>
</div>
