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
  <main class="products-page css-transitions-only-after-page-load">
    <section class="items-section">
      <h2>Products</h2>

      <!-- search and button elements -->
      <div class="search-and-button">
        <!-- A search bar the user can use to search through the table -->
        <input type="text" id="search" name="search" placeholder="Search for a product..." />

        <!-- A button that opens the modal.js to add a new product -->
        <button class="open-modal-button-product" id="open-modal-button">Add Product</button>
      </div>

      <!-- Modal for adding a new product -->
      <div id="modal" class="modal">
        <span class="close">&times;</span>
        <h2>Add a New Product</h2>
        <div class="modal-content">

          <form id="add-product-form-automatic">
            <div class="upload-barcode-div">
              <label>Upload barcode</label>
              <input type="file" accept="image/*">
              <button type="button" onclick="scanBarcode()">Scan Barcode</button>
            </div>
            <div class="manual-product-div">
              <label>Dont have a barcode?</label>
              <button type="button" onclick="showManualProduct()">Enter Manually</button>
            </div>
          </form>
          <form action="" method="POST" id="add-product-form-manual">
            <div>
              <label for="product-name">Product Name</label>
              <input required type="text" id="product-name" name="product-name" placeholder="Product Name" />
            </div>

            <div>
              <label for="product-number">Product Number</label>
              <input required type="text" id="product-number" name="product-number" placeholder="Product Number" />

            </div>
            <div>
              <label for="product-quantity">Product Quantity</label>
              <input required type="number" id="product-quantity" name="product-quantity" placeholder="Product Quantity" step="1" min="0" />

            </div>
            <div>
              <label for="original-price">Orginal Price</label>
              <input required type="number" id="original-price" name="original-price" placeholder="Original Price" step="any" min="0" />

            </div>
            <div>
              <label for="sale-price">Sale Price</label>
              <input required type="number" id="sale-price" name="sale-price" placeholder="Sale Price" step="any" min="0" />

            </div>
            <div>
              <label for="DoM">Date of Manufacturing</label>
              <input type="text" id="DoM" name="DoM" placeholder="YYYY-MM-DD" pattern="\d{4}-\d{2}-\d{2}" title="Please enter a date in the format YYYY-MM-DD" />

            </div>
            <div>
              <label for="DoE">Date of Expiration</label>
              <input required type="text" id="DoE" name="DoE" placeholder="YYYY-MM-DD" pattern="\d{4}-\d{2}-\d{2}" title="Please enter a date in the format YYYY-MM-DD" />

            </div>
            <input type="submit" name="submit-product" value="Add Product" />
          </form>
        </div>
      </div>
      <!-- Table for list of all Products -->
      <table>

        <!-- Headers for table -->
        <tr>
          <th>Product</th>
          <th>No.</th>
          <th>Quantity</th>
          <th>Sale Price</th>
          <th>Actions</th>
        </tr>
        <?php
        include("databaseconnect.php");
        // sql query to select all from product table
        $sql = "SELECT * FROM product";
        $result = mysqli_query($con, $sql);
        echo mysqli_error($con);
        // if there are results from database display them
        if ($result->num_rows > 0) {
          // while loop to display all rows from database
          while ($row = $result->fetch_assoc()) {

            echo "<tr><td>" . $row["product_name"] . "</td><td>" . $row["product_number"] . "</td><td>" . number_format($row["quantity"]) . "</td><td>" . "$" . $row["sale_price"] . "</td><td>";
            echo "<form method='POST' action=''>";
            echo "<input type='hidden' name='product_number' value='" . $row["product_number"] . "'>";
            echo "<select name='select' >";
            echo "<option value='default'>Select an option</option>";
            echo "<option value='delete' onClick='this.form.submit()'>Delete</option>";
            echo "<option value='view-details' data-product-number='" . $row["product_number"] . "'>View Details</option>";
            echo "</select>";
            echo "</form>";
            echo "</td></tr>";

            if (isset($_POST['select'])) {
              $product_number = $_POST['product_number'];
              $option = $_POST['select'];
              if ($option == "delete") {
                try {
                  // delete the product from the database
                  $id = $_POST['product_number'];
                  $sql = "DELETE FROM `product` WHERE `product_number`='$id'";
                  $result = mysqli_query($con, $sql);

                  if (!$result) {
                    throw new Exception("Product does not exist.");
                  } else {
                    echo "<script>alert('Product deleted successfully.'); window.location.href = 'products.php';</script>";
                  }
                } catch (Exception $e) {
                  echo "<script>alert('Error: " . $e->getMessage() . "'); window.location.href = 'products.php';</script>";
                }
              }
            }
          }
        }
// if submit-product button is pressed
if (isset($_POST['submit-product'])) {
  // get values from form
  $product_name = $_POST['product-name'];
  $product_number = $_POST['product-number'];
  $product_quantity = $_POST['product-quantity'];
  $original_price = $_POST['original-price'];
  $sale_price = $_POST['sale-price'];
  $DoM = $_POST['DoM'];
  $DoE = $_POST['DoE'];

  // check if product number already exists
  $sql_check = "SELECT * FROM product WHERE product_number = '$product_number'";
  $result_check = mysqli_query($con, $sql_check);
  if (mysqli_num_rows($result_check) > 0) {
    // product number already exists, display error message
    echo "<script type='text/javascript'>alert('Error: Duplicate entry. Product with product number $product_number already exists.');window.location.href = 'products.php';</script>";
  } else {
    // insert values into product table
    $sql_insert = "INSERT INTO product (product_name, product_number, quantity, og_price, sale_price, DoM, expiry) VALUES ('$product_name', '$product_number', '$product_quantity', '$original_price', '$sale_price', '$DoM', '$DoE')";
    $result_insert = mysqli_query($con, $sql_insert);
    if ($result_insert) {
      echo "<script type='text/javascript'>alert('Product added successfully!');window.location.href = 'products.php';</script>";
    } else {
      echo "<script type='text/javascript'>alert('Product could not be added.');window.location.href = 'products.php';</script>";
    }
  }
}

mysqli_close($con);


        ?>

      </table>
    </section>
  </main>
  <script src="reusableJS/modalOpen.js"></script>
  <script src="reusableJS/searchBar.js"></script>
  <script src="reusableJS/barcode.js"></script>
  <script src="reusableJS/viewDetails.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>
  <footer>
    <p>&copy; 2023 Noverint</p>
  </footer>




</body>

</html>