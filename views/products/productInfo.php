<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo constant('IMG'); ?>nav/logo.png">
    <title><?php echo $this->item['name']; ?> | Del Plata Indumentaria</title>
</head>
<body id="bodyProductInfo">
    
    <?php require 'views/partials/header.php'; ?>

    <div class="horizontal-division division-productCard"></div>
    <div class="container-productCard" id="container-productCard-id">
        <input type="hidden" value="<?php echo $this->item['id']; ?>">
        <div class="productCard-image"><img class="productCard-img" src="<?php echo constant('IMG'); ?>productos/<?php echo $this->item['image']; ?>" alt=""></div>
        <div class="productCard-info">
            <h2 class="productCard-title"><?php echo $this->item['name']; ?></h2>
            <div class="productCard-containerInfo">
                
                <div class="productCard-price">US$ <?php echo $this->item['price']; ?></div>

                <div class="productCard-btnAmount">
                    <p class="productCard-titleInfo">Cantidad:</p>

                    <div class="productCard-container-amount">
                        <div class="productCard-containerBtn btn-add-productInfo"><i class="btn-productInfo fa-regular fa-plus icon-productCard"></i></div>
                        <div id="productCard-amount"></div>
                        <div class="productCard-containerBtn btn-remove-productInfo"><i class="btn-productInfo fa-solid fa-minus icon-productCard"></i></div>  
                    </div>
                </div>

                <div class="productCard-description">
                    <p class="productCard-titleInfo">Descripción:</p>
                    <div class="productCard-containerDescription">
                        <p class="productInfo-description"><?php echo $this->item['description']; ?></p>
                    </div>
                </div>
                
                <div class="productCard-share">
                    <div class="horizontal-division"></div>
                    <div class="productCard-containerShare">Compartir
                        <div class="productCard-socialMedias">
                            <a href="https://api.whatsapp.com/send?text=<?php echo constant('URLACTUAL'); ?>" target="_blank"><i class="fa-brands fa-whatsapp productInfo-socialMedia"></i></a>
                            <a href="http://www.facebook.com/sharer.php?u=<?php echo constant('URLACTUAL'); ?>&t=<?php echo $this->item['name']; ?>" target="_blank" ><i class="fa-brands fa-facebook-f productInfo-socialMedia"></i></a>
                            <a href="https://twitter.com/intent/tweet?text=<?php echo $this->item['name']; ?>&url=<?php echo constant('URLACTUAL'); ?>&via=proyecto3bh&hashtags=#proyecto3bh" target="_blank"><i class="fa-brands fa-twitter productInfo-socialMedia"></i></a>
                            <a href="http://www.linkedin.com/shareArticle?url=<?php echo constant('URLACTUAL'); ?>" target="_blank"><i class="fa-brands fa-linkedin-in productInfo-socialMedia"></i></i></a>
                        </div>
                    </div>
                    <div class="horizontal-division"></div>
                </div>

            </div>

            
        </div>
    </div>
    <div class="horizontal-division division-productCard"></div>

    


    <?php require 'views/partials/footer.php'; ?>  

    <script src="<?php echo constant('URL'); ?>public/js/script.js"></script>
    <script src="<?php echo constant('URL'); ?>public/js/carrito.js"></script>
    <script src="<?php echo constant('URL'); ?>public/js/category.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>