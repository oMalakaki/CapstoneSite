function createSidebar() {
  const sidebar = document.createElement("nav");

  sidebar.classList.add("css-transitions-only-after-page-load");
  
  const list = document.createElement("ul");

  const links = [
    { href: "dashboard.html", text: "Dashboard", image: "pictures/icons/dashboard.svg" },
    { href: "products.php", text: "Products", image: "pictures/icons/ad_product.svg" },
    { href: "sales.php", text: "Sales", image: "pictures/icons/coins.svg" },
    { href: "orders.php", text: "Orders", image: "pictures/icons/dollar.svg" },
    { href: "reports.html", text: "Reports", image: "pictures/icons/report.svg" },
    { href: "usermanagement.php", text: "User Management", image: "pictures/icons/users.svg" },
  ];
  
  links.forEach((link) => {
    const listItem = document.createElement("li");
    const anchor = document.createElement("a");
    anchor.href = link.href;
    anchor.innerHTML = `
      <div style="display: flex; align-items: center;">
        <img src="${link.image}" alt="${link.text} icon" style="width: 2em; margin-right: 15px;">
        <span id="navText">${link.text}</span>
      </div>
    `;

    if (window.location.pathname.includes(link.href)) {
      anchor.classList.add("active");
    }

    listItem.appendChild(anchor);
    list.appendChild(listItem);
  });

  sidebar.appendChild(list);

  return sidebar;
}
