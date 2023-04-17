function createSidebar() {
  //Create a nav element with a variable name sidebar
  const sidebar = document.createElement("nav");
  //Create a unordered list with a variable name list
  const list = document.createElement("ul");

  //Define the pages listed in the list
  const links = [
    { href: "dashboard.html", text: "Dashboard" },
    { href: "products.html", text: "Products" },
    { href: "sales.html", text: "Sales" },
    { href: "orders.html", text: "Orders" },
    { href: "reports.html", text: "Reports" },
    { href: "usermanagement.html", text: "User Management" },

  ];
  
  //for each link make it a list element and a link (a) element
  links.forEach((link) => {
    const listItem = document.createElement("li");
    const anchor = document.createElement("a");
    anchor.href = link.href;
    anchor.textContent = link.text;

    //add the active class to the link based on the URL of the page
    if (window.location.pathname.includes(link.href)) {
      anchor.classList.add("active");
    }

    listItem.appendChild(anchor);
    list.appendChild(listItem);
  });

  sidebar.appendChild(list);

  return sidebar;
}
