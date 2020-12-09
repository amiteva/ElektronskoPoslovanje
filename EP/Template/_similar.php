<?php
shuffle($product_shuffle);

if($_SERVER['REQUEST_METHOD']=="POST"){
    $Cart -> addToCart($_POST['user_id'], $_POST['item_id']);
}
?>

<section id="best-selling">
    <div class="container py-5">
        <h4 class="font-primary font-size-20">Similar Products</h4>
        <hr>
        <div class="owl-carousel owl-theme">
            <?php foreach ($product_shuffle as $item) {?>
                <div class="item py-2">
                    <div class="product font-primary">
                        <a href="<?php printf('%s?item_id=%s', 'product.php', $item['item_id']) ?>"><img src="<?php echo $item['item_image'] ?? "./assets/products/1.png";?>" alt="product1" class="img-fluid"></a>
                        <div class="text-center">
                            <h6><?php echo $item['item_name'] ?? "Unknown";?></h6>
                            <div class="rating text-warning font-size-12">
                                <?php
                                for( $x = 0; $x < 5; $x++ )
                                {
                                    if( floor( $item['item_rating'])-$x >= 1 )
                                    { echo '<span><i class="fas fa-star"></i></span>'; }
                                    else
                                    { echo '<span><i class="far fa-star"></i></span>'; }
                                }
                                ?>
                            </div>
                            <div class="price py-2">
                                <span><?php echo $item['item_price'] ?? 0;?><i class="fas fa-euro-sign"></i></span>
                            </div>
                            <form method="post">
                                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? 1; ?>">
                                <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                                <?php
                                if(in_array($item['item_id'],$Cart->getCartId($product->getData('cart'))??[])){
                                    echo '<button type="submit" disabled class="btn btn-success font-size-12">In The Cart</button>';
                                }else{
                                    echo '<button type="submit" name="best_selling_submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
</section>