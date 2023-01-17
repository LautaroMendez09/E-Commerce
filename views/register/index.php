<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>public/css/login.css"/>
    <script src="https://kit.fontawesome.com/6fd495b4a6.js" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="shortcut icon" href="<?php echo constant('IMG'); ?>nav/logo.png">
    <title>Registrate | Del Plata Indumentaria</title>
</head>

<body>

    <?php require 'views/partials/header.php' ?>

    <section class="background" id="sec-register">
        <div id="container-register">
            <form class="form" id="form-register" action="" method="POST">
                
                <p id="register-title">Completa los campos</p>
                
                <div class="division division-register"></div>

                <div id="container-inps-register">

                    <div class="inps-half">
                        <input class="inp-reg small" type="name" placeholder="Nombre" name="user_name">
                        <input class="inp-reg small" type="surname" placeholder="Apellido" name="user_surname">
                    </div>
                    <input class="inp-reg" type="email" placeholder="Correo electrónico" name="user_email">
                    <input class="inp-reg" type="password" placeholder="Contraseña" name="password">
                </div>

                <div class="division division-register"></div>

                <div class="container-captcha">
                    <div class="g-recaptcha" data-sitekey="<?php echo constant('reCAPTCHA_site_key'); ?>"></div>
                </div>

                <div style="display: flex;">
                    <button class="button button-log-reg btn-reg-reg" type="submit">Registrarse</button>
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