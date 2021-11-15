<?php 
    require_once("connect_DB.php");

    $result = mysqli_query($conn, "select * from products order by Name limit 5;");
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0) {
        while($row = mysqli_fetch_assoc($result)) {

            $name = $row["Name"];
            $path = $row["img_dir"];
            $price = $row["Price"];

            $price_string = "$".$price;

            echo "<div style='position: static; float: left; min-width: 300px; max-width:300px; padding: 10px;'>
                <a href='$path' target='_blank'><img src='$path' class='product_image'></a>
                <h3 style='clear:left; font-size: 90%; max-width: 200px; margin-left: 2.5%;color:white;'>$name</h3>
                <h2 style='clear: left; font-size: 110%; margin-left: 2.5%;color:white;'>$price_string</h2>

                <h3 style='margin-left: 2.5%; color:white;'><em>Shipped by Computer Parts</em></h3>

                <button style='margin-left: 2.5%;' class='cart_button' onclick='add_to_cart()'>
                    Add to Cart
                </button>
            </div>
            ";
        }
    }
    else {
        echo "<h2 style='margin-left: 5%; color:white;'>There are no such items for sale at this time.</h2><br><br><br><br>";
    }   
    
    mysqli_close($conn);
?>