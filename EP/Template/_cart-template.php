<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['delete-cart-submit'])){
            $deletedrecord = $Cart->deleteCart($_POST['item_id'], 'cart', $_SESSION["userid"] ?? 1);
        }
        if(isset($_POST['wishlist-submit'])){
            $Cart->saveForLater($_POST['item_id']);
        }
    }
?>

<section id="cart" class="py-3">
    <div class="container-fluid w-75">
        <h5 class="font-primary font-size-20">Shopping cart</h5>
        <div class="row">
            <div class="col-sm-9">
                <?php
                    foreach($product ->getDataCurrent('cart', $_SESSION["userid"] ?? 1) as $item):
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
                            <div class="d-flex font-primary w-25">
                                <button class="qty-down border bg-light" data-id="<?php echo $item['item_id'] ?? 0; ?>"><i class="fas fa-angle-down"></i></button>
                                <input type="text" class="qty-input border px-2 w-100 bg-light" disabled value="1" placeholder="1" data-id="<?php echo $item['item_id'] ?? 0; ?>">
                                <button class="qty-up border bg-light" data-id="<?php echo $item['item_id'] ?? 0; ?>"><i class="fas fa-angle-up"></i></button>
                            </div>
                            <form method="post">
                                <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id">
                                <button type="submit" name="delete-cart-submit" class="btn font-primary text-danger px-3 border-right">Delete</button>
                            </form>
                            <form method="post">
                                <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id">
                                <button type="submit" name="wishlist-submit" class="btn font-primary text-danger">Save For Later</button>
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
            <div class="col-sm-3">
                <div class="sub-total border text-center mt-2">
                    <h6 class="font-primary font-size-12 text-success py-3"><i class="fas fa-check"></i> You order is eligible for free delivery</h6>
                    <div class="border-top py-4">
                        <h5 class="font-primary font-size-20">Subtotal <?php echo isset($subTotal) ? count($subTotal): 0; ?> item(s): &nbsp;<span class="text-danger"><span class="text-danger" id="deal-price"><?php echo isset($subTotal) ? $Cart->getSum($subTotal): 0 ?></span> <i class="fas fa-euro-sign"></i></span></h5>
                        <h5 class="font-primary font-size-20">Subtotal <?php echo isset($subTotal) ? count($subTotal): 0; ?> item(s): &nbsp;<span class="text-danger"><span class="text-danger" id="deal-price"><?php echo isset($subTotal) ? $Cart->getSum($subTotal): 0 ?></span> <i class="fas fa-euro-sign"></i></span></h5>
                        <button class="btn btn-warning mt-3">Proceed to buy</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>