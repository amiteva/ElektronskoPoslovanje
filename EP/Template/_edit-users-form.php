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
    </style>

    <div class="edit-users-form">
        <form action="Template/includes/edit-users.inc.php" method="post">
            <h2>Sign Up</h2>
            <p style="font-size: 14px; ">Please fill in this form to create an account!</p>
            <hr>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
					<span class="input-group-text">
						<span class="fa fa-portrait"></span>
					</span>
                    </div>
                    <input type="text" class="form-control" name="name" placeholder="Full Name" required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-paper-plane"></i>
					</span>
                    </div>
                    <input type="email" class="form-control" name="email" placeholder="Email Address" required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
					<span class="input-group-text">
						<span class="fa fa-user"></span>
					</span>
                    </div>
                    <input type="text" class="form-control" name="uid" placeholder="Username" required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-lock"></i>
					</span>
                    </div>
                    <input type="password" class="form-control" name="pwd" placeholder="Password" required="required">
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
                    <input type="password" class="form-control" name="pwdrepeat" placeholder="Confirm Password" required="required">
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
                    <p>Are you a seller?</p>
                    <input type="number" class="form-control" name="rolecheckbox" placeholder="Seller?" required="required">
                </div>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary btn-lg">Sign Up</button>
            </div>
        </form>
        <div class="text-center" style="color: #333333">Already have an account? <a href="./login.php" style="color: #00A5C4;">Login here</a></div>
        <div class="text-center" style="color: red">
            <?php
            if(isset($_GET["error"])){
                if($_GET["error"] == "emptyinput"){
                    echo "<p>Fill in all fields</p>";
                }
                else if($_GET["error"] == "invaliduid"){
                    echo "<p>Make sure your username consists of only letters and numbers</p>";
                }
                else if($_GET["error"] == "passwordsdontmatch"){
                    echo "<p>Passwords don't match</p>";
                }
                else if($_GET["error"] == "stmtfailed"){
                    echo "<p>Ups. Something went wrong</p>";
                }
                else if($_GET["error"] == "usernametaken"){
                    echo "<p>Username or Email already taken</p>";
                }
                else if($_GET["error"] == "none"){
                    echo "<p>You have signed up</p>";
                }
            }
            ?>
        </div>
    </div>
    <br>
    <br>
    <br>
</section>