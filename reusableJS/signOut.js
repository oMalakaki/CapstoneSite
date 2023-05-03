accountIcon = document.getElementById("accountIcon");
// Add click event listener to accountIcon element
accountIcon.addEventListener("click", function() {
  //if the sign out div exists, remove it
  if (document.getElementById("signOutDiv")) {
    document.getElementById("signOutDiv").remove();
    return;
  }else{
  console.log("account icon clicked");
  // Create a div element for sign out option
  const signOutDiv = document.createElement("div");
  signOutDiv.setAttribute("id", "signOutDiv");

  // Create a sign out button
  const signOutButton = document.createElement("button");
  signOutButton.innerHTML = "Sign Out";
  signOutButton.setAttribute("id", "signOutButton");

  // Add click event listener to sign out button
  signOutButton.addEventListener("click", function() {
    // Redirect user to logout.php page
    window.location.href = "logout.php";
  });

  // Add sign out button to sign out div
  signOutDiv.appendChild(signOutButton);

  // Add sign out div to document body
  document.body.appendChild(signOutDiv);
}
});