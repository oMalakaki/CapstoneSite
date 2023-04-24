function createHeader() {
  // Create header element
  const header = document.createElement("header");

  // Create logo container element
  const logoContainer = document.createElement("div");
  logoContainer.classList.add("noverintLogo");

  const loginLink = document.createElement("a");
  loginLink.href = "index.html";
  // Create logo image element
  const logoImg = document.createElement("img");
  logoImg.src = "./pictures/noverint.svg";

  loginLink.appendChild(logoImg);
  // Create account icon image element
  const accountIcon = document.createElement("img");
  accountIcon.src = "./pictures/icons/account.png";
  accountIcon.setAttribute("id", "accountIcon");

  

  const assistantIcon = document.createElement("img");
  assistantIcon.src = "./pictures/icons/assistant.svg";
  assistantIcon.setAttribute("id", "assistantIcon");

  const rightSideDiv = document.createElement("div");
  rightSideDiv.classList.add("rightSideDiv");
  rightSideDiv.appendChild(assistantIcon);
  rightSideDiv.appendChild(accountIcon);
  

  // Append logo and account icon elements to header and logo container elements, respectively
  logoContainer.appendChild(loginLink);
  header.appendChild(logoContainer);
  header.appendChild(rightSideDiv);
 
  return header;
}
