function editProduct(product_number) {
    console.log("clicked")
    // Create a new XMLHttpRequest object to make a request to the server
    var xhttp = new XMLHttpRequest();
    
    // Define the callback function to handle the response from the server
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        // Parse the response as JSON
        var product = JSON.parse(this.responseText);
        
        // Create an HTML form to display the product details and allow editing
        var formHtml = "<form>";
        formHtml += "<input type='hidden' name='product_number' value='" + product.product_number + "' />";
        formHtml += "<label>Product Name</label><input type='text' name='product_name' value='" + product.product_name + "' /><br />";
        formHtml += "<label>Product Quantity</label><input type='number' name='quantity' value='" + product.quantity + "' /><br />";
        formHtml += "<label>Original Price</label><input type='number' name='og_price' value='" + product.og_price + "' /><br />";
        formHtml += "<label>Sale Price</label><input type='number' name='sale_price' value='" + product.sale_price + "' /><br />";
        formHtml += "<label>Date of Manufacturing</label><input type='date' name='DoM' value='" + product.DoM + "' /><br />";
        formHtml += "<label>Date of Expiration</label><input type='date' name='expiry' value='" + product.expiry + "' /><br />";
        formHtml += "<button type='submit' onclick='updateProduct(event)'>Save</button>";
        formHtml += "</form>";
        
        // Replace the product details with the form
        var productDetails = document.getElementById("product-details");
        productDetails.innerHTML = formHtml;
      }
    };
    
    // Send a GET request to the server to retrieve the details of the product with the given ID
    xhttp.open("POST", "getProductDetails.php?product_number=" + product_number, true);
    xhttp.send();
  }
  
  // Define the updateProduct function to send the updated product details to the server
  function updateProduct(event) {
    // Prevent the form from submitting normally
    event.preventDefault();
    
    // Get the form data as a URL-encoded string
    var formData = new FormData(event.target.form);
    var encodedFormData = new URLSearchParams(formData).toString();
    
    // Create a new XMLHttpRequest object to make a request to the server
    var xhttp = new XMLHttpRequest();
    
    // Define the callback function to handle the response from the server
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        // Refresh the page to show the updated product details
        location.reload();
      }
    };
    
    // Send a POST request to the server to update the product details
    xhttp.open("POST", "update_product.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(encodedFormData);
  }
  