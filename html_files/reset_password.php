<?php
    session_start();
?>

<!DOCTYPE html>

<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale = 1.0,maximum-scale = 1.0”>
        <link rel="stylesheet" text="text/css" href="../css_files/normalize.css">
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
                <br><br>

                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById(\'id01\').style.display=\'none\'" class="cancelbtn">Cancel</button>
                    <a href="signup.php">Sign up</a>
                    <span class="psw">Forgot <a href="reset_password.html">password?</a></span>
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
            <form action="search_results.php" method="GET"> 
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
        <p class="direct"><a id="dir" href="index.php">Home &nbsp</a><span style="color:gray;"> >&nbsp Components</span></p>
        <hr>

        <!--sign up form-->
        <br><br>
        <form action="../PHP_files/password.php" style="border:1px solid #ccc" method="post">
            <div class="reset" id="eform">
            <div class="container" style="color: white;">
                <h1>Reset Password</h1>
                <p>Please fill in this form to reset your password.</p>
                <hr>

                <label for="eml"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="eml" required>

                <label for="npsw"><b>New Password</b></label>
                <input type="password" placeholder="Enter New Password" name="npsw" required>
                
                <div class="clearfix">
                <button type="submit" name ="reset" class="cancelbtn" style="margin-top: 0;">Reset Password</button>
                </div>
            </div>
            </div>
        </form>



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
