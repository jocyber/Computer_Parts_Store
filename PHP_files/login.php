<?php
    session_start();


    if(isset($_POST["signup"]))
        signup();
    else if(isset($_POST["logout"])) 
        logout();
    else
        login();

    header("Location: ../html_files/index.php");

    function logout() {
        if(isset($_SESSION["uname"])) {
            session_destroy();
        }
    }

    function login() {
        $info = checkDatabase();
        $username = $info["username"];
        $password = $info["password"];
        $conn = $info["connection"];

        $login_attempt = mysqli_query($conn, "select * from users where Username='$username' and password='$password'");
        $result = mysqli_fetch_assoc($login_attempt);

        if($result == 0) { // wrong username or password
            return;
        }

        $result = mysqli_query($conn, "select admin from users where Username='$username' and password='$password'");
        $row = mysqli_fetch_assoc($result);
        $admin = $row["admin"];

        $_SESSION["uname"] = $username;
        $_SESSION["psw"] = $password;
        if($admin == 1) {
            $_SESSION["lvl"] = $admin;
        }
        mysqli_close($conn);
    }

    function signup() {
        $info = checkDatabase();
        $email = $info["email"];
        $username = $info["username"];
        $password = $info["password"];
        
        $conn = $info["connection"];

        //check username to see if it is used
        $login_attempt = mysqli_query($conn, "select * from users where Username='$username'");
        $result = mysqli_fetch_assoc($login_attempt);

        //check email to see if it is used
        $login_attempt1 = mysqli_query($conn, "select * from users where email='$email'");
        $result1 = mysqli_fetch_assoc($login_attempt1);

        if($result == 0 and $result1 == 0) {
            $query = mysqli_query($conn, "insert into users (Username, password, email) values ('$username', '$password', '$email')");

            if(isset($_POST["remember"])) {
                setcookie("username", $username, time() + 31536000);
            }

            $_SESSION["eml"] = $email;
            $_SESSION["uname"] = $username;
            $_SESSION["psw"] = $password;

            mysqli_close($conn);
        } 
        else { // username or email is already in use
            mysqli_close($conn);
        }
    }

    function checkDatabase() {
        require_once("connect_DB.php");

        $email = $_POST["eml"];
        $username = $_POST["uname"];
        $password = $_POST["psw"];

        $info = array();
        $info["email"] = $email;
        $info["username"] = $username;
        $info["password"] = $password; 
        $info["connection"] = $conn;

        return $info;
    }
?>
