<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo constant('IMG'); ?>nav/logo.png">
    <title>Tu cuenta | Del Plata Indumentaria</title>
</head>

<body>

    <?php require 'views/partials/header.php'; ?>



    <section class="background">

        <div class="container-dashboard">
            <ul class="ul-dashboard">

                <li class="li-dashboard li-dashboard-user">
                    <a class="a-dashboard a-dashboard-user no-seleccion" onclick="filterTools('datosPersonales')">Datos personales</a>
                </li>
                <li class="li-dashboard li-dashboard-user">
                    <a class="a-dashboard a-dashboard-user no-seleccion" onclick="filterTools('compras')">Compras</a>
                </li>
                <li class="li-dashboard li-dashboard-user">
                    <a class="a-dashboard a-dashboard-user no-seleccion" onclick="filterTools('tuCuenta')">Tu cuenta</a>
                </li>

            </ul>
        </div>

        <?php $user = $this->user; ?>

        <div class="panelAdminTool panelAdminToolHide datosPersonales" id="datoPerso">
            <?php require 'views/partials/panelUser/datosPersonales.php'; ?>
        </div>

        <div class="panelAdminTool panelAdminToolHide compras" id="compras">
            <?php require 'views/partials/panelUser/compras.php'; ?>
        </div>

        <div class="panelAdminTool panelAdminToolHide tuCuenta" id="tuCuenta">
            <?php require 'views/partials/panelUser/cuenta.php'; ?>
        </div>

    </section>

    <section class="background">
        <?php require 'views/partials/footer.php' ?>
    </section>

    <script src="<?php echo constant('URL'); ?>public/js/script.js"></script>
    <script src="<?php echo constant('URL'); ?>public/js/carrito.js"></script>
    <script src="<?php echo constant('URL'); ?>public/js/category.js"></script>
    <script src="<?php echo constant('URL'); ?>public/js/panelUserJS/datosPerso.js"></script>
    <script src="<?php echo constant('URL'); ?>public/js/panelUserJS/accountOptions.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>