<?php 
    session_start();

    if(isset($_POST["Name"]))
        addToCart();
    else if(isset($_POST["Remove"])) 
        removeFromCart();
    else if(isset($_POST["checkout"]))
        removeAllItems();

    if(isset($_POST["Page"]) && isset($_SESSION["uname"])) {
        $tab = $_POST["Page"];
        header("Location: ../html_files/$tab.php");
    }
    else {
        header("Location: ../html_files/signup.php");
    }

    function addToCart() {
        require("connect_DB.php");
        $data = $_POST['Name'];
        $select = mysqli_query($conn, "select * from products where Name='$data'"); // get all the information for the name
        $row = mysqli_fetch_assoc($select);

        //get values
        if($row != 0) {
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

        mysqli_close($conn);
    }

    function removeFromCart() {
        require("connect_DB.php");
        $name = $_SESSION["uname"];
        $path = $_POST["Remove"];

        $result = mysqli_query($conn, "delete from cart where Name='$name' and img_dir='$path';");
        mysqli_close($conn);
    }

    function removeAllItems() {
        require("connect_DB.php");
        $name = $_SESSION["uname"];

        $result = mysqli_query($conn, "delete from cart where Name='$name';");
        mysqli_close($conn);
    }
?>