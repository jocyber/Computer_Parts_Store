<?php 
    session_start();
    $conn = mysqli_connect("localhost:3307", "root", "", "computer_store");

    if(!$conn) {
        die("Connection to the database failed: ".mysqli_connect_error());
    }

    $result = mysqli_query($conn, "select * from cart inner join users where cart.UserID=users.ID;");
    $resultCheck = mysqli_num_rows($result);
    echo "$resultCheck";
