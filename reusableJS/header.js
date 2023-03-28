function createHeader() {
  // Create header element
  const header = document.createElement("header");

  // Create logo container element
  const logoContainer = document.createElement("div");
  logoContainer.classList.add("noverintLogo");

  // Create logo image element
  const logoImg = document.createElement("img");
  logoImg.src = "./pictures/noverint.svg";

  // Create account icon image element
  const accountIcon = document.createElement("img");
  accountIcon.src = "./pictures/account.png";

  // Append logo and account icon elements to header and logo container elements, respectively
  logoContainer.appendChild(logoImg);
  header.appendChild(logoContainer);
  header.appendChild(accountIcon);

  return header;
}
