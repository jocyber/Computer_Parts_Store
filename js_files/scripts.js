let items_in_cart = 0;

//add an item to the shopping cart
function add_to_cart() {
    items_in_cart++;
    document.getElementById("counter").innerHTML = items_in_cart;
}

function print() {
    console.log("hello, world");
}
