
<div class="box">
    <input type="hidden" id="id" value="<?php echo $item['id']; ?>">
    <div class="preview">
        <a class="productInfoDirection"><img src="<?php echo constant('IMG'); ?>productos/<?php echo $item['imagen']; ?>" alt=""></a>
    </div>
    <div class="prod-todo">
        <div class="prod-info">
            <input type="hidden" id="id" value="<?php echo $item['id']; ?>">
            <div class="producto-info"><a class="productInfoDirection nameProductCard"><?php echo $item['nombre']; ?></a></div>
            <div class="producto-precio"><span>$<?php echo $item['precio']; ?></span></div>
        </div>
        <div class="prod-carrito botones">
            <div class="carrito-prod">
                <i class="fa-solid fa-cart-shopping"></i>
            </div>
        </div>
    </div>
</div>


