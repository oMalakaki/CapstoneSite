//js code for modal when user presses add product button
//modal is 25% of the screen width and 100% of screen height
//modal is on the right side of the screen
//modal has a close button
//modal has a form with 3 inputs
//modal has a submit button



function openModal() {
    var modal = document.getElementById("modal");
    modal.style.display = "block";
  }
  
  function closeModal() {
    var modal = document.getElementById("modal");
    modal.style.display = "none";
  }
  
  var closeSpan = document.querySelector("#modal .close");
closeSpan.addEventListener("click", closeModal);
