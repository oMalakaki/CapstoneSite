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
    <main class="css-transitions-only-after-page-load">
    <div id="modal" class="modal">
        <span class="close">&times;</span>
        <h2></h2>
        <div class="modal-content">
</div>
</div>
        
      <section class="sales-section">
        <h2>Sales</h2>


        <!-- search and button elements -->
        <div class="search-and-button">
          <!-- A search bar the user can use to search through the table -->
          <input
            type="text"
            id="search"
            name="search"
            placeholder="Search for a sale..."
          />

        </div>
        
        <!-- Table for list of all Sales -->
        <table>

          <!-- Headers for table -->
          <tr>
            <th>Date</th>
            <th>Sale No.</th>
            <th>Sale</th>
            <th>Actions</th>
          </tr>
          <!-- php to get all sales from sales table -->
          <?php 
          include("databaseconnect.php");
          $sql = "SELECT * FROM sales";
          $result = mysqli_query($con, $sql);
          if ($result->num_rows > 0) {
            // while loop to display all rows from database
            while ($row = $result->fetch_assoc()) {
  
              echo "<tr><td>" . $row["Date"] . "</td><td>" . $row["sale_id"] . "</td><td>" . "$" . $row["Sale"] . "</td><td>" ;
              echo "<form method='POST' action=''>";
              echo "<input type='hidden' name='sale_id' value='" . $row["sale_id"] . "'>";
              echo "<select name='select' >";
              echo "<option value='default'>Select an option</option>";
              echo "<option value='view-details' data-sale-number='" . $row["sale_id"] . "'>View Details</option>";
              echo "</select>";
              echo "</form>";
              echo "</td></tr>";

            }
          } else {
            echo "0 results";
          } 

          mysqli_close($con);
          ?>


        </table>

    </main>
    <script src="reusableJS/modalOpen.js"></script>
    <script src="reusableJS/searchBar.js"></script>
    <script src="reusableJS/viewDetails.js"></script>
    <script src="reusableJS/signOut.js"></script>

    <footer>
      <p>&copy; 2023 Noverint</p>
    </footer>
  </body>
</html>
