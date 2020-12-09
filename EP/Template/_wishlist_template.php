<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['delete-wishlist-submit'])){
            $deletedrecord = $Cart->deleteCart($_POST['item_id'], 'wishlist');
        }
        if(isset($_POST['cart-submit'])){
           $Cart->saveForLater($_POST['item_id'],'cart','wishlist');
        }
}
?>

<section id="cart" class="py-3">
    <div class="container-fluid w-75">
        <h5 class="font-primary font-size-20">Wishlist</h5>
        <div class="row">
            <div class="col-sm-9">
                <?php
                foreach($product->getData('wishlist') as $item):
                    $cart = $product->getProduct($item['item_id']);
                    $subTotal[] = array_map(function ($item){
                        ?>
                        <div class="row border-top py-3 mt-3">
                            <div class="col-sm-2">
                                <img src="<?php echo $item['item_image'] ?? "./assets/products/1.png" ?>" alt="cart1" class="img-fluid" style="height: 120px">
                            </div>
                            <div class="col-sm-8">
                                <h5 class="font-primary font-size-20"><?php echo $item['item_name'] ?? "Unknown"?></h5>
                                <small>type: <?php echo $item['item_brand'] ?? "Brand"?></small>
                                <div class="d-flex">
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
                                    <a href="#" class="px-2 font-primary font-size-14"><?php echo $item['item_nr'] ?? 0?> ratings</a>
                                </div>
                                <div class="qty d-flex pt-2">
                                    <form method="post">
                                        <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id">
                                        <button type="submit" name="delete-wishlist-submit" class="btn font-primary text-danger pl-0 pr-3 border-right">Delete</button>
                                    </form>
                                    <form method="post">
                                        <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id">
                                        <button type="submit" name="cart-submit" class="btn font-primary text-danger">Add to cart</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-sm-2 text-right ">
                                <div class="font-size-20 text-danger font-primary">
                                    <span class="product_price" data-id="<?php echo $item['item_id'] ?? 0; ?>"><?php echo $item['item_price'] ?? 0?></span> <i class="fas fa-euro-sign"></i>
                                </div>
                            </div>
                        </div>
                        <?php
                        return $item['item_price'];
                    },$cart);
                endforeach;
                ?>
            </div>
        </div>
    </div>
</section>