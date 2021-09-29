let items_in_cart = 0;

function add_to_cart() {
    items_in_cart++;
    document.getElementById("counter").innerHTML = items_in_cart;
}