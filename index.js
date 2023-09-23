// Function to redirect to the "Register" page
function redirectToRegister() {
window.location.href = 'register.html';
}

// Function to redirect to the "Login" page
function redirectToLogin() {
 window.location.href = 'login.html';
}

// Function to redirect to the "Login" page for the options
function redirectToLoginOptions() {
window.location.href = 'login.html';
}
// Add click event listeners to the buttons
const registerButton = document.querySelector('.regLog .btnLogin-popup');
const loginButton = document.querySelector('.options .btnLogin-popup');
const secondaryTransferButton = document.getElementById('secondaryTransfer');
const primaryTransferButton = document.getElementById('primaryTransfer');
const universityTransferButton = document.getElementById('universityTransfer');

registerButton.addEventListener('click', redirectToRegister);
loginButton.addEventListener('click', redirectToLogin);
secondaryTransferButton.addEventListener('click', redirectToLoginOptions);
primaryTransferButton.addEventListener('click', redirectToLoginOptions);
universityTransferButton.addEventListener('click', redirectToLoginOptions);
  