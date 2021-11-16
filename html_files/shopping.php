<?php
    session_start();

    if(!isset($_SESSION["uname"])) {
        header("Location: index.php");
    }
?>

<!DOCTYPE html>

<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" text="text/css" href="../css_files/normalize.css">
        <link rel="stylesheet" text="text/css" href="../css_files/styles.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

        <title>Computer Parts Store</title>
    </head>

    <body style="background-color: #131313;">
        <!--Search bar-->
    <div class="browse_pages">
	<div>
	    <!--shopping cart image-->
            <a href="shopping.php"><img src="../images/cart.png" id="shopping" title="Shopping Cart" alt="Shopping Cart"></a>	
            <p class="item_num" id="counter"></p>												  
        </div>		     
	
	<!--Log in--> 

    <?php 
    if(!isset($_SESSION["uname"])) {
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
                <label for="remember" style="display: block;">
                    <input type="checkbox" name="remember" class="checkbox"> Remember me
                </label>
                <br><br>

                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById(\'id01\').style.display=\'none\'" class="cancelbtn">Cancel</button>
                    <button type="submit" name="signup" class="cancelbtn">Sign up</button>
                    <span class="psw">Forgot <a href="#">password?</a></span>
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
    }
    else {
        echo "
        <form method='post' action='../PHP_files/login.php' onsubmit='setTimeout(function () { window.location.reload(); }, 10)'>
            <input id='logout' type='submit' name='logout' value='Logout'>
        </form>
        ";
    }

    ?>

         <!--Store's logo-->                                                                                                  
         <div>
            <a href="index.php">
             <img src="../images/logo.png" alt="Computer Parts Logo" title="home page" id="icon">
	        </a>
        </div>

        <div id="search">
            <form method="post"> 
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
                <li><a href="eletronics.php">Electronics</a></li>
                <li><a href="gaming.php">Gaming</a></li>
                <li><a href="network.php">Networking Appliances</a></li>
                <li><a href="office.php">Office Accessories</a></li>
            </ul>
        </div>

    </div>

    <div id="wrapper">
        <!--beginning of shopping section-->

        <br><br><br><br><br>	
        <p class="direct"><a id="dir" href="index.php">Home &nbsp</a><span style="color:lightgray;"> >&nbsp Shopping Cart</span></p>
        <hr>

        <br><br>
        <?php
            $resultCheck = 0;

            if(isset($_SESSION["uname"])) {
                require_once("../PHP_files/connect_DB.php");
               // echo "$_SESSION['uname']";
        
                $username = $_SESSION["uname"];
                $password = $_SESSION["passw"];
        
                $result = mysqli_query($conn, "select * from cart inner join users on users.Username='$username' and cart.UserID=users.ID;");
                $resultCheck = mysqli_num_rows($result);

                if($resultCheck != 0) {
                    $name = $_SESSION["uname"];
                    echo "<h1 style='color: white; margin-left: 28.5px; float: left;'>Shopping Cart</h1> <br><br>";

                    echo "  
                    <form method='post' action='../PHP_files/addToCart.php' onsubmit='setTimeout(function () { window.location.reload(); }, 10)'>
                        <input type='hidden' value='$name' name='checkout'>
                        <input id='checkout_button' type='submit' value='Secure Checkout =>'>
                    </form><br>";

                    require_once("../PHP_files/showCart.php");
                    echo "<br><br>";
                }
                else {
                    echo ' 
                    <div class="information_page" id="eform">
                        <div class="align">
                            <div>
                                <h1>Your cart is empty.</h1>
                                <h3>Looking for shopping ideas? Check your home page for recommended products.</h3>
                            </div>
                            
                        </div>
                    </div>
                    ';
                }
            }
            else {
                echo ' 
                    <div class="information_page" id="eform">
                        <div class="align">
                            <div>
                                <h1>Your cart is empty.</h1>
                                <h3>Looking for shopping ideas? Check your home page for recommended products.</h3>
                            </div>
                            
                        </div>
                    </div>
                ';
            }
        ?>

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
