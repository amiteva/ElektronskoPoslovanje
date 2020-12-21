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
        .login-form {
            width: 400px;
            margin: 0 auto;
            padding: 30px 0;
        }
        .login-form form {
            color: #999;
            border-radius: 3px;
            margin-bottom: 15px;
            background: #fff;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }
        .login-form h2 {
            color: #333;
            font-weight: bold;
            margin-top: 0;
        }
        .login-form hr {
            margin: 0 -30px 20px;
        }
        .login-form .form-group {
            margin-bottom: 20px;
        }
        .login-form label {
            font-weight: normal;
            font-size: 14px;
        }
        .login-form .form-control {
            min-height: 38px;
            box-shadow: none !important;
        }
        .login-form .input-group-addon {
            max-width: 42px;
            text-align: center;
        }
        .login-form .btn, .login-form .btn:active {
            font-size: 16px;
            font-weight: bold;
            background: #003859 !important;
            border: none;
            min-width: 140px;
        }
        .login-form .btn:hover, .login-form .btn:focus {
            background: #003859 !important;
        }
        .login-form a {
            color: #fff;
            text-decoration: underline;
        }
        .login-form a:hover {
            text-decoration: none;
        }
        .login-form form a {
            color: #003859;
            text-decoration: none;
        }
        .login-form form a:hover {
            text-decoration: underline;
        }
        .login-form .fa {
            font-size: 21px;
        }
        .login-form .fa-paper-plane {
            font-size: 18px;
        }
        .login-form .fa-check {
            color: #fff;
            left: 17px;
            top: 18px;
            font-size: 7px;
            position: absolute;
        }
    </style>

    <div class="login-form">
        <form action="Template/includes/login.inc.php" method="post">
            <h2>Log in</h2>
            <p style="font-size: 14px; ">Please fill in this form to create an account!</p>
            <hr>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
					<span class="input-group-text">
						<span class="fa fa-user"></span>
					</span>
                    </div>
                    <input type="text" class="form-control" name="uid" placeholder="Username / Email" required="required">
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
                <button type="submit" name="submit" class="btn btn-primary btn-lg">Log in</button>
            </div>
        </form>
        <div class="text-center" style="color: #333333">Don't have an account? <a href="./signup.php" style="color: #00A5C4;">Sign up here</a></div>
        <div class="text-center" style="color: red">
            <?php
            if(isset($_GET["error"])){
                if($_GET["error"] == "emptyinput"){
                    echo "<p>Fill in all fields</p>";
                }
                else if($_GET["error"] == "wronglogin"){
                    echo "<p>Incorrect Username or Password</p>";
                }
                else if($_GET["error"] == "deactivatedaccount"){
                    echo "<p>Your account is currently deactivated</p>";
                }
            }
            ?>
        </div>
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
</section>