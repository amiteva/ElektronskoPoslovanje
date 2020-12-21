<?php
shuffle($customer_shuffle);
?>
<section id="list-customers" class="mb-4">
    <div class="container mt-4 text-center">
        <?php foreach ($customer_shuffle as $customer) {?>
            <li><a href="<?php printf('%s?customer_id=%s', 'editCustomer.php', $customer['usersId']) ?>"><?php echo $customer['usersName'] ?? "Unknown"; ?></a></li>
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