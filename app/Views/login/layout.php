<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Kodinger">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>CI Abarrotes 2</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/my-login.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
    <link rel="Shortcut Icon" type="image/x-icon" href="images/shops.png" />
</head>

<body class="my-login-page">
    <div id="particles-js"></div>
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
                            <h4 class="card-title"><?= $this->renderSection('titulo') ?></h4>
                            <?= $this->renderSection('contenido') ?>
                        </div>
                    </div>
                    <div class="footer">
                        Copyright &copy; 2022 &mdash; jesusSan1
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="jquery/jquery-3.6.0.js"></script>
    <script src="fontawesome/js/all.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>
    <script src="js/my-login.js"></script>
    <script src="js/particles.js"></script>
    <script src="js/main.js"></script>
</body>

</html>