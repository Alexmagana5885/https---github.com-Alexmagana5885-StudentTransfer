document.addEventListener('DOMContentLoaded', function() {
    const openPopupBtn1 = document.getElementById('openPopupBtn1');
    const openPopupBtn2 = document.getElementById('openPopupBtn2');
    const openPopupBtn3 = document.getElementById('openPopupBtn3');
    const closePopupBtn1 = document.getElementById('closePopupBtn1');
    const closePopupBtn2 = document.getElementById('closePopupBtn2');
    const closePopupBtn3 = document.getElementById('closePopupBtn3');
    const popup1 = document.getElementById('popup1');
    const popup2 = document.getElementById('popup2');
    const popup3 = document.getElementById('popup3');

    openPopupBtn1.addEventListener('click', () => {
        popup1.style.display = 'flex';
    });

    openPopupBtn2.addEventListener('click', () => {
        popup2.style.display = 'flex';
    });

    openPopupBtn3.addEventListener('click', () => {
        popup3.style.display = 'flex';
    });

    closePopupBtn1.addEventListener('click', () => {
        popup1.style.display = 'none';
    });

    closePopupBtn2.addEventListener('click', () => {
        popup2.style.display = 'none';
    });

    closePopupBtn3.addEventListener('click', () => {
        popup3.style.display = 'none';
    });
});
