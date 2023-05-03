<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Inventory Management System</title>
  <link rel="stylesheet" href="dashboardstyles.css" />
  <link rel="stylesheet" href="styles.css" />
  <script src="reusableJS/header.js"></script>
  <script src="reusableJS/sidebar.js"></script>
  <script src="reusableJS/assistantModal.js"></script>
  <script src="https://code.jquery.com/jquery-latest.min.js"></script>
</head>

<body>
  <!-- Append Header and Sidebar JS elements -->
  <script>
    const header = createHeader();
    document.body.prepend(header);
    const sidebar = createSidebar();
    document.body.appendChild(sidebar);
    const assistantModal = createAssistantModal();
    document.body.appendChild(assistantModal);
  </script>

  <!-- HTML for Page -->
  <main class="Orders-page css-transitions-only-after-page-load">
    <section class="items-section">
      <h2>Orders</h2>

      <!-- search and button elements -->
      <div class="search-and-button">
        <!-- A search bar the user can use to search through the table -->
        <div>
          <input type="text" id="search" name="search" placeholder="Search for an Order..." />

        </div>

        <!-- A button that opens the modal.js to add a new Order -->
        <button class="open-modal-button-order" id="open-modal-button">Place Order</button>
      </div>

      <!-- Modal for adding a new Order -->
      <div id="modal" class="modal">
        <span class="close">&times;</span>
        <h2>Add a New Order</h2>
        <div class="modal-content">

          <form action="" method="POST" id="add-order-form">
            <label for="vendor-name">Vendor</label>
            <select id="vendor-name" name="vendor-name" required>
              <option selected disabled>
                Select a Vendor
              </option>
              <option value="B&B">
                B&B
              </option>
            </select>
            <label for="product-name">Product</label>
            <select id="product-name" name="product-name" required onchange="updatePricePerUnit()">

              <option selected disabled>
                Select a Product
              </option>
              <!-- connect to products table to find options for all existing products -->
              <?php
              include("databaseconnect.php");
              $sql = "SELECT * FROM product";

              $result = mysqli_query($con, $sql);
              while ($row = mysqli_fetch_array($result)) {
                echo "<option value='" . $row['product_name'] . "'>" . $row['product_name'] . "</option>";
              }

              ?>

            </select>
            <!-- input for product quantity integer only-->
            <label for="product-quantity">Product Quantity</label>
            <input type="number" id="product-quantity" name="product-quantity" onchange="updateTotal()" disabled min="1" step="1" required>
            <label for="price-per-unit">Price per Unit</label>

            <div id="product-info"></div>
            <input type="hidden" id="price-per-unit" name="price-per-unit" required>

            <label for="order-total">Total</label>
            <div id="order-total"></div>
            <input type="hidden" id="order-total-input" name="order-total-input" required>
            <label for="payment-method">Select Payment Method</label>
            <select id="payment-method" name="payment-method" required>
              <option selected disabled>
                Payment Method
              </option>
              <option value="Paypal">
                Paypal
              </option>
              <option value="Apple Pay">
                Apple Pay
              </option>
              <option value="Mastercard">
                Mastercard
              </option>
              <option value="Visa">
                Visa
              </option>
            </select>
            <input type="hidden" id="order-date" name="order-date">
            <script>
              //script to get the current date
              var today = new Date();
              var dd = String(today.getDate()).padStart(2, '0');
              var mm = String(today.getMonth() + 1).padStart(2, '0'); 
              var yyyy = today.getFullYear();
              //set the value of the hidden input to the current date
              today = yyyy + '-' + mm + '-' + dd;
              document.getElementById("order-date").value = today;
              </script>
            
            
            <input type="submit" name="place-order" value="Place Order" />
          </form>
          <input type="hidden" id="order-date" name="order-date">
          <script>
              //get value from 
              </script>
        </div>
      </div>
      <!-- Table for list of all Orders -->
      <table>

        <!-- Headers for table -->
        <tr>
          <th>Date</th>
          <th>Vendor</th>
          <th>Product</th>
          <th>Quantity</th>
          <th>Price per Unit</th>
          <th>Payment Total</th>
          <th>Actions</th>
        </tr>
        <!-- php code to display all orders -->
        <?php
        
        $sql = "SELECT * FROM Orders";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($result)) {
          echo "<tr>";
          echo "<td>" . $row['dateOrder'] . "</td>";
          echo "<td>" . $row['vendor'] . "</td>";
          echo "<td>" . $row['product'] . "</td>";
          echo "<td>" . number_format($row['quantity']) . "</td>";
          echo "<td>" . "$" . number_format($row['pricePerUnit']) . "</td>";
          echo "<td>" . "$" . number_format($row['total']) . "</td><td>";
          echo "<form method='POST' action=''>";
          echo "<input type='hidden' name='order_id' value='" . $row["order_id"] . "'>";
          echo "<select name='select' >";
          echo "<option value='default'>Select an option</option>";
          echo "<option value='delete' onClick='this.form.submit()'>Delete</option>";
          echo "<option value='view-details' data-order-number='" . $row["order_id"] . "'>View Details</option>";
          echo "</select>";
          echo "</form>";
          echo "</td></tr>";
          if (isset($_POST['select'])) {
            $order_id = $_POST['order_id'];
            $option = $_POST['select'];
            if ($option == "delete") {
              try {
                // delete the oreder from the database
                $id = $_POST['order_id'];
                $sql = "DELETE FROM `Orders` WHERE `order_id`='$id'";
                $result = mysqli_query($con, $sql);

                if (!$result) {
                  throw new Exception("Order does not exist.");
                } else {
                  echo "<script>alert('Order deleted successfully.'); window.location.href = 'orders.php';</script>";
                }
              } catch (Exception $e) {
                echo "<script>alert('Error: " . $e->getMessage() . "'); window.location.href = 'orders.php';</script>";
              }
            }
          }
        }
        //if user adds a new order add it to the orders table
        if (isset($_POST['place-order'])) {
          //get the product number from the product table using the _POST prodcut name value
          //this satifies the foreign key constraint
          $product_name = $_POST['product-name'];
         
          $sql_one = "SELECT * FROM product WHERE product_name = '$product_name'";
          $result_product = mysqli_query($con, $sql_one);
          echo mysqli_error($con);
          // if there are results from database display them
          if ($result_product->num_rows > 0) {
            // while loop to display all rows from database
            while ($row = $result_product->fetch_assoc()) {
  
              $product_number = $row["product_number"];
              
            }
          $date = $_POST['order-date'];
          $vendor = $_POST['vendor-name'];
          
          $quantity = $_POST['product-quantity'];
          $pricePerUnit = $_POST['price-per-unit'];
          $total = $_POST['order-total-input'];
          $paymentMethod = $_POST['payment-method'];
        
          $sql = "INSERT INTO `Orders`(`vendor`, `product`, `quantity`, `pricePerUnit`, `total`, `dateOrder`, `paymentInformation`, `product_number`) VALUES ('$vendor','$product_name','$quantity','$pricePerUnit','$total','$date','$paymentMethod','$product_number')";

          try {
            $result = mysqli_query($con, $sql);
            if (!$result) {
              echo "<script>alert('Error: " . $e->getMessage() . "'); window.location.href = 'orders.php';</script>";
            } else {
              echo "<script>alert('Order placed successfully.'); window.location.href = 'orders.php';</script>";
            }
          }catch (Exception $e) {
            echo "<script>alert('Error: " . $e->getMessage() . "'); window.location.href = 'orders.php';</script>";
          }
        }}

        mysqli_close($con);
        ?>


      </table>
    </section>
  </main>
  <script src="reusableJS/modalOpen.js"></script>
  <script src="reusableJS/searchBar.js"></script>
  <script src="reusableJS/getPricePerUnit.js"></script>
  <script src="reusableJS/viewDetails.js"></script>
  <script src="reusableJS/signOut.js"></script>
  <footer>
    <p>&copy; 2023 Noverint</p>
  </footer>
</body>

</html>