"use strict";
// Form validation function
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
// Password recovery form validation function
function validatePasswordRecovery() {
    let isValid = true;
    let password = document.getElementById("password").value;
    let confirmPassword = document.getElementById("confirm-password").value;

    if(validatePassword(password) === false){
        isValid = false;
        document.getElementById('password-error').innerHTML = "The password must have 8 characters, at least one number, uppercase letter and special character!";
    }
    if(confirmPassword !== password){
        isValid = false;
        document.getElementById('password-confirmation-error').innerHTML = "Passwords don't match!";
    }
    return isValid;
}
// Email for recovery validation function
function validatePasswordRecoveryEmail() {
    let isValid = true;
    let forgottenEmail = document.getElementById('forgot-password-email').value.trim();

    if(validateEmail(forgottenEmail) === false){
        isValid = false;
    }
    alert(isValid);
    return isValid;
}
// Change user password validation function
function validatePasswordChange() {
    let isValid = true;
    let password = document.getElementById("password").value;
    let newPassword = document.getElementById('new-password').value;
    let confirmPassword = document.getElementById("confirm-password").value;

    if(validatePassword(password) === false || password===""){
        isValid = false;
        document.getElementById('password-error').innerHTML = "The password must have 8 characters, at least one number, uppercase letter and special character!";
    }
    if(validatePassword(newPassword) === false || newPassword===""){
        isValid = false;
        document.getElementById('new-password-error').innerHTML = "The password must have 8 characters, at least one number, uppercase letter and special character!";
    }
    if(confirmPassword !== newPassword || confirmPassword===""){
        isValid = false;
        document.getElementById('confirm-password-error').innerHTML = "Passwords don't match!";
    }
    return isValid;
}

// Login and Signup password visibility toggler
function togglePasswordVisibilitySignUp(){
    let passwordInput = document.getElementById('password');
    let confirmPasswordInput = document.getElementById('confirm-password');
    let toggleButton = document.getElementById('toggle-button');
    let toggleButtonConfirm = document.getElementById('toggle-button-confirm');
    // If the password is visible
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        confirmPasswordInput.type = 'text';
        toggleButton.textContent = 'Hide';
        toggleButtonConfirm.textContent = 'Hide';
    } else {
        // If the password is invisible
        passwordInput.type = 'password';
        confirmPasswordInput.type = 'password';
        toggleButton.textContent = 'Show';
        toggleButtonConfirm.textContent = 'Show';
    }
}
function togglePasswordVisibilityLogin(){
    let passwordInput = document.getElementById('password');
    let toggleButton = document.getElementById('toggle-button');
    // If the password is visible
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleButton.textContent = 'Hide';
    } else {
        // If the password is invisible
        passwordInput.type = 'password';
        toggleButton.textContent = 'Show';
    }
}
function togglePasswordVisibilityNew(){
    let newPassword = document.getElementById('new-password');
    let confirmPasswordInput = document.getElementById('confirm-password');
    let toggleButtonNew = document.getElementById('toggle-button-new');
    let toggleButtonConfirm = document.getElementById('toggle-button-confirm');
    // If the password is visible
    if (newPassword.type === 'password') {
        newPassword.type = 'text';
        confirmPasswordInput.type = 'text';
        toggleButtonNew.textContent = 'Hide';
        toggleButtonConfirm.textContent = 'Hide';
    } else {
        // If the password is invisible
        newPassword.type = 'password';
        confirmPasswordInput.type = 'password';
        toggleButtonNew.textContent = 'Show';
        toggleButtonConfirm.textContent = 'Show';
    }
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