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
        <p class="direct"><a id="dir" href="../index.php">Home &nbsp</a><span style="color:lightgray;"> >&nbsp Feedback</span></p>
        <hr>

        <!--feedback information-->
        <br><br>
        <div class="information_page" id="eform">
            <div class="align">
                <div>
                    <h1>Send us your Feedback!</h1>
                </div>

                <!--Information section-->
                <h3><em>This page is intended for our customers to provide feedback about their experience on the site.</em></h3>
                <br>

                <form>
                        <p>Were you able to acheive your goal on the site?</p>
                        <input type="radio" id="yes" name="goal" value="Yes">
                        <label for="yes">Yes</label>

                        <input type="radio" id="partially" name="goal" value="partially">
                        <label for="partially">Partially</label>

                        <input type="radio" id="no" name="goal" value="No">
                        <label for="no">No</label>
                  
                    <br><br><br>

                    <!--Reason for visit-->
                    <label for="reason">What is the reason for your visit?</label>
                    <br><br>

                    <!--dropdown menu-->
                    <select name="reas" id="reason">
                        <option value="buy">To Buy an Item</option>
                        <option value="refund">To Request a Refund</option>
                        <option value="friend">Buy an Item for a Friend</option>
                        <option value="price">Find Pricelists</option>
                        <option value="other">Other...</option>
                    </select> <br><br><br>

                    <!--additional information-->
                    <label for="addition">Do you have any other suggestions for our website?</label>
                    <br><br>
                    <input type="text" id="addition" name="other" style="width: 65%; padding-bottom: 100px;">
                    <br><br>

                    <!--Submit and cancel buttoms-->
                    <input type="submit" value="Submit" class="button">
                    <input type="reset" value="Cancel" class="button">
                    <br><br><br>
                </form>
            </div>
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
