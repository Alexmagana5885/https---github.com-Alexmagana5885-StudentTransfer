// add hovered class to selected list item
let list = document.querySelectorAll(".navigation li");

function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};


document.addEventListener('DOMContentLoaded', function () {
  const openPopupBtn1 = document.getElementById('openPopupBtn1');
  const closePopupBtn1 = document.getElementById('closePopupBtn1');
  const popup1 = document.getElementById('popup1');

  openPopupBtn1.addEventListener('click', () => {
      popup1.style.display = 'flex';
  });

  closePopupBtn1.addEventListener('click', () => {
      popup1.style.display = 'none';
  });
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
