//add an item to the shopping cart
function updateCart() {
    console.log("Hello");
    $(document).ready(function(){
        $.ajax({
            type: 'GET',
            url: '../PHP_files/getItems.php',
            dataType: 'int',
            success: function(result){
                let items_in_cart = result;
                document.getElementById("counter").innerHTML = items_in_cart;
            }
        });
    });
}


