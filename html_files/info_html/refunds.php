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
                <li><a href="../systems.php">Computer Systems</a></li>
                <li><a href="../components.php">Components</a></li>
                <li><a href="../electronics.php">Electronics</a></li>
                <li><a href="../gaming.php">Gaming</a></li>
                <li><a href="../network.php">Networking Appliances</a></li>
                <li><a href="../office.php">Office Accessories</a></li>
            </ul>
        </div>

    </div>

    <div id="wrapper">
        <!--main banner of the website-->
        <br><br><br><br><br>
        <p class="direct"><a id="dir" href="../index.php">Home &nbsp</a><span style="color:lightgray;"> >&nbsp Refund Policy</span></p>
        <hr>

        <!--Refund information-->
        <div class="information_page">
            <h1 style="text-align: center;">Refund Policy</h1>

            <!--Information section-->
            <h2>General Information</h2>
            <p>
                The Computer Parts Store is not capable of issuing full refunds. After product delivery, it is up to the consumer to ensure that
                any systems or other accessories are not defective. <br><br>
                Making purchases through our online store means the user understands these parameters and consents to the refund policy that
                is a part of our terms and service.<br><br>
            </p>

            <h2>Causes for a Refund</h2>
            <p>
                As a customer of The Computer Parts Store, knowledge of the following is required to receive full service from one of our employees.

                <ul>
                    <li style="font-weight: bold;">Non-delivery of the product:</li>
                    <p>
                        In the case of non-delivery, a customer must submit a detailed essay explaining the situation and why we should care 
                        your pesky problems. Otherwise, we will assume it has been delivered. 
                    </p>
                    <li style="font-weight: bold;">Major Defects:</li>
                    <p>
                        Before every delivery, our team throughly examines all products before shipping them off for delivery. However, unexpected errors
                        may still occur. Once again, customers must submit a detailed essay explaining the situation within (3) business days of the product
                        being delivered. Whether the aforementioned parameters are met or not, we will most likely not do anything; deal with it. 
                    </p>
                    <li style="font-weight: bold;">Product not-as-described</li>
                    <p>
                        Users should contact the product author wihin (15) minutes of receiving the product if it doesn't meet the marketed
                        criteria. Detailed evidence and a full invesigation must have been conducted in order to be eligible for any response
                        what-so-ever. Either way, we probably won't do anything, so don't even bother.
                    </p>
                </ul>
            </p>

            <h2>How to Get a Refund</h2>
            <p>
                The Computer Parts Store doesn't issue refunds of any kind, be it full or partial. If any issue isn't resolved within 24 business hours, then
                it doesn't matter because you weren't getting a refund anyway. 
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
