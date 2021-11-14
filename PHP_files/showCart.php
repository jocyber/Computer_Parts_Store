<?php 
    while($row = mysqli_fetch_assoc($result)) {

        $path = $row["img_dir"];
        $price = $row["Price"];

        $price_string = "$".$price;

        echo "<div class='product_border' style='background-color: #171717;>
            <a href='$path' target='_blank'><img src='$path' class='product_image'></a>

            <div class='format_info''>
                <h3 class='product_title'>$path</h3><br>
                <h2 style='margin-top: -2%; color: white;'>$price_string</h2>

                <h3><em style='color: white;'>Shipped by Computer Parts</em></h3>
            </div>
            </div>
            "."<hr class='bottom_line'>";
    }
    mysqli_close($conn);

?>