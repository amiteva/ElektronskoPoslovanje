<?php
if(isset($_POST["submit"])){

    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];
    $status=1;
    $role=2;

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) !== false){
        header("location: ../../addCustomer.php?error=emptyinput");
        exit();
    }

    if(invalidUid($username) !== false){
        header("location: ../../addCustomer.php?error=invaliduid");
        exit();
    }

    if(pwdMatch($pwd, $pwdRepeat) !== false){
        header("location: ../../addCustomer.php?error=passwordsdontmatch");
        exit();
    }

    if(uidExists($conn, $username, $email) !== false){
        header("location: ../../addCustomer.php?error=usernametaken");
        exit();
    }

    createCustomer($conn, $name, $email, $username, $pwd, $role);

}
else{
    header("location: ../../addCustomer.php");
    exit();
}
