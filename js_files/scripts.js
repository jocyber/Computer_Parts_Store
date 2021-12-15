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

function validateInput() {
    return validateEmail() && validateUsername() && validatePassword(); 
}

function validateEmail() {      
    let data = new FormData();
    data.append("email", document.getElementById("email").value);
    //regular expression for email
    const emailPattern = new RegExp(
        /^[a-zA-Z0-9][\-_\.\+\!\#\$\%\&\'\*\/\=\?\^\`\{\|]{0,1}([a-zA-Z0-9][\-_\.\+\!\#\$\%\&\'\*\/\=\?\^\`\{\|]{0,1})*[a-zA-Z0-9]@[a-zA-Z0-9][-\.]{0,1}([a-zA-Z][-\.]{0,1})*[a-zA-Z0-9]\.[a-zA-Z0-9]{1,}([\.\-]{0,1}[a-zA-Z]){0,}[a-zA-Z0-9]{0,}$/i
    );

    if(emailPattern.test(data.get("email"))) {
        return true;
    } 

    alert("Invalid email address.");
    return false;
} 

function validateUsername() {      
    let data = new FormData();
    data.append("user", document.getElementById("username").value);
    //regular expression for email
    const userPattern = new RegExp(
        /^[a-zA-Z\-]+$/
    );

    if(userPattern.test(data.get("user"))) {
        return true;
    } 

    alert("Invalid username.");
    return false;
} 

function validatePassword() {      
    let data = new FormData();
    data.append("pass", document.getElementById("password").value);
    //regular expression for email
    const passwordPattern = new RegExp(
        /^[a-zA-Z\-]+$/
    );

    if(passwordPattern.test(data.get("pass"))) {
        return true;
    } 

    alert("Invalid password.");
    return false;
} 


