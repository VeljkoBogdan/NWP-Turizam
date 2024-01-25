"use strict";

function validateForm(type) {
    let isValid = true;

    if(type === 'login'){
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;
        //validate
        if(validateEmail(email) === false || email===""){
            isValid = false;
            document.getElementById('email-error').innerHTML = "Enter a valid email address";
        }
        if(validatePassword(password) === false || password===""){
            isValid = false;
            document.getElementById('password-error').innerHTML = "Enter a valid password";
        }
    }
    else{
        let firstName = document.getElementById('first-name').value;
        let lastName = document.getElementById('last-name').value;
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;
        let confirmPassword = document.getElementById('confirm-password').value;

        //validate
        if(firstName===""){
            isValid = false;
            document.getElementById('first-name-error').innerHTML = "Please enter your first name!";
        }
        if(lastName===""){
            isValid = false;
            document.getElementById('last-name-error').innerHTML = "Please enter your last name!";
        }
        if(validateEmail(email) === false || email === ""){
            isValid = false;
            document.getElementById('email-error').innerHTML = "Please enter a correct email address!";
        }
        if(validatePassword(password) === false || password === ""){
            isValid = false;
            document.getElementById('password-error').innerHTML = "Password must be 8 characters long and have a number and a special character!";
        }
        if(confirmPassword !== password){
            isValid = false;
            document.getElementById('confirm-password-error').innerHTML = "Passwords don't match!";
        }
    }
    return isValid;
}

// Regex Validators
function validateEmail(email) {
    let re = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/;
    return re.test(email);
}
function validatePassword(pass){
    let re = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    return re.test(pass);
}
function validatePhone(phone){
    let re = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
    return re.test(phone);
}
function isValidID(id) {
    return !isNaN(id) && id > 0;
}