<?php
    session_start();

    if(isset($_POST["logout"]))
        logout();
    else if(isset($_POST["signup"]))
        signup();
    else
        login();

    header("Location: ../html_files/index.php");

    function logout() {
        if(isset($_SESSION["uname"]))
            session_destroy();
    }

    function login() {
        $serverName = "localhost:3307";
        $username = "root";
        $password = "";
        $dbName = "computer_store";
        
        $conn = mysqli_connect($serverName, $username, $password, $dbName);
        
        if(!$conn) {
            die("Connection to the database failed: ".mysqli_connect_error());
        }

        $username = $_POST["uname"];
        $password = $_POST["psw"];

        $login_attempt = mysqli_query($conn, "select * from users where Username='$username' and password='$password'");
        $result = mysqli_fetch_assoc($login_attempt);

        if($result == 0) { // wrong username or password
            return;
        }

        $_SESSION["uname"] = $username;
        $_SESSION["passw"] = $password;
        mysqli_close($conn);
    }

    function signup() {
        $serverName = "localhost:3307";
        $username = "root";
        $password = "";
        $dbName = "computer_store";
        
        $conn = mysqli_connect($serverName, $username, $password, $dbName);
        
        if(!$conn) {
            die("Connection to the database failed: ".mysqli_connect_error());
        }

        $username = $_POST["uname"];
        $password = $_POST["psw"];

        $login_attempt = mysqli_query($conn, "select * from users where Username='$username' and password='$password'");
        $result = mysqli_fetch_assoc($login_attempt);

        if($result == 0) {
            $query = mysqli_query($conn, "insert into users (Username, password) values ('$username', '$password')");

            if(isset($_POST["remember"])) {
                setcookie("uname", $username, time() + 31536000);
            }
    
            $_SESSION["uname"] = $username;
            $_SESSION["passw"] = $password;
            mysqli_close($conn);
        } 
        else { // username is already in use
            mysqli_close($conn);
        }
    }
?>