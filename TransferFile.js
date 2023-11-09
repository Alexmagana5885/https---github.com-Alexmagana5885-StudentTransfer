const openPopupBtn = document.getElementById('openPopupBtn');
const closePopupBtn = document.getElementById('closePopupBtn');
const popup = document.getElementById('popup');

openPopupBtn.addEventListener('click', () => {
    popup.style.display = 'flex';
});

closePopupBtn.addEventListener('click', () => {
    popup.style.display = 'none';
});
