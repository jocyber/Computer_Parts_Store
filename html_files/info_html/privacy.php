<?php
    session_start();
?>

<!DOCTYPE html>

<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <link rel="stylsheet" text="text/css" href="../../css_files/normalize.css">
        <link rel="stylesheet" text="text/css" href="../../css_files/styles.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script type="text/javascript" src="../../js_files/call.js"></script>

        <title>Computer Parts Store</title>
    </head>

    <body style="background-color: #131313;">
										
    	<!--Search bar-->
    <div class="browse_pages">
        <div>
            <a href="../shopping.php"><img src="../../images/cart.png" id="shopping" title="Shopping Cart" alt="Shopping Cart"></a>
            <p class="item_num" id="counter">0</p>	
        </div>
													     
	<!--Log in--> 

    <?php 
    if(!isset($_SESSION["uname"])) {
        echo '
        <button onclick="document.getElementById(\'id01\').style.display=\'block\'" style="width:auto;" id="close-image"><img src="../../images/user.png"></button>

        <div id="id01" class="modal">
        
            <form class="modal-content animate" action="../../PHP_files/login.php" method="post">
                <div class="imgcontainer">
                    <span onclick="document.getElementById(\'id01\').style.display=\'none\'" class="close" title="Close Modal">&times;</span>
                    </div>

                <div class="container">
                    <label for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="uname" required>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" required>
                        
                    <button type="submit" class ="loginbtn">Login</button>
                </div>

                <br><br>
                <br><br>

                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById(\'id01\').style.display=\'none\'" class="cancelbtn">Cancel</button>
                    <a href="../../html_files/signup.php">Sign up</a>
                    <span class="psw">Forgot <a href="../reset_password.php">password?</a></span>
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
        <form method='post' action='../../PHP_files/login.php'>
            <input id='logout' type='submit' name='logout' value='Logout'>
        </form>
        ";
    }

    ?>

         <!--Store's logo-->                                                                                                  
         <div>
            <a href="../index.php">
             <img src="../../images/logo.png" alt="Store logo" title="home page" id="icon">
	        </a>
        </div>

        <div id="search">
            <form action="../search_results.php" method="GET"> 
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
        <!--main banner of the website-->
        <br><br><br><br><br>
        <p class="direct"><a id="dir" href="../index.php">Home &nbsp</a><span style="color:lightgray;"> >&nbsp Privacy and Security</span></p>
        <hr>

        <!--Refund information-->
        <div class="information_page">
            <h1 style="text-align: center;">Privacy and Security</h1>

            <!--Information section-->
            <h2>What Information do we Collect?</h2>
            <p>
                The Computer Parts Store is completely transparent about the information we collect. There are a couple pieces of data we collect
                for finanical reasons. <br><br>
                
                <ul>
                    <li style="font-weight: bold;">Information You Give Us: </li>
                    <p>
                        Any and all information that we collect is made clear to the user in form of pop-ups, which the option to opt-out will
                        be given and honored by The Computer Parts Store. 
                    </p>
                    <li style="font-weight: bold;">Cookies: </li>
                    <p>
                        Cookies in the user's web browser is collected and stored in a database simply for the convenience of the user and not 
                        for financial gain. 
                    </p>
                </ul>
                
                <br>
            </p>

            <h2>Why do we Collect User Data?</h2>
            <p>
                <ul>
                    <li style="font-weight: bold;">Delivery of products: </li>
                    <p>
                        We use personal information simply for delivering products. This information includes name, address, and payment method information.
                    </p>
                    <li style="font-weight: bold;">Advertising:</li>
                    <p>
                        In order for The Computer Parts Store to continue providing our services the way we do, advertisements are necessary to maintain
                        this business model. We do not use this information to show you ads based on your interests; we collect this information in the most
                        anonymous way possible.  
                    </p>
                    <li style="font-weight: bold;">Fraud Prevention: </li>
                    <p>
                        Information will be used to prevent and detect fraud and abuse of one of our customers. 
                    </p>
                </ul>
            </p>
        </div>

        <!--Bottom styling-->
        <div class="bottom">
            <footer>
                 <ul>
                    <li class="title">Customer Service</li><br>
                    <a href="refunds.php">Return Policy</a><br>
                    <a href="privacy.php">Privacy and Security</a><br>
                    <a href="feedback.php">Feedback</a>
                </ul>

                <ul>
                    <li class="title">Company Information</li><br>
                    <a href="about.php">About Computer Parts</a><br>
                    <a href="hours.php">Hours</a><br>
                    <a href="locations.php">Locations</a><br>
                </ul>
            </footer>
            <br>
        </div>

    </div>  

    </body>

</html>
