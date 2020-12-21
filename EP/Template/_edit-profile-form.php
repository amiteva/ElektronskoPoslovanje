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
        .editProfile-form {
            width: 400px;
            margin: 0 auto;
            padding: 30px 0;
        }
        .editProfile-form form {
            color: #999;
            border-radius: 3px;
            margin-bottom: 15px;
            background: #fff;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }
        .editProfile-form h2 {
            color: #333;
            font-weight: bold;
            margin-top: 0;
        }
        .editProfile-form hr {
            margin: 0 -30px 20px;
        }
        .editProfile-form .form-group {
            margin-bottom: 20px;
        }
        .editProfile-form label {
            font-weight: normal;
            font-size: 14px;
        }
        .editProfile-form .form-control {
            min-height: 38px;
            box-shadow: none !important;
        }
        .editProfile-form .input-group-addon {
            max-width: 42px;
            text-align: center;
        }
        .editProfile-form .btn, .signup-form .btn:active {
            font-size: 16px;
            font-weight: bold;
            background: #003859 !important;
            border: none;
            min-width: 140px;
        }
        .editProfile-form .btn:hover, .signup-form .btn:focus {
            background: #003859 !important;
        }
        .editProfile-form a {
            color: #fff;
            text-decoration: underline;
        }
        .editProfile-form a:hover {
            text-decoration: none;
        }
        .editProfile-form form a {
            color: #003859;
            text-decoration: none;
        }
        .editProfile-form form a:hover {
            text-decoration: underline;
        }
        .editProfile-form .fa {
            font-size: 21px;
        }
        .editProfile-form .fa-paper-plane {
            font-size: 18px;
        }
        .editProfile-form .fa-check {
            color: #fff;
            left: 17px;
            top: 18px;
            font-size: 7px;
            position: absolute;
        }
        .editProfile-form .fa-cog {
            font-size: 18px;
        }
    </style>


    <div class="editProfile-form">
        <form action="Template/includes/edit-profile.inc.php" method="post">
            <h2>Edit Your Profile</h2>
            <p style="font-size: 14px; ">Please fill in the blanks that You wish to update!</p>
            <hr>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
					<span class="input-group-text">
						<span class="fa fa-portrait"></span>
					</span>
                    </div>
                    <input type="text" class="form-control" name="name" value="<?php echo $_SESSION['username'] ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-paper-plane"></i>
					</span>
                    </div>
                    <input type="email" class="form-control" name="email" value="<?php echo $_SESSION['useremail'] ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
					<span class="input-group-text">
						<span class="fa fa-user"></span>
					</span>
                    </div>
                    <input type="text" class="form-control" name="uid" value="<?php echo $_SESSION['useruid'] ?>">
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
            <input type="hidden" class="form-control" name="userID" value="<?php echo $_SESSION['userid'] ?>">
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