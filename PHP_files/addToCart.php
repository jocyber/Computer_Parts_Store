<?php 
    session_start();

    if(isset($_POST["Name"]))
        addToCart();
    else if(isset($_POST["Remove"])) 
        removeFromCart($conn);

    mysqli_close($conn);

    function addToCart() {
        require_once("connect_DB.php");
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
    }

    function removeFromCart() {
        require_once("connect_DB.php");
        $name = $_SESSION["uname"];
        $path = $_POST["Remove"];

        $result = mysqli_query($conn, "delete from cart where Name='$name' and img_dir='$path';");
    }
?>