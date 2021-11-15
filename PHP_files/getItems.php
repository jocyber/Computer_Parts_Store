<?php 
    session_start();

    if(isset($_SESSION["uname"])) {
        require_once("connect_DB.php");

        $username = $_SESSION["uname"];
        $password = $_SESSION["passw"];

        $result = mysqli_query($conn, "select * from cart inner join users on users.Username='$username' and users.password='$password' and cart.UserID=users.ID;");
        $resultCheck = mysqli_num_rows($result);
        echo "$resultCheck";
    }
