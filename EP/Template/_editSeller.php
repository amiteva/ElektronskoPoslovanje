<?php
$seller_id = $_GET['seller_id'] ?? 1;

foreach($seller->getSellers() as $sel):
    if($sel['usersId']  == $seller_id):
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
                .editSellerProfile-form {
                    width: 400px;
                    margin: 0 auto;
                    padding: 30px 0;
                }
                .editSellerProfile-form form {
                    color: #999;
                    border-radius: 3px;
                    margin-bottom: 15px;
                    background: #fff;
                    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                    padding: 30px;
                }
                .editSellerProfile-form h2 {
                    color: #333;
                    font-weight: bold;
                    margin-top: 0;
                }
                .editSellerProfile-form hr {
                    margin: 0 -30px 20px;
                }
                .editSellerProfile-form .form-group {
                    margin-bottom: 20px;
                }
                .editSellerProfile-form label {
                    font-weight: normal;
                    font-size: 14px;
                }
                .editSellerProfile-form .form-control {
                    min-height: 38px;
                    box-shadow: none !important;
                }
                .editSellerProfile-form .input-group-addon {
                    max-width: 42px;
                    text-align: center;
                }
                .editSellerProfile-form .btn, .signup-form .btn:active {
                    font-size: 16px;
                    font-weight: bold;
                    background: #003859 !important;
                    border: none;
                    min-width: 140px;
                }
                .editSellerProfile-form .btn:hover, .signup-form .btn:focus {
                    background: #003859 !important;
                }
                .editSellerProfile-form a {
                    color: #fff;
                    text-decoration: underline;
                }
                .editSellerProfile-form a:hover {
                    text-decoration: none;
                }
                .editSellerProfile-form form a {
                    color: #003859;
                    text-decoration: none;
                }
                .editSellerProfile-form form a:hover {
                    text-decoration: underline;
                }
                .editSellerProfile-form .fa {
                    font-size: 21px;
                }
                .editSellerProfile-form .fa-paper-plane {
                    font-size: 18px;
                }
                .editSellerProfile-form .fa-check {
                    color: #fff;
                    left: 17px;
                    top: 18px;
                    font-size: 7px;
                    position: absolute;
                }
                .editSellerProfile-form .fa-cog {
                    font-size: 18px;
                }
            </style>


            <div class="editSellerProfile-form">
                <form action="Template/includes/edit-seller-profile.inc.php" method="post">
                    <h2>Edit The Seller's Profile</h2>
                    <p style="font-size: 14px; ">Please fill in the blanks that You wish to update!</p>
                    <hr>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
					<span class="input-group-text">
						<span class="fa fa-portrait"></span>
					</span>
                            </div>
                            <input type="text" class="form-control" name="name" value="<?php echo $sel['usersName'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-paper-plane"></i>
					</span>
                            </div>
                            <input type="email" class="form-control" name="email" value="<?php echo $sel['usersEmail'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
					<span class="input-group-text">
						<span class="fa fa-user"></span>
					</span>
                            </div>
                            <input type="text" class="form-control" name="uid" value="<?php echo $sel['usersUid'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-lock"></i>
					</span>
                            </div>
                            <input type="password" class="form-control" name="pwd" placeholder="New Password" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-lock"></i>
						<i class="fa fa-check"></i>
					</span>
                            </div>
                            <input type="password" class="form-control" name="pwdrepeat" placeholder="Confirm New Password" required="required">
                        </div>
                    </div>
                    <input type="hidden" class="form-control" name="sellerID" value="<?php echo $seller_id ?>">
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary btn-lg">Update</button>
                    </div>
                </form>
                <?php if($sel['userStatus']==1){?>
                <form action="Template/includes/edit-seller-profile.inc.php" method="post">
                <input type="hidden" class="form-control" name="sellerID" value="<?php echo $seller_id ?>">
                <div class="form-group">
                    <button type="submit" name="deac" class="btn btn-primary btn-lg">Deactivate</button>
                </div>
                </form>
                <?php }else{?>
                <form action="Template/includes/edit-seller-profile.inc.php" method="post">
                    <input type="hidden" class="form-control" name="sellerID" value="<?php echo $seller_id ?>">
                    <div class="form-group">
                        <button type="submit" name="act" class="btn btn-primary btn-lg">Activate</button>
                    </div>
                </form>
                <?php } ?>
                <div class="text-center" style="color: red">
                    <?php
                    if(isset($_GET["error"])){
                        if($_GET["error"] == "emptyinput"){
                            echo "<p>You did not update any information</p>";
                        }
                        else if($_GET["error"] == "invaliduid"){
                            echo "<p>Make sure your username consists of only letters and numbers</p>";
                        }
                        else if($_GET["error"] == "passwordsdontmatch"){
                            echo "<p>Passwords don't match</p>";
                        }
                        else if($_GET["error"] == "stmtfailed"){
                            echo "<p>Oops. Something went wrong</p>";
                        }
                        else if($_GET["error"] == "usernametaken"){
                            echo "<p>Username or Email already taken</p>";
                        }
                        else if($_GET["error"] == "none"){
                            echo "<p>You have succesffully updated Your profile!</p>";
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
if ($_GET["error"] == "none") :?>
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
            .editSellerProfile-form {
                width: 400px;
                margin: 0 auto;
                padding: 30px 0;
            }
            .editSellerProfile-form form {
                color: #999;
                border-radius: 3px;
                margin-bottom: 15px;
                background: #fff;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                padding: 30px;
            }
            .editSellerProfile-form h2 {
                color: #333;
                font-weight: bold;
                margin-top: 0;
            }
            .editSellerProfile-form hr {
                margin: 0 -30px 20px;
            }
            .editSellerProfile-form .form-group {
                margin-bottom: 20px;
            }
            .editSellerProfile-form label {
                font-weight: normal;
                font-size: 14px;
            }
            .editSellerProfile-form .form-control {
                min-height: 38px;
                box-shadow: none !important;
            }
            .editSellerProfile-form .input-group-addon {
                max-width: 42px;
                text-align: center;
            }
            .editSellerProfile-form .btn, .signup-form .btn:active {
                font-size: 16px;
                font-weight: bold;
                background: #003859 !important;
                border: none;
                min-width: 140px;
            }
            .editSellerProfile-form .btn:hover, .signup-form .btn:focus {
                background: #003859 !important;
            }
            .editSellerProfile-form a {
                color: #fff;
                text-decoration: underline;
            }
            .editSellerProfile-form a:hover {
                text-decoration: none;
            }
            .editSellerProfile-form form a {
                color: #003859;
                text-decoration: none;
            }
            .editSellerProfile-form form a:hover {
                text-decoration: underline;
            }
            .editSellerProfile-form .fa {
                font-size: 21px;
            }
            .editSellerProfile-form .fa-paper-plane {
                font-size: 18px;
            }
            .editSellerProfile-form .fa-check {
                color: #fff;
                left: 17px;
                top: 18px;
                font-size: 7px;
                position: absolute;
            }
            .editSellerProfile-form .fa-cog {
                font-size: 18px;
            }
        </style>


        <div class="editSellerProfile-form">
            <form action="Template/includes/edit-seller-profile.inc.php" method="post">
                <h2>Edit The Seller's Profile</h2>
                <p style="font-size: 14px; ">Please fill in the blanks that You wish to update!</p>
                <hr>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
					<span class="input-group-text">
						<span class="fa fa-portrait"></span>
					</span>
                        </div>
                        <input type="text" class="form-control" name="name" value="<?php echo $sel['usersName'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-paper-plane"></i>
					</span>
                        </div>
                        <input type="email" class="form-control" name="email" value="<?php echo $sel['usersEmail'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
					<span class="input-group-text">
						<span class="fa fa-user"></span>
					</span>
                        </div>
                        <input type="text" class="form-control" name="uid" value="<?php echo $sel['usersUid'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-lock"></i>
					</span>
                        </div>
                        <input type="password" class="form-control" name="pwd" placeholder="New Password" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-lock"></i>
						<i class="fa fa-check"></i>
					</span>
                        </div>
                        <input type="password" class="form-control" name="pwdrepeat" placeholder="Confirm New Password" required="required">
                    </div>
                </div>
                <input type="hidden" class="form-control" name="sellerID" value="<?php echo $seller_id ?>">
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg">Update</button>
                </div>
            </form>
            <div class="text-center" style="color: red">
                <?php
                if(isset($_GET["error"])){
                    if($_GET["error"] == "emptyinput"){
                        echo "<p>You did not update any information</p>";
                    }
                    else if($_GET["error"] == "invaliduid"){
                        echo "<p>Make sure your username consists of only letters and numbers</p>";
                    }
                    else if($_GET["error"] == "passwordsdontmatch"){
                        echo "<p>Passwords don't match</p>";
                    }
                    else if($_GET["error"] == "stmtfailed"){
                        echo "<p>Oops. Something went wrong</p>";
                    }
                    else if($_GET["error"] == "usernametaken"){
                        echo "<p>Username or Email already taken</p>";
                    }
                    else if($_GET["error"] == "none"){
                        echo "<p>You have succesffully updated Your profile!</p>";
                    }
                }
                ?>
            </div>
        </div>
        <br>
        <br>
        <br>
    </section>
<?php endif;?>