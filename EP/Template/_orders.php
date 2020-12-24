<?php
shuffle($order_shuffle);
?>
<section id="list-sellers" class="mb-4">
    <div class="container mt-4 text-center">
        <?php foreach ($order_shuffle as $orders) {
            $name = $order->getProduct($orders['item_name'])?>
            <li><?php echo $name['item_name']; ?></li>
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