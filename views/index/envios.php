<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo constant('IMG'); ?>nav/logo.png">
    <title>Envíos | Del Plata Indumentaria</title>
</head>

<body>

    <?php require 'views/partials/header.php'; ?>

    <section class="background pagInfo">
        <div class="container-pagInfo">

            <h1 class="title-index">Envíos<i class="fa-solid fa-truck-fast icon-pagInfo"></i></h1>

            <div class="container-text-pagInfo">
                <p class="text-pagInfo">
                    Todos los envíos dentro de Montevideo urbano tienen un costo de U$S 5.
                    Los envíos dentro de Montevideo se realizan de lunes a sábado.
                    Los horarios de entrega dentro de Montevideo son: lunes a viernes de 15:00 a 21:00 y sábados de 13:00 a 19:00.
                    Se procesarán todos los pedidos cuyos comprobantes hayan sido enviados antes de las 12:00 y sábados hasta las 11:00.
                    <br>
                    <br>
                    Los envíos al interior tienen un costo de U$S5 por gestión de despacho, el costo de envío de la agencia no está incluído.
                    Todos los despachos al interior se realizan a las 17hs.
                    Se procesarán todos los pedidos cuyos comprobantes hayan sido enviados antes de las 14:00.
                </p>
            </div>

        </div>
    </section>

    <section class="background">
        <?php require 'views/partials/footer.php'; ?>
    </section>

    <script src="<?php echo constant('URL'); ?>public/js/script.js"></script>
    <script src="<?php echo constant('URL'); ?>public/js/carrito.js"></script>
    <script src="<?php echo constant('URL'); ?>public/js/category.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>