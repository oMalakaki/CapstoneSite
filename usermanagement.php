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
  <main class="userManagement-page css-transitions-only-after-page-load">
    <section class="items-section">
      <h2>User Management</h2>

      <!-- search and button elements -->
      <div class="search-and-button">
        <!-- A search bar the user can use to search through the table -->
        <input type="text" id="search" name="search" placeholder="Search for a User..." />

        <!-- A button that opens the modal.js to add a new User -->
        <button class="open-modal-button-user" id="open-modal-button">Add User</button>
      </div>

      <!-- Modal for adding a new User -->
      <div id="modal" class="modal">
      <span class="close">&times;</span>
          <h2>Add a New User</h2>
        <div class="modal-content">
   
          <!-- form to add users in database -->
          <form action="" method="POST" id="add-user-form">
            <label for="fname">First Name</label>
            <input type="text" id="fname" name="firstname" placeholder="First Name" required>
            <label for="lname">Last Name</label>
            <input type="text" id="lname" name="lastname" placeholder="Last Name" required>
            <label for="email">Email</label>
            <input type="text" id="email" name="email" placeholder="Email" required>
            <label for="role">Role</label>
            <select id="role" name="role">
              <option value="Owner">Owner</option>
              <option value="Manager">Manager</option>
              <option value="Employee">Employee</option>
            </select>
            <label for="payroll">Payroll information</label>
            <input type="number" id="payroll" name="payroll" placeholder="Payroll/hr" required>

            <button type="submit" name="add-user">Add User</button>
          </form>
        </div>
      </div>
      <!-- Table for list of all User Management -->

      <table>
        <!-- Headers for table -->
        <tr>
          <th>User</th>
          <th>Role</th>
          <th>Actions</th>
        </tr>

        <?php
        include("databaseconnect.php");
        // sql query to select all from users table
        $sql = "SELECT * FROM users";
        $result = mysqli_query($con, $sql);
        // if there are results from database display them
        if ($result->num_rows > 0) {
          // while loop to display all rows from database
          while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["first_name"] . " " . $row["last_name"] . "</td><td>" . $row["role"] . "</td><td><form method='POST' action='' onsubmit='return confirmDelete(this)'><input type='hidden' name='employee_id' value='" . $row["employee_id"] . "</td><td>";
            echo "<form method='POST' action=''>";
            echo "<input type='hidden' name='employee_id' value='" . $row["employee_id"] . "'>";
            echo "<select name='select' >";
            echo "<option value='default'>Select an option</option>";
            echo "<option value='delete' onClick='this.form.submit()'>Delete</option>";
            echo "<option value='view-details' data-user-number='" . $row["employee_id"] . "'>View Details</option>";
            echo "</select>";
            echo "</form>";
            echo "</td></tr>";
            
            if (isset($_POST['select'])) {
                $employee_id = $_POST['employee_id'];
                $option = $_POST['select'];
                if ($option == "delete") {
                  try {
                    // delete the user from the database
                    $id = $_POST['employee_id'];
                    $sql = "DELETE FROM `users` WHERE `employee_id`='$id'";
                    $result = mysqli_query($con, $sql);
        
                    if (!$result) {
                      throw new Exception("User does not exist.");
                    } else {
                      echo "<script>alert('User deleted successfully.'); window.location.href = 'usermanagement.php';</script>";
                    }
                  } catch (Exception $e) {
                    echo "<script>alert('Error: " . $e->getMessage() . "'); window.location.href = 'usermanagement.php';</script>";
                  }
                } 
          }
        
          }
        } else {
          echo "No users found. Please add a user.";
        }

        //if user adds a new user add it to the users table
        if (isset($_POST['add-user'])) {
          $fname = $_POST['firstname'];
          $lname = $_POST['lastname'];
          $email = $_POST['email'];
          $role = $_POST['role'];
          $payroll = $_POST['payroll'];
          $sql = "INSERT INTO `users` (`first_name`, `last_name`, `email`, `role`, `payroll`) VALUES ('$fname', '$lname', '$email', '$role', '$payroll')";
          try {
            $result = mysqli_query($con, $sql);
            if (!$result) {
              throw new Exception("User already exists.");
            } else {
              echo "<script>alert('User added successfully.'); window.location.href = 'usermanagement.php';</script>";
            }
          } catch (Exception $e) {
            echo "<script>alert('Error: " . $e->getMessage() . "'); window.location.href = 'usermanagement.php';</script>";
          }
        }
        ?>


      </table>
    </section>
  </main>
  <script src="reusableJS/modalOpen.js"></script>
  <script src="reusableJS/searchBar.js"></script>
  <script src="reusableJS/viewDetails.js"></script>



  <footer>
    <p>&copy; 2023 Noverint</p>
  </footer>
</body>

</html>