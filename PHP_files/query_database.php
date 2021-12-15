<?php 
    require_once("connect_DB.php");

    $result = mysqli_query($conn, "select * from products where type='$tab';");
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0) {
        while($row = mysqli_fetch_assoc($result)) {

            $id = $row['ID'];
            $name = $row["Name"];
            $path = $row["img_dir"];
            $price = $row["Price"];

            $price_string = "$".$price;
            
            /*if admin add a button to delete product */
            if(!isset($_SESSION["lvl"])) {
                echo "<div class='product_border' style='background-color: #171717;>
                <a href='$path' target='_blank'><img src='$path' class='product_image'></a>
    
                <div class='format_info''>
                    <h3 class='product_title'>$name</h3><br>
                    <h2 style='margin-top: -2%; color: white;'>$price_string</h2>
    
                    <h3><em style='color: white;'>Shipped by Computer Parts</em></h3>
                    <form method='post' action='../PHP_files/addToCart.php'>
                        <input type='hidden' value='$tab' name='Page'>
                        <input type='hidden' value='$name' name='Name'>
                        <input class='cart_button' type='submit' value='Add to Cart'>
                    </form>
                </div>
                </div>
                "."<hr class='bottom_line'>";
            }
            else {
                echo "<div class='product_border' style='background-color: #171717;>
                <a href='$path' target='_blank'><img src='$path' class='product_image'></a>
                <div class='format_info''>
                    <form method='post' action='../PHP_files/adminMod.php'>
                        <input type='hidden' value='$id' name='ID'>
                        <input type='hidden' value='$tab' name='Page'>
                        <input type='text' placeholder='$name' value='$name' style='width:200%' name='Name'>
                        <h2 style='margin-top: -2%; color: white;'> 
                        <input type='number' name='Price' id='price' onchange='setTwoNumberDecimal' min='0' step='0.01' value='$price'>
                        <input class='cart_button' style='float:right' type='submit' value='Update'>
                        </h2>
                    </form>

                    <h3><em style='color: white;'>Shipped by Computer Parts</em></h3>
                    <form method='post' action='../PHP_files/addToCart.php'>
                        <input type='hidden' value='$tab' name='Page'>
                        <input type='hidden' value='$name' name='Name'>
                        <input class='cart_button' type='submit' value='Add to Cart'>
                    </form>
                    <form method='post' action='../PHP_files/adminMod.php'>
                        <input type='hidden' value='$tab' name='Page'>
                        <input type='hidden' value='$path' name='Remove'>
                        <input class='cart_button' type='submit' value='Delete Product'>
                    </form>

                </div>
                </div>
                "."<hr class='bottom_line'>";
            }
            

        }
    }
    else {
        echo "<h2 style='margin-left: 5%; color: white;'>There are no such items for sale at this time.</h2><br><br><br><br>";
    }   
    
    mysqli_close($conn);
?>