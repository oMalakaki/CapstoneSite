function createSidebar() {
  const sidebar = document.createElement("nav");
  const list = document.createElement("ul");

  const links = [
    { href: "dashboard.html", text: "Dashboard" },
    { href: "usermanagement.html", text: "User Management" },
    { href: "items.html", text: "Items" },
    { href: "charges.html", text: "Charges" },
    { href: "reports.html", text: "Reports" },
    { href: "noverintai.html", text: "Noverint AI" },
  ];

  links.forEach((link) => {
    const listItem = document.createElement("li");
    const anchor = document.createElement("a");
    anchor.href = link.href;
    anchor.textContent = link.text;

    if (window.location.pathname.includes(link.href)) {
      anchor.classList.add("active");
    }

    listItem.appendChild(anchor);
    list.appendChild(listItem);
  });

  sidebar.appendChild(list);

  return sidebar;
}
