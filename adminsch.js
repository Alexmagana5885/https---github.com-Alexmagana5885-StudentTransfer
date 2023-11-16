// Add hovered class to selected list item
let navigation = document.querySelector(".navigation");
let list = document.querySelectorAll(".navigation li");

function activeLink(event) {
  let target = event.target;
  if (target.tagName === "LI") {
    list.forEach((item) => {
      item.classList.remove("hovered");
    });
    target.classList.add("hovered");
  }
}

navigation.addEventListener("mouseover", activeLink);

// Menu Toggle
let toggle = document.querySelector(".toggle");
let main = document.querySelector(".main");

function toggleMenu() {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
}

toggle.onclick = toggleMenu;

// Function to toggle popups
function togglePopup(btn, popup) {
  btn.addEventListener('click', () => {
    popup.style.display = 'flex';
  });

  let closeBtn = popup.querySelector('.close');
  closeBtn.addEventListener('click', () => {
    popup.style.display = 'none';
  });
}

document.addEventListener('DOMContentLoaded', function () {
  const openPopupBtn1 = document.getElementById('openPopupBtn1');
  const popup1 = document.getElementById('popup1');
  togglePopup(openPopupBtn1, popup1);
});

document.addEventListener('DOMContentLoaded', function () {
  const openPopupBtn2 = document.getElementById('openPopupBtn2');
  const popup2 = document.getElementById('popup2');
  togglePopup(openPopupBtn2, popup2);
});


// Function to get URL parameter by name
function getParameterByName(name, url) {
  if (!url) url = window.location.href;
  name = name.replace(/[\[\]]/g, "\\$&");
  var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
      results = regex.exec(url);
  if (!results) return null;
  if (!results[2]) return '';
  return decodeURIComponent(results[2].replace(/\+/g, " "));
}
