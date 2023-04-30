// Get the modal element
const modal = document.getElementById("modal");
const modalContent = document.querySelector(".modal-content");
const addProuctFormManual = document.getElementById("add-product-form-manual");
const addProuctFormAutomatic = document.getElementById("add-product-form-automatic");
const addUserForm = document.getElementById("add-user-form");
const modalAssistant = document.getElementById("assistantModal");
const nav = document.querySelector("nav");
const navText = document.querySelectorAll("#navText");
const main = document.querySelector("main");


// Get the button that opens the modal
const addProductButton = document.querySelector(".open-modal-button-product");
const addUserButton = document.querySelector(".open-modal-button-user");
const assistantButton = document.querySelector("#assistantIcon");

// Get the <span> element that closes the modal
const closeBtn = document.querySelector(".close");

function resetSelect(selectElement) {
  if (selectElement.value !== 'default') {
    selectElement.value = 'default';
  }
}

function modalOpen() {

  modalAssistant.style.right = ".25em";
  nav.style.width = "6em";
  main.style.marginLeft = "7em";
  main.style.paddingRight = "26em";
  for (let i = 0; i < navText.length; i++) {
    navText[i].style.display = "none";
  }
}

function showManualProduct(){
  console.log("clicked")
  addProuctFormManual.style.display = "flex";
  modalContent.innerHTML = addProuctFormManual.outerHTML;
}



document.addEventListener("DOMContentLoaded", function () {
  // Save data to storage when the user leaves the page
    //use local storage to determine whether the assistant modal is open or not
    window.addEventListener("load", function () {
      var elements = document.querySelectorAll(".css-transitions-only-after-page-load");
      for (var i = 0; i < elements.length; i++) {
        var element = elements[i];
        setTimeout(function (element) {
          element.classList.remove("css-transitions-only-after-page-load");
        }, 10, element);
      }
    });
    if (localStorage.getItem("modalassistantData") === "true") {
      modalOpen();
    }
  window.addEventListener("beforeunload", function () {
    if (modalAssistant.style.right === "0.25em") {
      localStorage.setItem("modalassistantData", "true");

    } else {
      localStorage.setItem("modalassistantData", "false");
    }
  });



  // if addproductbutton exists, add event listener
  if (addProductButton) {
    // When the user clicks the button, open the modal
    addProductButton.onclick = function () {
      modal.style.display = "block";
      addProuctFormAutomatic.style.display = "flex";
      modalContent.innerHTML = addProuctFormAutomatic.outerHTML;
      
      
  
    };
  }
  if (addUserButton) {
    // When the user clicks the button, open the modal
    addUserButton.onclick = function () {
      modal.style.display = "block";
      modalContent.innerHTML = addUserForm.outerHTML;
      
      
  
    };
  }

  // depending on whether the modal is open or not, change the display
  assistantButton.onclick = function () {
    if (modalAssistant.style.right === "0.25em") {
      modalAssistant.style.right = null;
      nav.style.all = null;
      main.style.all = null;
      for (let i = 0; i < navText.length; i++) {
        navText[i].style.display = null;
      }
    } else {
      modalOpen();
    }
  };

  // When the user clicks on <span> (x), close the modal
  closeBtn.onclick = function () {
    modal.style.display = "none";
    modalContent.innerHTML = "";
    
  };


});
