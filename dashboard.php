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
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

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
    <section class="dashboard-section">
      <h2>Dashboard</h2>
      <!-- Dashboard with 4 mini modules horizontally on top and 4 bigger modules 2x2 on bottom -->
      <div class="modules">
        <div class="mini-module-container">
          <div class="mini-module">
            <img src="pictures/icons/ad_product.svg" alt="Products" />
            <div>
              <h3>Products in stock</h3>
              <?php
              include("databaseconnect.php");
              $sql = "SELECT COUNT(*) FROM product";
              $result = mysqli_query($con, $sql);
              $row = mysqli_fetch_array($result);
              if ($row['COUNT(*)'] == NULL) {
                $row['COUNT(*)'] = 0;
              }
              echo "<p>" . $row['COUNT(*)'] . "</p>";
              ?>
            </div>
          </div>
          <div class="mini-module">
            <img src="pictures/icons/dollar.svg" alt="Dollar" />
            <div>
              <h3>Revenue</h3>
              <?php
              $sql = "SELECT SUM(Sale) FROM sales";
              $result = mysqli_query($con, $sql);
              $row = mysqli_fetch_array($result);
              if ($row['SUM(Sale)'] == NULL) {
                $row['SUM(Sale)'] = 0;
              }
              echo "<p>" . "$" . number_format($row['SUM(Sale)'], 2) . "</p>";
              ?>
            </div>
          </div>
          <div class="mini-module">
            <img src="pictures/icons/report.svg" alt="report" />
            <div>
              <h3>Sales this week</h3>
              <?php
              $sql = "SELECT COUNT(*) FROM sales WHERE Date BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()";
              $result = mysqli_query($con, $sql);
              $row = mysqli_fetch_array($result);
              if ($row['COUNT(*)'] == NULL) {
                $row['COUNT(*)'] = 0;
              }
              echo "<p>" . $row['COUNT(*)'] . "</p>";
              ?>
            </div>
          </div>
          <div class="mini-module">
            <img src="pictures/icons/coins.svg" alt="coins" />
            <div>
              <h3>Total Sales</h3>

              <?php
              $sql = "SELECT COUNT(*) FROM sales";
              $result = mysqli_query($con, $sql);
              $row = mysqli_fetch_array($result);
              if ($row['COUNT(*)'] == NULL) {
                $row['COUNT(*)'] = 0;
              }
              echo "<p>" . $row['COUNT(*)'] . "</p>";
              ?>
            </div>
          </div>
        </div>



        <div class="big-module-container">

          <div class="big-module">
            <h3>Product Performance (Profit by Product)</h3>
            <div id="chart-div"></div>

          </div>
          <div class="big-module ">
            <h3>Low Inventory Products</h3>
            <div class="low-inventory-module">

              <?php
              $sql = "SELECT * FROM product WHERE Quantity < 100";
              $result = mysqli_query($con, $sql);
              if (mysqli_num_rows($result) == 0) {
                echo "<p>No low inventory products!</p>";
              }
              while ($row = mysqli_fetch_array($result)) {
                echo "<div class='mini-module'>";
                echo "<img src='pictures/icons/warning.svg' alt='Products' />";
                echo "<div>";
                echo "<h2>" . $row['product_name'] . "</h2>";
                echo "<p>" . $row['quantity'] . "</p>";

                echo "</div></div>";
              }
              mysqli_close($con);
              ?>

            </div>

          </div>
          <div class="big-module">
            <h3>Daily Sales</h3>
            <div id="sales-line-chart"></div>

          </div>
          <div class="big-module">
            <h3>Noverint Assistant</h3>
            <div id="chatbot">
              <div id="messages">
                <div class="message-bot">
                  
                </div>
              </div>

             
            </div>
            <button id="new-tip-btn">Generate New Tip</button>


          </div>
        </div>
      </div>
    </section>
  </main>
  <script src="reusableJS/modalOpen.js"></script>
  <script src="reusableJS/charts.js"></script>
  <script src="reusableJS/signOut.js"></script>
  <script src="reusableJS/NoverintAssistant.js"></script>
  <footer>
    <p>&copy; 2023 Noverint</p>
  </footer>
</body>

</html>