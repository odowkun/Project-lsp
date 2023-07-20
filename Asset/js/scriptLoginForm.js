let username = document.getElementById("usernameLogin");
let password = document.getElementById("passwordLogin");
let errorMessage = document.getElementsByClassName("errorMessage");
let errorText = document.getElementById("errorText");
let formlogin = $('#formlogin');

function validation() {
    if (username.value == "" && password.value == "") {
        errorMessage[0].style.display = 'flex';
        errorText.innerText = 'Please Input Your Username And Password';
        username.classList.add("valid");
        password.classList.add("valid");
        username.focus();
    } else if (username.value == "") {
        errorText.innerText = 'Please Input Your Username';
        password.classList.remove("valid");
        username.classList.add("valid");
        username.focus();
    } else if (password.value == "") {
        errorText.innerText = 'Please Input Your Password';
        username.classList.remove("valid");
        password.classList.add("valid");
        password.focus();
    } else if (username.value && password.value) {
        formlogin.submit();
    }
}