//add an item to the shopping cart
window.onload = function() {
    $.ajax({
        type: 'GET',
        url: '../PHP_files/getItems.php',
        success: function(result){
            if(result !== "") {
                let items_in_cart = result;
                document.getElementById("counter").innerHTML = items_in_cart;
            }
        }
    });
}


