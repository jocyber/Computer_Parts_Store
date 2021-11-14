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
            <a href="../shopping.html"><img src="../../images/cart.png" id="shopping" title="Shopping Cart" alt="Shopping Cart"></a>
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
        <form method='post' action='../../PHP_files/login.php' onsubmit='setTimeout(function () { window.location.reload(); }, 10)'>
            <input id='logout' type='submit' name='logout' value='Logout'>
        </form>
        ";
    }

    ?>
													     

         <!--Store's logo-->                                                                                                  
         <div>
            <a href="../index.php">
             <img src="../../images/logo.png" alt="kawaii anime" title="home page" id="icon">
	        </a>
        </div>

        <div id="search">
            <form> 
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
                <li><a href="../eletronics.php">Electronics</a></li>
                <li><a href="../gaming.php">Gaming</a></li>
                <li><a href="../network.php">Networking Appliances</a></li>
                <li><a href="../office.php">Office Accessories</a></li>
            </ul>
        </div>

    </div>

    <div id="wrapper">
        <!--main banner of the website-->
        <br><br><br><br><br>
        <p class="direct"><a id="dir" href="../index.php">Home &nbsp</a><span style="color:lightgray;"> >&nbsp About</span></p>
        <hr>

        <!--Refund information-->
        <div class="information_page">
            <h1 style="text-align: center;">About Computer Parts</h1>

            <!--Information section-->
            <h2>What do we sell?</h2>
            <p>
                The Computer Parts Store sells a wide variety of computer parts, each with their own important functions. <br><br>
                
                <ul>
                    <li style="font-weight: bold;">Case: </li>
                    <p>
                        The case of a computer is simply used to store all of the parts, protecting them from their environment.
                    </p>
                    <li style="font-weight: bold;">Motherboard: </li>
                    <p>
                        The motherboard is the building board for the computer. It contains slots for the CPU, GPU, and RAM, and can provide
			additional features such as wifi. 
                    </p>
                    <li style="font-weight: bold;">Processor (CPU): </li>
                    <p>
                        The processor is the heart of the computer. It runs instructions and tells the other parts what to do.
                    </p>
                    <li style="font-weight: bold;">Graphics Card (GPU): </li>
                    <p>
                        The graphics card, or the Graphics Processing Unit (GPU), is a processor that is specifically designed to render graphics
			more quickly for things such as editing video or playing video games. The GPU is not necessary for the computer to work,
			but it provides benefits for people who use their computers for specialized reasons.
                    </p>
                    <li style="font-weight: bold;">Random Access Memory (RAM): </li>
                    <p>
                        Random Access Memory is the short term memory of a computer, which temporarily stores everything that is running on the
			computer at any time. More RAM allows you to have more things open concurrently.
                    </p>
                    <li style="font-weight: bold;">Storage (SSD, HDD): </li>
                    <p>
                        General storage in a computer can be generalized down to two parts: Solid State Drives (SSD) and Hard Disc Drives (HDD).
			Solid State Drives allow things to load faster, but are generally more expensive. Hard Disc Drives (HDD) have been the
			standard of storage for a long time because of their relatively cheap cost.
                    </p>
                    <li style="font-weight: bold;">Power Supply Unit (PSU): </li>
                    <p>
                        The Power Supply Unit does exactly what it says, it supplies power to the other parts! It is important to know how much
			power your computer parts use in order to have it run properly.
                    </p>
                </ul>
                
                <br>
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
