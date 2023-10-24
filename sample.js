// script.js
const popupLink = document.getElementById('popup-link');
const popup = document.getElementById('popup');
const closePopup = document.getElementById('close-popup');

popupLink.addEventListener('click', function(event) {
    event.preventDefault();
    popup.style.display = 'flex';
});

closePopup.addEventListener('click', function() {
    popup.style.display = 'none';
});
