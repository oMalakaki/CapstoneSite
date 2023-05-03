var productInfo; 

function updatePricePerUnit() {
  var productName = document.getElementById("product-name").value;
  
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     
      productInfo = JSON.parse(this.responseText);
      document.getElementById("product-info").innerHTML =
        "<p>&#36;" + productInfo.og_price + "</p>";
        document.getElementById("price-per-unit").value = productInfo.og_price;
        updateTotal();
    }
  };
  xhttp.open("GET", "getPricePerUnit.php?product_name=" + encodeURIComponent(productName), true);
  xhttp.send();
  var productQuantityField = document.getElementById("product-quantity");
  if (productName.value !== "") {
    productQuantityField.removeAttribute("disabled");
  } else {
    productQuantityField.setAttribute("disabled", "");
  }
  
}

function updateTotal() {
  var productQuantity = document.getElementById("product-quantity").value;
  var totalPrice = productQuantity * productInfo.og_price; 
  document.getElementById("order-total-input").value = totalPrice;
  document.getElementById("order-total").innerHTML =
    "<p>&#36;" + totalPrice + "</p>";
    
}

