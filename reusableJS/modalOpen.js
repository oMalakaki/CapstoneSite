//js code for modal when user presses add product button
//modal is 25% of the screen width and 100% of screen height
//modal is on the right side of the screen
//modal has a close button
//modal has a form with 3 inputs
//modal has a submit button

// Get the modal element
const modal = document.getElementById("modal");

// Get the button that opens the modal
const addProductButton = document.querySelector(".open-modal-button");

// Get the <span> element that closes the modal
const closeBtn = document.querySelector(".close");

// When the user clicks the button, open the modal
addProductButton.onclick = function () {
  modal.style.display = "block";
};

// When the user clicks on <span> (x), close the modal
closeBtn.onclick = function () {
  modal.style.display = "none";
};

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};
