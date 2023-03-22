<section class="h-100">
    <div class="container h-100">
        <div class="row justify-content-md-center h-100">
            <div class="card-wrapper">
                <div class="brand">
                    <img src="images/shops.png" alt="logo">
                </div>
                <?php if (isset($errors)): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?=$errors?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif;?>
                <div class="card fat shadow">
                    <div class="card-body">
                        <h4 class="card-title">Inicio de Sesión</h4>
                        <form method="POST" class="my-login-validation" novalidate="" autocomplete="off">
                            <div class="form-group">
                                <label>Usuario o correo electronico</label>
                                <input type="text" class="form-control" name="usuario-correo" value="" required
                                    autofocus>
                            </div>

                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input id="password" type="password" class="form-control" name="password" required
                                    data-eye>

                            </div>
                            <br>
                            <div class="form-group m-0">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Iniciar Sesión
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="footer">
                    Copyright &copy; 2022 &mdash; jesusSan1
                </div>
            </div>
        </div>
    </div>
</section>