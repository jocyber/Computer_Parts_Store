<?php 
    $conn = mysqli_connect("localhost:3307", "root", "", "computer_store");

    if(!$conn) {
        die("Connection to the database failed: ".mysqli_connect_error());
    }

    $result = mysqli_query($conn, "select * from products where type='$tab';");
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0) {
        while($row = mysqli_fetch_assoc($result)) {

            $name = $row["Name"];
            $path = $row["img_dir"];
            $price = $row["Price"];

            $price_string = "$".$price;

            echo "<div class='product_border' style='background-color: #171717;>
            <a href='$path' target='_blank'><img src='$path' class='product_image'></a>

            <div class='format_info''>
                <h3 class='product_title'>$name</h3><br>
                <h2 style='margin-top: -2%; color: white;'>$price_string</h2>

                <h3><em style='color: white;'>Shipped by Computer Parts</em></h3>
                <form method='post' action='../PHP_files/addToCart.php' onsubmit='setTimeout(function () { window.location.reload(); }, 10)'>
                    <input type='hidden' value='$name' name='Name'>
                    <input class='cart_button' type='submit' value='Add to Cart'>
                </form>
            </div>
            </div>
            "."<hr class='bottom_line'>";
        }
    }
    else {
        echo "<h2 style='margin-left: 5%; color: white;'>There are no such items for sale at this time.</h2><br><br><br><br>";
    }   
    
    mysqli_close($conn);
?>