<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Kodinger">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>CI Abarrotes 2</title>
    <?=link_tag('bootstrap/bootstrap.min.css');?>
    <?=link_tag('css/my-login.css');?>
    <?=link_tag('fontawesome/css/all.css');?>
    <?=link_tag('images/shops.png', 'shortcut icon', 'image/x-icon');?>
</head>

<body class="my-login-page">
    <div id="particles-js"></div>
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">
                <div class="card-wrapper">
                    <div class="brand">
                        <?=img('images/shops.png', true)?>
                    </div>
                    <?php if (session()->getFlashdata('errors')): ?>
                    <?=$this->include('errors')?>
                    <?php endif;?>
                    <div class="card fat shadow">
                        <div class="card-body">
                            <h4 class="card-title">
                                <?=$this->renderSection('titulo')?>
                            </h4>
                            <?=$this->renderSection('contenido')?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?=script_tag('jquery/jquery-3.6.0.js')?>
    <?=script_tag('fontawesome/js/all.js')?>
    <?=script_tag('bootstrap/bootstrap.min.js')?>
    <?=script_tag('js/my-login.js')?>
    <?=script_tag('js/particles.js')?>
    <?=script_tag('js/main.js')?>
</body>

</html>