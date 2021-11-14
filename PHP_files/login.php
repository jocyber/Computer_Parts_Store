<?php
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
    session_start();

    $login_attempt = mysqli_query($conn, "select * from users where Username='$username'");
    $result = mysqli_fetch_assoc($login_attempt);

    if($result == 0) {
        $query = mysqli_query($conn, "insert into users (Username, password) values ('$username', '$password')");

        if(isset($_POST["remember"])) {
            setcookie("uname", $username, time() + 31536000);
        }
    }

    $_SESSION["uname"] = $username;
    $_SESSION["passw"] = $password;
    mysqli_close($conn);
    header("Location: ../html_files/index.php");
?>