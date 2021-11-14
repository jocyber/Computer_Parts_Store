<?php 
    session_start();

    if(isset($_SESSION["uname"])) {
        $conn = mysqli_connect("localhost:3307", "root", "", "computer_store");

        if(!$conn) {
            die("Connection to the database failed: ".mysqli_connect_error());
        }

        $username = $_SESSION["uname"];
        $password = $_SESSION["passw"];

        $result = mysqli_query($conn, "select * from cart inner join users on users.Username='$username' and users.password='$password' and cart.UserID=users.ID;");
        $resultCheck = mysqli_num_rows($result);
        echo "$resultCheck";
    }
