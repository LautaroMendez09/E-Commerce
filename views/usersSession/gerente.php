<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo constant('IMG'); ?>nav/logo.png">
    <title>Gerente | Del Plata Indumentaria</title>
</head>

<body>
    <?php require 'views/partials/header.php'; ?>


    <section class="background">

        <h2 class="subtitle-index">Información de la cuenta</h2>

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


        <h2 class="title-index">Panel administrador</h2>

        <div class="container-dashboard">
            <ul class="ul-dashboard">

                <li class="li-dashboard li-dashboard-admin"><a class="a-dashboard a-dashboard-admin no-seleccion" onclick="filterTools('administracionDeProductos')">Administración de productos</a></li>
                <li class="li-dashboard li-dashboard-admin"><a class="a-dashboard a-dashboard-admin no-seleccion" onclick="filterTools('administracionDeProveedores')">Administración de proveedores</a></li>
                <li class="li-dashboard li-dashboard-admin"><a class="a-dashboard a-dashboard-admin no-seleccion" onclick="filterTools('historialDeCompras')">Historial de compras</a></li>

            </ul>
        </div>


        <div class="panelAdminTool panelAdminToolHide administracionDeProductos" id="admProduct">

        </div>

        <div class="panelAdminTool panelAdminToolHide administracionDeProveedores" id="admProveedores">

        </div>

        <div class="panelAdminTool panelAdminToolHide historialDeCompras" id="histCompras">

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
    <script src="<?php echo constant('URL'); ?>public/js/panelAdminJS/admProduct.js"></script>
    <script src="<?php echo constant('URL'); ?>public/js/panelAdminJS/admProveedores.js"></script>
    <script src="<?php echo constant('URL'); ?>public/js/panelAdminJS/histCompras.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>