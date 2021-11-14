<?php 
    session_start();
    $conn = mysqli_connect("localhost:3307", "root", "", "computer_store");

    if(!$conn) {
        die("Connection to the database failed: ".mysqli_connect_error());
    }

    $data = $_POST['Name'];
    $select = mysqli_query($conn, "select * from products where Name='$data'"); // get all the information for the name
    $row = mysqli_fetch_assoc($select);
    //get values
    $name = $row['Name'];
    $price = $row['Price'];
    $dir = $row['img_dir'];
    $type = $row['type'];

    $name = $_SESSION["uname"];

    $select = mysqli_query($conn, "select ID from users where Username='$name'");
    $row = mysqli_fetch_assoc($select);
    $id = $row["ID"];

    $result = mysqli_query($conn, "insert into cart (Name, Price, img_dir, type, UserID) values ('$name', $price, '$dir', '$type', $id);");
    
    mysqli_close($conn);
?>