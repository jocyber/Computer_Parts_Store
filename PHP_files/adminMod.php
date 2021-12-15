<?php

if(isset($_POST["Price"]) || isset($_POST["Name"]))
update();
else if(isset($_POST["Remove"])) 
delete();


if(isset($_POST["Page"])) {
$tab = $_POST["Page"];
header("Location: ../html_files/$tab.php");
}
else {
header("Location: ../html_files/index.php");
}

function delete() {
    require("connect_DB.php");

    $path = $_POST["Remove"];;

    $sql = "DELETE FROM products WHERE img_dir=?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $path);
    $stmt->execute();
    $stmt->close();

    //delete img in image folder
    unlink($path);

    mysqli_close($conn);
}

function update() {
    require("connect_DB.php");

    $name = $_POST["Name"];
    $price = $_POST["Price"];
    $id = $_POST['ID'];

    $sql = "UPDATE products SET Name= ?, Price=? WHERE ID=$id";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sd", $name, $price);
    $stmt->execute();
    $stmt->close();

    mysqli_close($conn);
}

?>