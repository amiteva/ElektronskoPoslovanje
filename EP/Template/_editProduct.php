<?php
$product_id = $_GET['product_id'] ?? 1;

foreach($product->getData() as $pro):
    if($pro['item_id']  == $product_id):
        ?>
        <section class="mt-4">
            <style>
                body {
                    color: #fff;
                    background: whitesmoke;
                    font-family: 'Montserrat';
                }
                .form-control {
                    font-size: 14px;
                }
                .form-control, .form-control:focus, .input-group-text {
                    border-color: #e1e1e1;
                }
                .form-control, .btn {
                    border-radius: 3px;
                }
                .signup-form {
                    width: 400px;
                    margin: 0 auto;
                    padding: 30px 0;
                }
                .signup-form form {
                    color: #999;
                    border-radius: 3px;
                    margin-bottom: 15px;
                    background: #fff;
                    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                    padding: 30px;
                }
                .signup-form h2 {
                    color: #333;
                    font-weight: bold;
                    margin-top: 0;
                }
                .signup-form hr {
                    margin: 0 -30px 20px;
                }
                .signup-form .form-group {
                    margin-bottom: 20px;
                }
                .signup-form label {
                    font-weight: normal;
                    font-size: 14px;
                }
                .signup-form .form-control {
                    min-height: 38px;
                    box-shadow: none !important;
                }
                .signup-form .input-group-addon {
                    max-width: 42px;
                    text-align: center;
                }
                .signup-form .btn, .signup-form .btn:active {
                    font-size: 16px;
                    font-weight: bold;
                    background: #003859 !important;
                    border: none;
                    min-width: 140px;
                }
                .signup-form .btn:hover, .signup-form .btn:focus {
                    background: #003859 !important;
                }
                .signup-form a {
                    color: #fff;
                    text-decoration: underline;
                }
                .signup-form a:hover {
                    text-decoration: none;
                }
                .signup-form form a {
                    color: #003859;
                    text-decoration: none;
                }
                .signup-form form a:hover {
                    text-decoration: underline;
                }
                .signup-form .fa {
                    font-size: 21px;
                }
                .signup-form .fa-paper-plane {
                    font-size: 18px;
                }
                .signup-form .fa-check {
                    color: #fff;
                    left: 17px;
                    top: 18px;
                    font-size: 7px;
                    position: absolute;
                }
                .sellerAddProduct-form .fa-cog {
                    font-size: 18px;
                }
            </style>


            <div class="signup-form">
                <form action="Template/includes/edit-products-info.inc.php" method="post">
                    <h2>Edit the Product Information</h2>
                    <p style="font-size: 14px; ">Please fill in this form to add a new product!</p>
                    <hr>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
					<span class="input-group-text">
						<span class="fa fa-cog"></span>
					</span>
                            </div>
                            <input type="text" class="form-control" name="name" value="<?php echo $pro["item_name"] ?>" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-cog"></i>
					</span>
                            </div>
                            <input type="text" class="form-control" name="brand" value="<?php echo $pro["item_brand"] ?>" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
					<span class="input-group-text">
						<span class="fa fa-cog"></span>
					</span>
                            </div>
                            <input type="number" step="0.01" class="form-control" name="price" value="<?php echo $pro["item_price"] ?>" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-cog"></i>
					</span>
                            </div>
                            <input type="number" step="0.01" class="form-control" name="msrp" value="<?php echo $pro["item_msrp"] ?>" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-cog"></i>
					</span>
                            </div>
                            <input type="text" class="form-control" name="description" value="<?php echo $pro["item_desc"] ?>" required="required">
                        </div>
                    </div>
                    <input type="hidden" class="form-control" name="itemid" value="<?php echo $product_id ?>" required="required">
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary btn-lg">Edit the Product</button>
                    </div>
                </form>
                <form action="Template/includes/edit-products-info.inc.php" method="post">
                    <input type="hidden" class="form-control" name="itemid" value="<?php echo $product_id ?>">
                    <div class="form-group">
                        <button type="submit" name="delete" class="btn btn-primary btn-lg">Delete product</button>
                    </div>
                </form>
                <?php
                if(isset($_GET["error"])){
                    if($_GET["error"] == "emptyinput"){
                        echo "<p>Fill in all fields</p>";
                    }
                    else if($_GET["error"] == "stmtfailed"){
                        echo "<p>Ups. Something went wrong</p>";
                    }
                }
                ?>
            </div>
            </div>
            <br>
            <br>
            <br>
        </section>
    <?php
    endif;
endforeach;