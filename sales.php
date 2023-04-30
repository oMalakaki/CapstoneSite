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
    <main class="css-transitions-only-after-page-load">
  
        
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
          <tr>
            <td>1/3/23</td>
            <td>#123456789</td>
  
            <td>$2.09</td>
            <td>
              •••
            </td>
          </tr>
          <tr>
            <td>1/3/23</td>
            <td>#123456789</td>
  
            <td>$2.09</td>
            <td>
              •••
            </td>
          </tr>
          <tr>
            <td>1/3/23</td>
            <td>#123456789</td>
  
            <td>$2.09</td>
            <td>
              •••
            </td>
          </tr>


        </table>

    </main>
    <script src="reusableJS/modalOpen.js"></script>
    <script src="reusableJS/searchBar.js"></script>

    <footer>
      <p>&copy; 2023 Noverint</p>
    </footer>
  </body>
</html>
