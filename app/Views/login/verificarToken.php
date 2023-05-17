<link rel="stylesheet" href="css/validarToken.css">
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
                <div class="card fat shadow p-5">
                    <div class="card-body">
                        <h4 class="card-title text-center">Validación de token</h4>
                        <form method="POST" class="my-login-validation" novalidate="" autocomplete="off">
                            <div class="form-group">
                                <input type="text" name="token[]" autofocus>
                                <input type="text" name="token[]" disabled>
                                <input type="text" name="token[]" disabled>
                                <input type="text" name="token[]" disabled>
                                <input type="text" name="token[]" disabled>
                                <input type="text" name="token[]" disabled>
                            </div>
                            <br>
                            <div class="form-group m-0">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Verificar token
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
<script src="js/verificacion.js"></script>