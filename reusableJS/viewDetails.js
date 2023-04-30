// Wait for the page to finish loading
$(document).ready(function() {
    // Attach a click event listener to the "View Details" button
    $("option[data-product-number]").click(function() {
        // Get the ID of the product that you want to view the details for
        var product_number = $(this).data("product-number");

      $(".modal h2").html("Product Details");
      $(".modal").show();
      $(".modal-content").html("Loading...");
      // Make an AJAX request to a server-side script that retrieves the details of the product with the given ID
      $.ajax({
        url: "getProductDetails.php",
        type: "POST",
        data: {product_number: product_number},
        success: function(response) {
          // Display the details of the product in a modal dialog
          $(".modal-content").html(response);
          
        },
        error: function() {
          alert("An error occurred while retrieving the product details.");
        }
      });
    });
    $("option[data-user-number]").click(function() {
        // Get the ID of the user that you want to view the details for
        var employee_id = $(this).data("user-number");

      $(".modal h2").html("User Details");
      $(".modal").show();
      $(".modal-content").html("Loading...");
      // Make an AJAX request to a server-side script that retrieves the details of the user with the given ID
      $.ajax({
        url: "getUserDetails.php",
        type: "POST",
        data: {employee_id: employee_id},
        success: function(response) {
          // Display the details of the user in a modal dialog
          $(".modal-content").html(response);
          
        },
        error: function() {
          alert("An error occurred while retrieving the user details.");
        }
      });
    });
  

  });
  