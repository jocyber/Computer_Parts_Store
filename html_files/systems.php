<!DOCTYPE html>

<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale = 1.0,maximum-scale = 1.0”>
        <link rel="stylesheet" text="text/css" href="../css_files/normalize.css">
        <link rel="stylesheet" text="text/css" href="../css_files/styles.css">
        <script src="../js_files/scripts.js" type="text/javascript"></script>

        <title>Computer Parts Store</title>
    </head>

    <body>
        <!--Search bar-->
    <div class="browse_pages">
	<div>
	    <!--shopping cart image-->
            <a href="shopping.html"><img src="../images/shopping_cart.png" id="shopping" title="Shopping Cart" alt="Shopping Cart"></a>
	    <p class="item_num" id="counter"></p>														  
        </div>		     
	
	<!--Log in--> 

         <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;" id="close-image"><img src="../images/user.png"></button>

         <div id="id01" class="modal">

         <form class="modal-content animate" action="/action_page.php" method="post">
             <div class="imgcontainer">
             <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
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
                    <input type="checkbox" name="remember" class="checkbox">Remember me
                </label>
            <br><br>

             <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                <span class="psw">Forgot <a href="#">password?</a></span>
             </div>
         </form>
         </div>

         <script>
         // Get the modal
         var modal = document.getElementById('id01');

         // When the user clicks anywhere outside of the modal, close it
         window.onclick = function(event) {
             if (event.target == modal) {
                 modal.style.display = "none";
             }
         }
         </script>

         <!--Store's logo-->                                                                                                  
         <div>
            <a href="index.php">
             <img src="../images/logo.png" alt="kawaii anime" title="home page" id="icon">
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
        <p class="direct"><a id="dir" href="index.php">Home &nbsp</a><span style="color:gray;"> >&nbsp Computer Systems</span></p>
        <hr>

        <!--where products appear-->
        <div class="page_border">
            <?php $tab = "systems"; require_once('../PHP_files/query_database.php'); ?>
        </div>

        <!--Bottom styling-->
        <div class="bottom">
            <footer>
                <ul>
                    <li class="title">Customer Service</li><br>
                    <a href="info_html/refunds.html">Return Policy</a><br>
                    <a href="info_html/privacy.html">Privacy and Security</a><br>
                    <a href="info_html/feedback.html">Feedback</a>
                </ul>

                <ul>
                    <li class="title">Company Information</li><br>
                    <a href="info_html/about.html">About Computer Parts</a><br>
                    <a href="info_html/hours.html">Hours</a><br>
                    <a href="info_html/locations.html">Locations</a><br>
                </ul>
            </footer>
            <br>
        </div>
    </div>  
    </body>
</html>
