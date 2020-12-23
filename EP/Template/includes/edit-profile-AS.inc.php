<?php
if(isset($_POST["submit"])){

    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];
    $userId = $_POST["userID"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputEditProfileAS($name, $email, $username, $pwd, $pwdRepeat) !== false){
        header("location: ../../editProfile.php?error=emptyinput");
        exit();
    }

    if(invalidUid($username) !== false){
        header("location: ../../editProfile.php?error=invaliduid");
        exit();
    }

    if((!isset($_POST["pwdrepeat"]) && isset($_POST["pwd"])) || (isset($_POST["pwdrepeat"]) && !isset($_POST["pwd"])) || pwdMatch($pwd, $pwdRepeat) !== false){
        header("location: ../../editProfile.php?error=passwordsdontmatch");
        exit();
    }

    updateCustomerAS($conn, $name, $email, $username, $pwd, $userId);

}
else{
    header("location: ../../editProfile.php");
    exit();
}
