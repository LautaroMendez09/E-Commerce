<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo constant('IMG'); ?>nav/logo.png">
    <title>Nosotros | Del Plata Indumentaria</title>
</head>

<body>

    <?php require 'views/partials/header.php'; ?>

    <section class="background pagInfo">
        <div class="container-pagInfo">
            <h3 class="title-index">Nostros</h3>
            <div class="container-text-pagInfo">
                <p class="text-pagInfo">
                    Nacidos en Uruguay. Llevamos impulsando la natación, water polo, y otros deportes acuáticos desde 2011 a través de innovación y desarrollo de nuevos productos.
                    <br>
                    <br>
                    Nos consideramos una marca con personalidad, reconocida por sus diseños transgresores y con una filosofía muy marcada.
                    <br>
                    <br>
                    Nos une nuestro amor por el agua y somos incansables en nuestra misión por lograr la excelencia y la mejor calidad en todo lo que hacemos.
                    <br>
                    <br>
                    Porque la natación hace que todo sea mejor.
                </p>
            </div>
            <h3 class="title-index">Producción local</h3>
            <div class="container-text-pagInfo">
                <p class="text-pagInfo">
                    Todos nuestros bañadores están diseñados y fabricados localmente en Uruguay. Cada producto Turbo cuenta la historia de cien pares de manos, habilidad, experiencia y artesanía.
                    <br>
                    <br>
                    Hemos construido una familia con nuestros colaboradores, creadores y proveedores, desarrollando relaciones estrechas y compartiendo nuestra pasión por desarrollar productos de la mejor calidad.
                    <br>
                    <br>
                    Fabricamos la gran mayoría de nuestros bañadores bajo demanda para evitar la sobreproducción y así reducir el stock que no sea imprescindible. Tenemos un compromiso absoluto con el medio ambiente y el objetivo de reducir la huella de carbono lo máximo posible.
                </p>
            </div>
        </div>
    </section>

    <section class="background">
        <div style="margin-top: 300px">
            <?php require 'views/partials/footer.php'; ?>
        </div>
    </section>

    <script src="<?php echo constant('URL'); ?>public/js/script.js"></script>
    <script src="<?php echo constant('URL'); ?>public/js/carrito.js"></script>
    <script src="<?php echo constant('URL'); ?>public/js/category.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>