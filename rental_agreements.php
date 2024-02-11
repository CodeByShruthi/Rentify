<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data and sanitize inputs
    $apartment_id = $_POST['apartment_id'];
    $tenant_id = $_POST['tenant_id'];
    $landlord_id = $_POST['landlord_id'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $rent_amount = $_POST['rent_amount'];
    $payment_status = $_POST['payment_status'];

    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "rentify_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the entered ApartmentID, TenantID, and LandlordID exist in their respective tables
    $check_apartment_query = "SELECT * FROM apartments WHERE ApartmentID = $apartment_id";
    $check_tenant_query = "SELECT * FROM tenants WHERE TenantID = $tenant_id";
    $check_landlord_query = "SELECT * FROM landlords WHERE LandlordID = $landlord_id";

    $apartment_result = $conn->query($check_apartment_query);
    $tenant_result = $conn->query($check_tenant_query);
    $landlord_result = $conn->query($check_landlord_query);

    if ($apartment_result->num_rows === 0 || $tenant_result->num_rows === 0 || $landlord_result->num_rows === 0) {
        die("Error: Invalid ApartmentID, TenantID, or LandlordID.");
    }

    // Prepare SQL statement to insert rental agreement data
    $sql = "INSERT INTO RentalAgreements (ApartmentID, TenantID, LandlordID, StartDate, EndDate, RentAmount, PaymentStatus) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Check if the statement was prepared successfully
    if ($stmt === FALSE) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("iiissss", $apartment_id, $tenant_id, $landlord_id, $start_date, $end_date, $rent_amount, $payment_status);

    // Execute the SQL statement
    if ($stmt->execute() === TRUE) {
        echo "New rental agreement added successfully.";
        header('location:rental_agreements.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close prepared statement and database connection
    $stmt->close();
    $conn->close();
}
?>



<!-- <?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $apartment_id = $_POST['apartment_id'];
  $tenant_id = $_POST['tenant_id'];
  $landlord_id = $_POST['landlord_id'];
  $start_date = $_POST['start_date'];
  $end_date = $_POST['end_date'];
  $rent_amount = $_POST['rent_amount'];
  $payment_status = $_POST['payment_status'];

  // Connect to the database (assuming you have already established a connection)
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "rentify_db";

  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } // Prepare SQL statement to insert rental agreement into the database
  $sql = "INSERT INTO rentalagreements (ApartmentID, TenantID, LandlordID, StartDate,
EndDate, RentAmount, PaymentStatus) VALUES (?, ?, ?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  if ($stmt === FALSE) {
    die("Error: " . $conn->error);
}
  $stmt->bind_param(
    "iiisss",
    $apartment_id,
    $tenant_id,
    $landlord_id,
    $start_date,
    $end_date,
    $rent_amount,
    $payment_status
  );
  // Executethe SQL statement 
  if ($stmt->execute() === TRUE) {
    echo '<script>';
    echo 'alert("Rental agreement created successfully!");';
    echo 'window.location.href = "index.php";';
    echo '</script>';
  } else {
    echo "Error: " . $sql . "<br />" . $conn->error;
  }
  // Close database connection
  $stmt->close();
  $conn->close();
}
?> -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Add Rental Agreements</title>
  <link rel="stylesheet" href="./styles/service.css" />
</head>

<body>
  <div class="serv_out-box">
    <div class="serv_in-box">
      <div class="serv_form-box">
        <h1 class="serv_heading">ADD RENTAL AGREEMENTS</h1>
        <form action="rental_agreements.php" method="POST">
          <label for="apartment_id">Apartment ID:</label><br />
          <input type="number" id="apartment_id" name="apartment_id" required /><br />

          <label for="tenant_id">Tenant ID:</label><br />
          <input type="number" id="tenant_id" name="tenant_id" required /><br />

          <label for="landlord_id">Landlord ID:</label><br />
          <input type="number" id="landlord_id" name="landlord_id" required /><br />

          <label for="start_date">Start Date:</label><br />
          <input type="date" id="start_date" name="start_date" required /><br />

          <label for="end_date">End Date:</label><br />
          <input type="date" id="end_date" name="end_date" required /><br />

          <label for="rent_amount">Rent Amount:</label><br />
          <input type="number" id="rent_amount" name="rent_amount" required /><br />

          <label for="payment_status">Payment Status:</label><br />
          <select id="payment_status" name="payment_status" required>
            <option value="Paid">Paid</option>
            <option value="Unpaid">Unpaid</option>
          </select><br /><br />

          <button type="submit" value="Create Rental Agreement">submit</button>
        </form>
      </div>
    </div>
  </div>
  <script src="https://kit.fontawesome.com/62713cab29.js" crossorigin="anonymous"></script>
</body>

</html>