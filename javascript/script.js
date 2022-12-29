function login()
{
    console.log("LOGINING");
    var input = document.querySelector('#input');
    var email = document.querySelector('#email').value;
    var password = document.querySelector('#password').value;
    
    var options="email = " + email + "\npassword = " + password;
    var xhr = new XMLHttpRequest();

    xhr.open("POST", "../php/index.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function() {
        console.log(xhr.responseText);
        
        input.innerHTML=xhr.responseText;
    }
    xhr.send(options);
}