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
          <input 
            type="text"
            id="search"
            name="search"
            placeholder="Search for an Order..."
          />
          <h5>Filter</h5>
        </div>

          <!-- A button that opens the modal.js to add a new Order -->
          <button class="open-modal-button">Place Order</button>
        </div>
        
        <!-- Modal for adding a new Order -->
        <div id="modal" class="modal">
          <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Add a New Order</h2>
            <form action="/action_page.php">
              <label for="vendor-name">Vendor</label>
              <select
           
                id="vendor-name"
                name="vendor-name"
                required
              >
              <option selected disabled>
                Select a Vendor
              </option>
              <option value="B&B">
                B&B
                </option>
              </select>
              <label for="product-name">Product</label>
              <select
           
                id="product-name"
                name="product-name"
                required
              >
              <option selected disabled>
                Select a Product
              </option>
              <option value="B&B">
                Apple
                </option>
              </select>
              <!-- input for product quantity integer only-->
              <label for="product-quantity">Product Quantity</label>
              <input type="number" id="product-quantity" name="product-quantity" min="1" step="1" required>


              <input type="submit" value="Submit" />
            </form>
          </div>
        </div>
        <!-- Table for list of all Orders -->
        <table>

          <!-- Headers for table -->
          <tr>
            <th>Date</th>
            <th>Vendor</th>
            <th>Item</th>
            <th>Quantity</th>
            <th>Price per Unit</th>
            <th>Payment Total</th>
            <th>Actions</th>
          </tr>
          <tr>
            <td>1/3/23</td>
            <td>B&B</td>
            <td>Apple</td>
            <td>503</td>
            <td>$2.09</td>
            <td>$2040.58</td>
  
            <td>
              •••
            </td>
          </tr>
          <tr>
            <td>1/3/23</td>
            <td>B&B</td>
            <td>Apple</td>
            <td>503</td>
            <td>$2.09</td>
            <td>$2040.58</td>
  
            <td>
              •••
            </td>
          </tr>
          <tr>
            <td>1/3/23</td>
            <td>B&B</td>
            <td>Apple</td>
            <td>503</td>
            <td>$2.09</td>
            <td>$2040.58</td>
  
            <td>
              •••
            </td>
          </tr>


        </table>
      </section>
    </main>
    <script src="reusableJS/modalOpen.js"></script>
    <script src="reusableJS/searchBar.js"></script>
    <footer>
      <p>&copy; 2023 Noverint</p>
    </footer>
  </body>
</html>
