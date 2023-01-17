<div class="div-prods">
    <div class="texto">
        <h3 class="title-index">Resultados</h3>
    </div>

    <div class="productos catProd">

        <?php
        $items = $this->items;

        if ($items != null) {
            foreach ($items as $item) {
                include('views/partials/items.php');
            }
        }  /*else {
                    ?><div style="width: 100%"><p class="center error"><?php echo $this->errorMessage; ?></p></div><?php
                }*/

        ?>

    </div>
</div>