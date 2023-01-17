<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>public/css/login.css"/>
    <link rel="shortcut icon" href="<?php echo constant('IMG'); ?>nav/logo.png">
    <title>Restablezca su contraseña | Del Plata Indumentaria</title>
</head>

<body>

    <?php require 'views/partials/header.php'; ?>

    <section class="background" id="sec-forgotPassword">
        <div id="container-forgotPassword">
            <form class="form" id="form-resetPassword" action="" method="POST">
                <p id="forgotPassword-title">Introduzca su correo electrónico</p>
                <div class="division division-register"></div>

                <div class="container-inps-forgotPassword">
                    <input class="inp-login" type="email" placeholder="Correo Electrónico" name="user_email">
                </div>

                <div class="division division-register"></div>

                <div class="container-btn-forgotPassword">
                    <button class="button btn-forgotPassword">Aceptar</button>
                </div>
                
            </form>
        </div>
    </section>

    <section class="background">
        <?php require 'views/partials/footer.php' ?>
    </section>

    <script src="<?php echo constant('URL'); ?>public/js/script.js"></script>
    <script src="<?php echo constant('URL'); ?>public/js/carrito.js"></script>
    <script src="<?php echo constant('URL'); ?>public/js/category.js"></script>
    <script src="<?php echo constant('URL'); ?>public/js/userFunctions.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>