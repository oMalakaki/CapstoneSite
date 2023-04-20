function createSidebar() {
  const sidebar = document.createElement("nav");
  const list = document.createElement("ul");

  const links = [
    { href: "dashboard.html", text: "Dashboard", image: "pictures/icons/dashboard.svg" },
    { href: "products.html", text: "Products", image: "pictures/icons/ad_product.svg" },
    { href: "sales.html", text: "Sales", image: "pictures/icons/coins.svg" },
    { href: "orders.html", text: "Orders", image: "pictures/icons/dollar.svg" },
    { href: "reports.html", text: "Reports", image: "pictures/icons/report.svg" },
    { href: "usermanagement.html", text: "User Management", image: "pictures/icons/users.svg" },
  ];
  
  links.forEach((link) => {
    const listItem = document.createElement("li");
    const anchor = document.createElement("a");
    anchor.href = link.href;
    anchor.innerHTML = `
      <div style="display: flex; align-items: center;">
        <img src="${link.image}" alt="${link.text} icon" style="width: 2em; margin-right: 15px;">
        <span>${link.text}</span>
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
