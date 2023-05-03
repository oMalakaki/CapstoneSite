const inventoryTips = [
  "Regularly review your inventory levels to avoid stockouts and overstocks.",
  "Organize your inventory in a way that makes sense for your business, such as by product type or popularity.",
  "Label your inventory clearly and accurately to make it easy to find and track.",
  "Train your employees on proper inventory management techniques to ensure everyone is on the same page.",
  "Consider implementing an automated inventory replenishment system to reduce the time and effort required to manage inventory.",
  "Regularly audit your inventory to identify discrepancies and ensure accuracy.",
  "Set par levels for your inventory to ensure that you always have enough stock on hand.",
  "Track your inventory turnover rate to identify slow-moving products and adjust your purchasing and marketing strategies accordingly.",
  "Keep track of expiration dates for perishable products and rotate stock to ensure that you're selling the oldest products first.",
  "Forecast demand for your products to avoid stockouts and overstocks.",
  "Assign responsibilities for inventory management tasks to specific employees to ensure accountability and efficiency.",
  "Conduct regular physical inventory counts to compare against your inventory records and identify discrepancies.",
  "Maintain accurate records of your inventory costs, including purchase price, shipping costs, and any other fees or taxes.",
  "Regularly review your sales data to identify trends and adjust your inventory levels and purchasing strategies accordingly.",
  "Consider implementing a barcoding system to make it easier to track and manage your inventory.",
  "Regularly communicate with your suppliers to ensure that you have accurate information on lead times and product availability.",
  "Implement a system for returning and disposing of damaged or expired products to minimize waste and improve inventory accuracy.",
  "Set up alerts for low inventory levels to ensure that you can restock before running out of stock.",
  "Regularly clean and organize your inventory storage areas to minimize the risk of damage or loss.",
];


  const newTipBtn = document.getElementById("new-tip-btn");
  const messageBot = document.querySelector(".message-bot");
  
  messageBot.innerHTML = `
  <h4>Hi there! Here's a tip for managing inventory in a small business:</h4>
  <p id="inventory-tip">${inventoryTips[0]}</p>
`;
  // generate a random wellness tip
  function generateWellnessTip() {
    const randomIndex = Math.floor(Math.random() * inventoryTips.length);

    messageBot.innerHTML = `
    <h4>Hi there! Here's a tip for managing inventory in a small business:</h4>
    <p id="inventory-tip">${inventoryTips[randomIndex]}</p>
  `;
  }
  

  
  // generate a new wellness tip when the button is clicked
  newTipBtn.addEventListener("click", generateWellnessTip);
  