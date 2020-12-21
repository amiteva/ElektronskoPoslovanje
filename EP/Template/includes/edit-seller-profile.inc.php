<?php
if(isset($_POST["submit"])){

    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];
    $sellerID = $_POST["sellerID"];


    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputEditProfile($name, $email, $username, $pwd, $pwdRepeat) !== false){
        header("location: ../../editSellerProfile.php?error=emptyinput");
        exit();
    }

    if(invalidUid($username) !== false){
        header("location: ../../editSellerProfile.php?error=invaliduid");
        exit();
    }

    if((!isset($_POST["pwdrepeat"]) && isset($_POST["pwd"])) || (isset($_POST["pwdrepeat"]) && !isset($_POST["pwd"])) || pwdMatch($pwd, $pwdRepeat) !== false){
        header("location: ../../editSellerProfile.php?error=passwordsdontmatch");
        exit();
    }

    updateUser($conn, $name, $email, $username, $pwd, $sellerID);

}

if(isset($_POST["deac"])){

    $sellerID = $_POST["sellerID"];


    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


    deactivateUser($conn, $sellerID);

}

if(isset($_POST["act"])){

    $sellerID = $_POST["sellerID"];


    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


    activateUser($conn, $sellerID);

}

else{
    header("location: ../../editSeller.php");
    exit();
}
