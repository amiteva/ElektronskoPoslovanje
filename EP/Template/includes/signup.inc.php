<?php
if(isset($_POST['submit']))
{
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];
    $status=1;
    $rolechecked = 2;
    $street = $_POST["street"];
    $houseNo = $_POST["houseNo"];
    $post = $_POST["post"];
    $postNo = $_POST["postNo"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    function CheckCaptcha($userResponse) {
        $fields_string = '';
        $fields = array(
            'secret' => '6Lc9ew4aAAAAAKBVgU78tCJecIg1BK-h0IaVoacl',
            'response' => $userResponse
        );
        foreach($fields as $key=>$value)
            $fields_string .= $key . '=' . $value . '&';
        $fields_string = rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

        $res = curl_exec($ch);
        curl_close($ch);

        return json_decode($res, true);
    }


    // Call the function CheckCaptcha
    $result = CheckCaptcha($_POST['g-recaptcha-response']);

    if ($result['success']) {
        //If the user has checked the Captcha box
        if(emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat, $street, $houseNo, $post, $postNo) !== false){
            header("location: ../../signup.php?error=emptyinput");
            exit();
        }

        if(invalidUid($username) !== false){
            header("location: ../../signup.php?error=invaliduid");
            exit();
        }

        if(pwdMatch($pwd, $pwdRepeat) !== false){
            header("location: ../../signup.php?error=passwordsdontmatch");
            exit();
        }

        if(uidExists($conn, $username, $email) !== false){
            header("location: ../../signup.php?error=usernametaken");
            exit();
        }

        createUser($conn, $name, $email, $username, $pwd, $rolechecked, $street, $houseNo, $post, $postNo);

    } else {
        // If the CAPTCHA box wasn't checked
        echo '<script>alert("You seem to be a robot. Try again");</script>';
    }
}
