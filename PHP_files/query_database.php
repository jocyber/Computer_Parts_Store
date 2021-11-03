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

            echo "<div class='product_border'>
            <a href='$path' target='_blank'><img src='$path' class='product_image'></a>

            <div class='format_info'>
                <h3 class='product_title'>$name</h3><br>
                <h2 style='margin-top: -2%;'>$price_string</h2>

                <h3><em>Shipped by Computer Parts</em></h3>

                <button class='cart_button' onclick='add_to_cart()'>
                    Add to Cart
                </button>
            </div>
            </div>
            "."<hr class='bottom_line'>";
        }
    }
    else {
        echo "<h2 style='margin-left: 5%;'>There are no such items for sale at this time.</h2><br><br><br><br>";
    }   
    
    mysqli_close($conn);
?>