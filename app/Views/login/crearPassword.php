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
                        <h4 class="card-title">Crear nueva contraseña</h4>
                        <form method="POST" class="my-login-validation" novalidate="" autocomplete="off">
                            <div class="form-group">
                                <label>Nueva contraseña</label>
                                <input type="password" class="form-control" name="password" value="" required autofocus>
                            </div>
                            <br>
                            <div class="form-group m-0">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Recuperar
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