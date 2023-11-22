document.addEventListener('DOMContentLoaded', function () {
  const buttons = document.querySelectorAll('.buttonResponse');

  buttons.forEach(function (button) {
      button.addEventListener('click', function () {
          const registrationNumber = button.getAttribute('data-registration-number');
          togglePopup(registrationNumber);
      });
  });
});

function togglePopup(registrationNumber) {
  const popup = document.getElementById(registrationNumber);

  if (popup) {
      if (popup.style.display === 'block' || popup.style.display === '') {
          popup.style.display = 'none';
      } else {
          popup.style.display = 'block';
      }
  }
}


document.addEventListener("DOMContentLoaded", function () {
  const openPopupBtnSS = document.getElementById("openPopupBtn1");
  const popupSS = document.getElementById("registration_number");
  togglePopup(openPopupBtnSS, popupSS);
});

closePopupBtn1.addEventListener("click", () => {
  popupSS.style.display = "none";
});