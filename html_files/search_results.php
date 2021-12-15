<?php
session_start();
?>

<!DOCTYPE html>

<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale = 1.0,maximum-scale = 1.0”>
    <link rel=" stylesheet" text="text/css" href="../css_files/normalize.css">
    <link rel="stylesheet" text="text/css" href="../css_files/styles.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../js_files/scripts.js" type="text/javascript"></script>

    <title>Computer Parts Store</title>
</head>

<body style="background-color: #131313;">
    <!--Search bar-->
    <div class="browse_pages">
        <div>
            <!--shopping cart image-->
            <a href="shopping.php"><img src="../images/cart.png" id="shopping" title="Shopping Cart" alt="Shopping Cart"></a>
            <p class="item_num" id="counter">0</p>
        </div>

        <!--Log in-->

        <?php
        if (!isset($_SESSION["uname"])) {
            echo '
        <button onclick="document.getElementById(\'id01\').style.display=\'block\'" style="width:auto;" id="close-image"><img src="../images/user.png"></button>

        <div id="id01" class="modal">
        
            <form class="modal-content animate" action="../PHP_files/login.php" method="post">
                <div class="imgcontainer">
                    <span onclick="document.getElementById(\'id01\').style.display=\'none\'" class="close" title="Close Modal">&times;</span>
                    </div>

                <div class="container">
                    <label for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="uname" required>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" required>
                        
                    <button type="submit"  class ="loginbtn">Login</button>
                </div>

                <br><br>
                <br><br>

                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById(\'id01\').style.display=\'none\'" class="cancelbtn">Cancel</button>
                    <a href="signup.php">Sign up</a>
                    <span class="psw">Forgot <a href="reset_password.php">password?</a></span>
                </div>
            </form>
        </div>

        <script>
        // Get the modal
        var modal = document.getElementById(\'id01\');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        </script>
        ';
        } else {
            echo "
        <form method='post' action='../PHP_files/login.php'>
            <input id='logout' type='submit' name='logout' value='Logout'>
        </form>
        ";
        }

        ?>

        <!--Store's logo-->
        <div>
            <a href="index.php">
                <img src="../images/logo.png" alt="kawaii anime" title="home page" id="icon">
            </a>
        </div>

        <div id="search">
            <form method="GET">
                <div>
                    <input type="search" name="q" placeholder="Search...">
                </div>
            </form>
            <!--links to other pages-->
            <br>

            <!--List of links to separate pages *design inspired by Amazon, eBay, etc.-->
            <ul id="search_links">
                <li><a href="systems.php">Computer Systems</a></li>
                <li><a href="components.php">Components</a></li>
                <li><a href="electronics.php">Electronics</a></li>
                <li><a href="gaming.php">Gaming</a></li>
                <li><a href="network.php">Networking Appliances</a></li>
                <li><a href="office.php">Office Accessories</a></li>
            </ul>
        </div>

    </div>

    <div id="wrapper">
        <!--beginning of shopping section-->
        <br><br><br><br><br>

        <!--where products appear-->
        <div class="page_border">
        <?php
            $conn = mysqli_connect("127.0.0.1", "root", "", "computer_store");

            if (isset($_GET['q']) && $_GET['q'] !=  '') {

                $q = trim($_GET['q']);
                $terms = explode(' ', $q); //seperate strings into seperate terms
                $words = '';
                $sql = "SELECT * FROM products WHERE Name RLIKE ?";
                foreach ($terms as $tag) {
                    $words .= $tag . '|';
                }
                $words .= substr($words, 0, strlen($words) - 1);
                //Validating Input
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $words);
                $stmt->execute();
                
                $result = $stmt->get_result() or trigger_error("Query Failed! SQL: $sql - Error: " . mysqli_error($conn), E_USER_ERROR);;
                $result_count = mysqli_num_rows($result);

                if ($result_count > 0) {
                    //display result count
                    echo '<div style="text-align:Left; color: white; padding: 1em;font-size: 1.5em"><b>'.$result_count.'</b> results found</div>';
                    //display search results/matches
                    echo '<table class="page_border">';
                    while ($row = mysqli_fetch_assoc($result)) {
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
                    // end table
                    echo '</table>';
                } else {
                    echo '<div style="text-align:Left; color: white; padding: 1em;font-size: 1.5em"><b>No results found.</b> results found</div>';
                }
            } else {
                echo ' ';
            }
            ?>
        </div>
        <!--Bottom styling-->
        <div class="bottom">
            <footer>
                <ul>
                    <li class="title">Customer Service</li><br>
                    <a href="info_html/refunds.php">Return Policy</a><br>
                    <a href="info_html/privacy.php">Privacy and Security</a><br>
                    <a href="info_html/feedback.php">Feedback</a>
                </ul>

                <ul>
                    <li class="title">Company Information</li><br>
                    <a href="info_html/about.php">About Computer Parts</a><br>
                    <a href="info_html/hours.php">Hours</a><br>
                    <a href="info_html/locations.php">Locations</a><br>
                </ul>
            </footer>
            <br>
        </div>
    </div>
</body>

</html>
