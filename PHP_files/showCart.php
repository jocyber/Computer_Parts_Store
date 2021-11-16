<?php 
    while($row = mysqli_fetch_assoc($result)) {

        $path = $row["img_dir"];
        $price = $row["Price"];
        $name = $path;

        $price_string = "$".$price;

        for($i = 0; $i < strlen($name); $i++) {
            if($name[$i] == '/') {
                $name = substr($name, $i + 1, strlen($name));
                $i = 0;
            }
        }

        $i = strlen($name) - 1;
        while($name[$i] != '.')
            $i--;

        $name = substr($name, 0, $i);

        echo "<div class='product_border' style='background-color: #171717;>
            <a href='$path' target='_blank'><img src='$path' class='product_image'></a>

            <div class='format_info''>
                <h3 class='product_title'>$name</h3><br>
                <h2 style='margin-top: -2%; color: white;'>$price_string</h2>

                <h3><em style='color: white;'>Shipped by Computer Parts</em></h3>
                <form method='post' action='../PHP_files/addToCart.php' onsubmit='setTimeout(function () { window.location.reload(); }, 10)'>
                    <input type='hidden' value='$path' name='Remove'>
                    <input class='cart_button' type='submit' value='Delete Item'>
                </form>
            </div>
            </div>
            "."<hr class='bottom_line'>";
    }
    mysqli_close($conn);

?>