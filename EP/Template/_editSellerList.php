<?php
shuffle($seller_shuffle);
?>
<section id="list-sellers" class="mb-4">
    <div class="container mt-4 text-center">
        <?php foreach ($seller_shuffle as $seller) {?>
            <li><a href="<?php printf('%s?seller_id=%s', 'editSeller.php', $seller['usersId']) ?>"><?php echo $seller['usersName'] ?? "Unknown"; ?></a></li>
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