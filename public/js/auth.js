function isEmptyString(str) {
    if (!str) {
        return true;
    }
    return false;
}

function isValidEmail(email) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function isvalidUsername(username){
    const regex = /^[a-zA-Z0-9]{3,12}$/;
    return regex.test(String(username).toLowerCase());
}

function checkEmail() {
    const emailEl = document.getElementById('email'),
        emailVal = emailEl.value;
    if (!isEmptyString(emailVal)) {
        if (isValidEmail(emailVal)) {
            removeError('email');
            return true;
        } else {
            handleAuthError('email', 'Email is not valid');
            return false;
        }
    } else {
        handleAuthError('email', 'Email can not be empty');
        return false;
    }
}

function checkPassword() {
    const passwordEl = document.getElementById('password'),
        passwordVal = passwordEl.value;
    if (!isEmptyString(passwordVal)) {
        removeError('password');
        return true;
    } else {
        handleAuthError('password', 'Password can not be empty');
        return false;
    }
}

function checkUsername() {
    const usernameEl = document.getElementById('username'),
        usernameVal = usernameEl.value;
    if (!isEmptyString(usernameVal)) {

        if(isvalidUsername(usernameVal)){
            removeError('username');
            return true;
        }else{
            handleAuthError('username', 'Username lenght must be between 3 and 12 non-special characters!');
            return false;
        }

    } else {
        handleAuthError('username', 'Username can not be empty');
        return false;
    }
}

function handleAuthError(elId, error) {
    const el = document.getElementById(elId);
    el.classList.add('has-error');
    el.title = error;
}

function removeError(elId) {
    const el = document.getElementById(elId);
    el.classList.remove('has-error');
    el.title = '';
}

function onBtnLoginClick() {
    if (checkPassword()) {
        const url = `${BASE_URL}/login/auth`;
        payload = {
            "username": document.getElementById("username").value,
            "password": document.getElementById("password").value
        }
        httpClient.post(url, payload, function (res) {
            if (res.readyState == 4 && res.status == 200) {
                if(res.responseText==1){
                    toast.show('Login successfully !', 'toast-success');
                    window.location.replace('http://localhost/filmsbook-v2/films')
                }else{
                    toast.show('Login failed !', 'toast-error');
                    document.getElementById("login-error").style.display = "";
                }
            }
        });
    }
}

function onBtnSignupClick() {
    if (checkEmail() && checkPassword() && checkUsername()) {
        const url = `${BASE_URL}/signup/auth`;
        const xmlhttp = new XMLHttpRequest();
        payload = {
            "username": document.getElementById("username").value,
            "password": document.getElementById("password").value
        }
        httpClient.post(url, payload, function (res) {
            if (res.readyState == 4 && res.status == 200) {
                if(res.responseText==1){
                    toast.show('Signup successfully !', 'toast-success');
                    window.location.replace('http://localhost/filmsbook-v2/login')
                }else{
                    toast.show('Signup failed !', 'toast-error');
                    document.getElementById("signup-error").style.display = "";
                }
            }
        });
    }
}

window.addEventListener('DOMContentLoaded', (event) => {
    const emailEl = document.getElementById('email'),
        passwordEl = document.getElementById('password'),
        usernameEl = document.getElementById('username'),
        loginEl = document.getElementById('login'),
        signupEl = document.getElementById('signup');

    if (emailEl) {
        emailEl.addEventListener('blur', checkEmail);
    }

    if (passwordEl) {
        passwordEl.addEventListener('blur', checkPassword);
    }

    if (usernameEl) {
        usernameEl.addEventListener('blur', checkUsername);
    }

    if (loginEl) {
        loginEl.addEventListener('click', onBtnLoginClick);
    }

    if (signupEl) {
        signupEl.addEventListener('click', onBtnSignupClick);
    }
});