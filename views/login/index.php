<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>public/css/login.css"/>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="shortcut icon" href="<?php echo constant('IMG'); ?>nav/logo.png">
    <title>Ingresa | Del Plata Indumentaria</title>
</head>

<body>

    <?php require 'views/partials/header.php'; ?>

    <section class="background" id="sec-login">

        <div id="container-login">

            <form class="form" id="form-login" action="" method="POST">

                <p id="login-title">BIENVENIDO</p>

                <div class="division division-login"></div>

                <div class="container-inps-login">
                    <input class="inp-login" type="email" placeholder="Correo Electrónico" name="user_email">
                    <input class="inp-login inp-pass" type="password" placeholder="Contraseña" name="password">

                    <span onclick="showpass()" id="passeye-login"><i class="fa fa-eye-slash" aria-hidden="true"></i></span>
                </div>

                <div id="container-login-forgotPass">
                    <a href="<?php echo constant('URL'); ?>Login/ContraseniaOlvidada">
                        <p class="forgotPass">Olvidé mi contraseña.</p>
                    </a>
                </div>

                <div class="division division-login"></div>

                <div class="container-captcha">
                    <div class="g-recaptcha" data-sitekey="<?php echo constant('reCAPTCHA_site_key'); ?>"></div>
                </div>

                <button class="button button-log-reg" id="btn-login" type="submit">Iniciar Sesión</button>

            </form>

            <form action="<?php echo constant('URL'); ?>register" class="form" method="POST">
                <button class="button button-log-reg btn-reg-reg">Registrate</button>
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