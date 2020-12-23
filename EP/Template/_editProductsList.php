<?php
shuffle($product_shuffle_all);
?>
<section id="list-products" class="mb-4">
    <div class="container mt-4 text-center">
        <?php foreach ($product_shuffle_all as $prod) {?>
            <li><a href="<?php printf('%s?product_id=%s', 'editProduct.php', $prod['item_id']) ?>"><?php echo $prod['item_name'] ?? "Unknown"; ?></a></li>
        <?php }?>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
</section>