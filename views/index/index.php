<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo constant('IMG'); ?>nav/logo.png">
    <title>Página principal | Del Plata Indumentaria</title>
</head>

<body>

    <?php require 'views/partials/header.php'; ?>

    <div id="resul">

    </div>
    <section id="sec-inicio">
        <section id="sec-banner">
            <div id="banner">
                <video width="1920" height="1080" class="banner-vid" muted autoplay="autoplay" loop="loop" src="public/img/banner/cinematica.mp4"></video>
            </div>
        </section>

        <section id="sec-topventas">
            <div class="div-prods">
                <div class="texto">
                    <h2 class="title-index">TOP VENTAS</h2>
                    <p>Lo más vendido</p>
                </div>

                <div class="productos">

                    <?php
                    $response = json_decode(file_get_contents('http://localhost/proyecto3BCFinal/apiProductos/apiProd?categoria=topventas'), TRUE);

                    if ($response['statuscode'] == 200) {
                        foreach ($response['items'] as $item) {
                            include('views/partials/items.php');
                        }
                    } else {
                        echo $response['response'];
                    }
                    ?>

                </div>
    
            </div>
        </section>

        <div class="index-divi"></div>

        <section id="sec-cat">
            <div class="container-cat">
                <div class="banner-cat">
                    <div class="divimg-cat">
                        <img class="img-cat" src="<?php echo constant('IMG'); ?>cats_index/manIndex.jpg" alt="">
                    </div>
                    <div class="hover-cat categoryClick" id="hombre">
                        <a class="a-cat">HOMBRE</a>
                    </div>
                </div>
            </div>
            <div class="container-cat">
                <div class="banner-cat">
                    <div class="divimg-cat">
                        <img class="img-cat" src="<?php echo constant('IMG'); ?>cats_index/womanIndex.jpg" alt="">
                    </div>
                    <div class="hover-cat categoryClick" id="mujer">
                        <a class="a-cat">MUJER</a>
                    </div>
                </div>
            </div>
            <div class="container-cat">
                <div class="margin-catS">
                    <div class="banner-catS">
                        <div class="divimg-cat">
                            <img class="img-catS" src="<?php echo constant('IMG'); ?>cats_index/kidIndex.jpg" alt="">
                        </div>
                        <div class="hover-cat categoryClick" id="ninio">
                            <a class="a-cat">NIÑO</a>
                        </div>
                    </div>
                </div>
                <div class="margin-catS">
                    <div class="banner-catS">
                        <div class="divimg-cat">
                            <img class="img-catS" src="<?php echo constant('IMG'); ?>cats_index/accessoriesIndex.jpg" alt="">
                        </div>
                        <div class="hover-cat categoryClick" id="accesorios">
                            <a class="a-cat">ACCESORIOS</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <div class="index-divi"></div>

        <section id="sec-nuevosproductos">
            <div class="div-prods">
                <div class="texto">
                    <h2 class="title-index" id="title-np">NUEVOS PRODUCTOS</h2>
                </div>
                <div class="productos">
                    <?php
                    $response = json_decode(file_get_contents('http://localhost/proyecto3BCFinal/apiProductos/apiProd?categoria=nvproductos'), TRUE);

                    if ($response['statuscode'] == 200) {
                        foreach ($response['items'] as $item) {
                            include('views/partials/items.php');
                        }
                    } else {
                        echo $response['response'];
                    }
                    ?>
                </div>

            </div>
        </section>

    </section>

    <?php require 'views/partials/footer.php'; ?>


    <script src="<?php echo constant('URL'); ?>public/js/script.js"></script>
    <script src="<?php echo constant('URL'); ?>public/js/carrito.js"></script>
    <script src="<?php echo constant('URL'); ?>public/js/category.js"></script>
    <script src="<?php echo constant('URL'); ?>public/js/apiBusqueda.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>