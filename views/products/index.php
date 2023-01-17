<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="shortcut icon" href="<?php echo constant('IMG'); ?>nav/logo.png">
    <title><?php echo $this->category; ?> | Del Plata Indumentaria</title>
</head>

<body>
    
    <?php require 'views/partials/header.php'; ?>

    <section class="sec-prods">
        <div class="div-prods">
            <div class="texto">
                <h3 class="title-index"><?php echo $this->category; ?></h3>
            </div>

            <div class="productos catProd" >
                
                <?php
                $items = $this->item;
                
                if ($items != null) {
                    foreach ($items as $item) {
                        include('views/partials/items.php');
                    }
                }  else {
                    ?><div style="width: 100%"><p class="center error"><?php echo $this->errorMessage; ?></p></div><?php
                }

                ?>

            </div>
        </div>
    </section>

    <div class="container-pagination">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                
                <li class="page-item
                <?php echo $_GET['pagina'] <= 1 ? 'disabled' : '' ?>
                ">
                    <a class="page-link page-link-color" 
                       href="<?php echo constant('URL'); ?>Category/Categoria?category=<?php echo $this->categoryActual; ?>&pagina=<?php echo $_GET['pagina']-1; ?>">
                        Anterior
                    </a>
                </li>

                <?php for($i=0; $i<$this->paginas; $i++): ?>
                    <li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : ''  ?>">
                    <a class="page-link page-link-color" href="<?php echo constant('URL'); ?>Category/Categoria?category=<?php echo $this->categoryActual; ?>&pagina=<?php echo $i+1 ?>">
                        <?php echo $i+1 ?>
                    </a>
                </li>
                <?php endfor ?>

                <li class="page-item
                <?php echo $_GET['pagina'] >= $this->categoryActual ? 'disabled' : '' ?>
                ">
                <a class="page-link page-link-color" 
                    href="<?php echo constant('URL'); ?>Category/Categoria?category=<?php echo $this->categoryActual; ?>&pagina=<?php echo $_GET['pagina']+1; ?>">
                     Siguiente
                </a>
                </li>

            </ul>
        </nav>
    </div>


    <?php require 'views/partials/footer.php'; ?>


    <script src="<?php echo constant('URL'); ?>public/js/script.js"></script>
    <script src="<?php echo constant('URL'); ?>public/js/carrito.js"></script>
    <script src="<?php echo constant('URL'); ?>public/js/category.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>