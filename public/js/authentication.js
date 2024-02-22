const loginForm = document.getElementById('login-section');
const registerForm = document.getElementById('register-section');
const loginButton = document.getElementById('login-button');
const registerButton = document.getElementById('register-button');


function goLogin(){
    registerForm.style.display = 'none';
    loginForm.style.display = 'block';
    loginButton.classList.remove('unactive');
    registerButton.classList.add('unactive');
}

function goRegister(){
    loginForm.style.display = 'none';
    registerForm.style.display = 'block';
    loginButton.classList.add('unactive');
    registerButton.classList.remove('unactive');
}

