<?php

    session_start();

    if(isset($_POST["reset"])) 
        reset_password();
 

    header("Location: ../html_files/index.php");


    function reset_password() {
        $info = checkDatabase();
        $email = $info["email"];
        $new_password = $info["new_password"];
        $conn = $info["connection"];


        $login_attempt = mysqli_query($conn, "select * from users where email='$email'");
        $result = mysqli_fetch_assoc($login_attempt);

        if($result == 0) { // no account associate with the email, unregistered email
            return;
        }
        else {
            $query = mysqli_query($conn, "update users set password='$new_password' where email='$email'");
            mysqli_close($conn);
        }

    }


    function checkDatabase() {
        require_once("connect_DB.php");

        $email = $_POST["eml"];
        $new_password = $_POST["npsw"];

        $info = array();
        $info["email"] = $email;
        $info["new_password"] = $new_password;
        $info["connection"] = $conn;

        return $info;
    }
?>
