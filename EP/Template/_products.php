<?php
    $item_id = $_GET['item_id'] ?? 1;
    $user_id = $_SESSION['userid'] ?? 1;

    if($_SERVER['REQUEST_METHOD']=="POST"){
        if(isset($_POST['products_submit'])){
            $Cart -> addToCart('user_id', $_POST['item_id']);
        }
    }

    foreach($product->getData() as $item):
        if($item['item_id']  == $item_id):
?>

<section id="product" class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img src="<?php echo $item['item_image'] ?? ".assets/products/1.png"?>" alt="product" class="img-fluid">
                <div class="form-row pt-4 font-size-16 font-primary">
                    <div class="col">
                        <button type="submit" class="btn btn-danger form-control">Proceed to buy</button>
                    </div>
                    <div class="col">
                        <form method="post">
                            <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? 1; ?>">
                            <input type="hidden" name="user_id" value="<?php
                            if (isset($_SESSION["useruid"])) {
                                echo $_SESSION["userid"] ?? 1;
                            }?>">
                            <?php
                            if(in_array($item['item_id'],$Cart->getCartId($product->getData('cart'))??[])){
                                echo '<button type="submit" disabled class="btn btn-success font-size-16 form-control">In The Cart</button>';
                            }else{
                                echo '<button type="submit" name="products_submit" class="btn btn-warning font-size-16 form-control">Add to Cart</button>';
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 py-5">
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
                <hr class="m-0">
                <table class="my-3">
                    <tr class="font-primary font-size-14">
                        <td>MSRP:</td>
                        <td><span style="text-decoration: line-through;"><?php echo $item['item_msrp'] ?? 0?></span> <i class="fas fa-euro-sign"></i></td>
                    </tr>
                    <tr class="font-primary font-size-14">
                        <td>Top Deal:</td>
                        <td class="font-size-20 text-danger"><span><?php echo $item['item_price'] ?? 0?></span> <i class="fas fa-euro-sign"></i></td>
                    </tr>
                    <tr class="font-primary font-size-14">
                        <td>You save:</td>
                        <td class="font-size-14 text-danger"><span><?php echo $item['item_msrp']-$item['item_price'] ?? 0?></span> <i class="fas fa-euro-sign"></i></td>
                    </tr>
                </table>
                <div class="policy">
                    <div class="d-flex">
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2 color-secondary">
                                <span class="fas fa-retweet border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-primary font-size-12">10 days<br>Return</a>
                        </div>
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2 color-secondary">
                                <span class="fas fa-truck border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-primary font-size-12">Next Day<br>Delivery</a>
                        </div>
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2 color-secondary">
                                <span class="fas fa-check-double border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-primary font-size-12">1 year<br>Warranty</a>
                        </div>
                    </div>
                </div>
                <hr>
                <div id="order-details" class="font-primary d-flex flex-column text-wrap">
                    <small>Delivery By: Dec 10 - Dec 14</small>
                    <br>
                    <small><i class="fas fa-map-marker color-primary"></i>&nbsp;&nbsp;Deliver to Customer - 7000</small>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="color my-3">
                            <div class="d-flex justify-content-between">
                                <h6 class="font-primary">Color:</h6>
                                <div class="p-2 rounded-circle" style="background: whitesmoke"><button class="btn font-size-14"></button></div>
                                <div class="p-2 rounded-circle" style="background: gray"><button class="btn font-size-14"></button></div>
                                <div class="p-2 rounded-circle" style="background: black"><button class="btn font-size-14"></button></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">

                    </div>
                </div>
            </div>
            <div class="col-12 mt-4">
                <h6>Product Description:</h6>
                <hr>
                <p class="font-size-14 font-primary"><?php echo $item['item_desc'] ?? "Unknown"?></p>
            </div>
        </div>
    </div>
</section>

<?php
        endif;
    endforeach;
?>