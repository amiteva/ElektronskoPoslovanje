<?php

function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat){
    if(empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidUid($username){
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdRepeat){
    if($pwd !== $pwdRepeat){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function uidExists($conn, $username, $email){
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../../signup.php?error=stmtfailed");
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt, "ss", $username, $email);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($resultData)){
            return $row;
        }
        else {
            $result = false;
        }
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $username, $pwd, $rolechecked){
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd, userRole) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../../signup.php?error=stmtfailed");
        exit();
    }
    else{
        $hashedPWD = password_hash($pwd, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $username, $hashedPWD, $rolechecked);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("location: ../../signup.php?error=none");
    }
}
function updateUser($conn, $name, $email, $username, $pwd){ //treba za sekoj parametar da proveris posebno dali ima nesto pisano i da updejtnes ako da
    $currentId=$_SESSION['userid'];
    if(!empty($name)){
        $sql = "UPDATE users SET usersName='$name' WHERE usersId='$currentId'";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../../editProfile.php?error=stmtfailed");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $name);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            header("location: ../../editProfile.php?error=none");
        }
    }
    if(!empty($email)){
        $sql = "UPDATE users SET usersEmail='$email' WHERE usersId='$currentId'";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../../editProfile.php?error=stmtfailed");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            header("location: ../../editProfile.php?error=none");
        }
    }
    if(!empty($username)){
        $sql = "UPDATE users SET usersUid='$username' WHERE usersId='$currentId'";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../../editProfile.php?error=stmtfailed");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            header("location: ../../editProfile.php?error=none");
        }
    }
    if(!empty($pwd)){
        $sql = "UPDATE users SET usersPwd='$pwd' WHERE usersId='$currentId'";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../../editProfile.php?error=stmtfailed");
            exit();
        }
        else{
            $hashedPWD = password_hash($pwd, PASSWORD_DEFAULT);

            mysqli_stmt_bind_param($stmt, "s", $hashedPWD);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            header("location: ../../editProfile.php?error=none");
        }
    }
    /*$sql = "UPDATE users SET usersName='$name', usersEmail";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../../signup.php?error=stmtfailed");
        exit();
    }
    else{
        $hashedPWD = password_hash($pwd, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $username, $hashedPWD, $rolechecked);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("location: ../../signup.php?error=none");
    }*/
}
function createSeller($conn, $name, $email, $username, $pwd, $role){
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd, userRole) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../../addSeller.php?error=stmtfailed");
        exit();
    }
    else{
        $hashedPWD = password_hash($pwd, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $username, $hashedPWD, $role);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("location: ../../addSeller.php?error=none");
    }
}
function createCustomer($conn, $name, $email, $username, $pwd, $role){
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd, userRole) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../../addCustomer.php?error=stmtfailed");
        exit();
    }
    else{
        $hashedPWD = password_hash($pwd, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $username, $hashedPWD, $role);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("location: ../../addCustomer.php?error=none");
    }
}
function addProduct($conn, $brand, $name, $price, $msrp, $description){
    $sql = "INSERT INTO product (item_brand, item_name, item_price, item_msrp, item_desc) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../../sellerAddProduct.php?error=stmtfailed");
        exit();
    }
    else{

        mysqli_stmt_bind_param($stmt, "ssdds", $brand, $name, $price, $msrp, $description);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("location: ../../sellerAddProduct.php?error=none");
    }
}
function emptyInputAddProduct($brand, $name, $price, $msrp, $description){
    if(empty($brand) || empty($name) || empty($price) || empty($msrp) || empty($description)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function emptyInputLogin($username, $pwd){
    if(empty($username) || empty($pwd)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}
function emptyInputEditProfile($name, $email, $username, $pwd, $pwdRepeat){
    if(empty($name) && empty($email) && empty($username) && empty($pwd) && empty($pwdRepeat)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}
function loginUser($conn, $username, $pwd){
    $uidExists = uidExists($conn, $username, $username);
    if($uidExists == false){
        header("location: ../../signup.php?error=wronglogin");
        exit();
    }
    if($uidExists["user"] ==

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd,$pwdHashed);

    if ($checkPwd == false){
        header("location: ../../login.php?error=wronglogin");
        exit();
    }
    else if ($checkPwd == true){
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        $_SESSION["userrole"] = $uidExists["userRole"];
        if($_SESSION["userrole"]==0)
            header("location: ../../adminHome.php");
        else if ($_SESSION["userrole"]==1)
            header("location: ../../sellerHome.php");
        else
            header("location: ../../index.php");

        exit();
    }
}